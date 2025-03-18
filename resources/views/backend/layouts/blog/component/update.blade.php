<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="updateBlogLabel">Edit Blog Post</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="updateBlogPost">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->

                <div class="mb-3">
                    <label for="edit_blog_title" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" placeholder="Enter title" id="edit_blog_title" value="{{ $blog->title }}">
                    <p class="v-error-message" id="edit_title_error"></p>
                </div>

                <div class="mb-3">
                    <label for="edit_blog_content" class="form-label">Content</label>
                    <textarea class="form-control" id="edit_blog_content" placeholder="Write your content" rows="5">{{ $blog->content }}</textarea>
                    <p class="v-error-message" id="edit_content_error"></p>
                </div>

                <!-- Image Upload Section -->
                <div class="mb-3">
                    <label for="edit_blog_image" class="form-label">Blog Image</label>
                    @php
                        // Get the latest image URL if available
                        $latestImageUrl = $blog->images->last()->url ?? 'default-image.png';
                    @endphp
                    <input type="file" class="form-control dropify" id="edit_blog_image" accept="image/*" data-max-file-size="2M" data-default-file="{{ asset($latestImageUrl)}}">
                    <p class="v-error-message" id="edit_image_error"></p>
                </div>

                <!-- Image Preview Section -->
                <div id="edit_image_preview" class="mb-3">
                    <img src="{{ asset($latestImageUrl)}}" alt="Current Image" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>

                {{-- <div class="mb-3">
                    <label for="update_blog_image" class="form-label">Blog Image</label>
                    @php
                        // Get the latest image URL if available
                        $latestImageUrl = $blog->images->last()->url ?? 'default-image.png';
                    @endphp
                    <input type="file" class="form-control dropify"
                           id="update_blog_image" name="blog_images[]"
                           accept="image/*" data-default-file="{{ asset($latestImageUrl) }}"
                           data-max-file-size="2M">
                    <p class="v-error-message text-danger" id="update_image_error"></p>
                </div> --}}

                <div class="text-end">
                    <button type="button" class="btn btn-primary me-1" id="updateBlogBtn">Update</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize Dropify for the edit modal
        $('#edit_blog_image').dropify({
            messages: {
                default: 'Drag and drop a file here or click',
                replace: 'Drag and drop or click to replace',
                remove: 'Remove',
                error: 'Ooops, something wrong happened.'
            }
        });

        // Update Blog Post
        $('#updateBlogBtn').click(() => {
            $('#overlay').show();
            const title = $('#edit_blog_title').val();
            const content = $('#edit_blog_content').val();
            const images = $('#edit_blog_image')[0].files;

            // Clear validation messages
            $('#edit_title_error').text('');
            $('#edit_content_error').text('');
            $('#edit_image_error').text('');

            let formData = new FormData();
            formData.append('title', title);
            formData.append('content', content);
            for (let i = 0; i < images.length; i++) {
                formData.append('blog_images[]', images[i]);
            }
            formData.append('_method', 'PUT'); // Use PUT method for updates
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: `{{ route('admin.blog.update', $blog->slug) }}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: (response) => {
                    $('#overlay').hide();
                    toastr.success('Blog Updated successfully!');
                    $('#updateBlogModel').modal('hide');
                    dTable.draw(); // Refresh the DataTable
                },
                error: (Xhr) => {
                    $('#overlay').hide();
                    if (Xhr.responseJSON && Xhr.responseJSON.errors) {
                        if (Xhr.responseJSON.errors.title) {
                            $('#edit_title_error').text(Xhr.responseJSON.errors.title[0]);
                        }
                        if (Xhr.responseJSON.errors.content) {
                            $('#edit_content_error').text(Xhr.responseJSON.errors.content[0]);
                        }
                        if (Xhr.responseJSON.errors.blog_images) {
                            $('#edit_image_error').text(Xhr.responseJSON.errors.blog_images[0]);
                        }
                    } else {
                        toastr.error('Something Went Wrong!');
                    }
                }
            });
        });
    });
</script>
