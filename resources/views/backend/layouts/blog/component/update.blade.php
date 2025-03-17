<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="updateLabel">Edit Blog</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="updateBlogModel" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="update_blog_title" class="form-label">Blog Title</label>
                    <input type="text" value="{{ $blog->title }}" class="form-control" placeholder="Enter title" id="update_blog_title" name="title">
                    <p class="v-error-message text-danger" id="update_name_error"></p>
                </div>
                <div class="mb-3">
                    <label for="update_blog_content" class="form-label">Blog Content</label>
                    <textarea class="form-control" placeholder="Enter content" id="update_blog_content" name="content">{{ $blog->content }}</textarea>
                    <p class="v-error-message text-danger" id="update_content_error"></p>
                </div>
                <div class="mb-3">
                    <label for="update_blog_image" class="form-label">Blog Image</label>
                    <input type="file" class="form-control" id="update_blog_image" name="blog_images[]" accept="image/*" onchange="previewImage(event)">
                    @php
                        // Get the latest image URL if available
                        $latestImageUrl = $blog->images->last()->url ?? 'default-image.png';
                    @endphp
                    <img id="edit_image_preview" src="{{ asset($latestImageUrl) }}" alt="Preview" class="img-fluid mt-2" style="max-width: 100px; height: auto;">
                    <p class="v-error-message text-danger" id="update_image_error"></p>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary me-1" id="updateBtn">Save</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        // Function to preview the selected image
        const previewImage = (event) => {
            const reader = new FileReader();
            reader.onload = () => {
                const output = document.getElementById('edit_image_preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        // Handle form submission
        $('#updateBlogModel').on('submit', (e) => {
            e.preventDefault(); // Prevent default form submission

            $('#overlay').show(); // Show loading overlay

            // Clear previous error messages
            $('.v-error-message').text('');

            // Validate form fields
            let hasError = false;
            const blogTitle = $('#update_blog_title').val();
            const blogContent = $('#update_blog_content').val();

            if (!blogTitle) {
                $('#update_name_error').text('Title is required.');
                hasError = true;
            }
            if (!blogContent) {
                $('#update_content_error').text('Content is required.');
                hasError = true;
            }

            if (hasError) {
                $('#overlay').hide(); // Hide loading overlay if there's an error
                return;
            }

            // Create FormData object for AJAX submission
            const formData = new FormData();
            formData.append('title', blogTitle);
            formData.append('content', blogContent);
            formData.append('_method', 'PUT');
            formData.append('_token', '{{ csrf_token() }}');

            // Append image file if selected
            const blogImage = $('#update_blog_image')[0].files[0];
            if (blogImage) {
                formData.append('blog_images[]', blogImage);
            }

            // Make AJAX request
            $.ajax({
                url: '{{ route('admin.blog.update', $blog->slug) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: (response) => {
                    if (response.code === 200) {
                        dTable.draw(); // Redraw the data table
                        $('#updateBlogModel').modal('hide');
                        $('#overlay').hide(); // Hide loading overlay
                        toastr.success('Blog updated successfully!');
                    } else {
                        $('#overlay').hide();
                        toastr.error('Something went wrong while updating the blog.');
                    }
                },
                error: (Xhr) => {
                    $('#overlay').hide(); // Hide loading overlay in case of error

                    if (Xhr.responseJSON && Xhr.responseJSON.errors) {
                        // Display validation errors from server response
                        const errors = Xhr.responseJSON.errors;
                        if (errors.title) {
                            $('#update_name_error').text(errors.title[0]);
                        }
                        if (errors.content) {
                            $('#update_content_error').text(errors.content[0]);
                        }
                        if (errors['blog_images[]']) {
                            $('#update_image_error').text(errors['blog_images[]'][0]);
                        }
                    } else {
                        toastr.error('Something went wrong while processing the request.');
                    }
                }
            });

            // catch (error) {
            //     $('#updateBlogModel').modal('hide');
            //     console.error(error);
            //     toastr.error('Something Went Wrong.!');
            //     }
        });
    });
    </script>
