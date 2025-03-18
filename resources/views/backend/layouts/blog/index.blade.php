@extends('backend.app')

@section('title')
    Blog - Admin
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/dev/css/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css">
    <style>
        .dt-info {
            display: flex;
            justify-content: center;
        }

        .paging_full_numbers {
            display: flex;
            justify-content: center;
            padding-bottom: 10px;
        }

        .blog-post {
            margin-bottom: 30px;
        }

        .blog-post img {
            width: 100%;
            height: auto;
        }

        .blog-post .post-title {
            font-size: 24px;
            font-weight: bold;
        }

        .blog-post .post-meta {
            color: gray;
            font-size: 14px;
        }

        .blog-post .post-content {
            margin-top: 10px;
        }
    </style>
@endpush

@section('main')
    <div id="overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5); z-index:9999;"></div>
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="mb-5">
                        <h3 class="mb-0">Blog Posts</h3>
                    </div>
                </div>
            </div>
            <div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <!-- card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-md-6 mb-3">
                                        <a href="#!" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addBlogModel">+ Add Blog Post</a>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <input type="search" id="search-input" class="form-control" placeholder="Search for title or content">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table text-nowrap mb-0 table-centered table-hover" id="data-table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Dynamic blog posts will appear here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Blog Modal Start --}}
    <div class="modal fade" id="addBlogModel" tabindex="-1" aria-labelledby="addBlogModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addBlogModelLabel">Add Blog Post</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createBlogPost">
                        <div class="mb-3">
                            <label for="title" class="form-label">Blog Title</label>
                            <input type="text" class="form-control" placeholder="Enter title" id="blog_title">
                            <p class="v-error-message" id="title_error"></p>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="blog_content" placeholder="Write your content" rows="5"></textarea>
                            <p class="v-error-message" id="content_error"></p>
                        </div>
                        <!-- Image Upload Section -->
                        <div class="mb-3">
                            <label for="blog_image" class="form-label">Blog Image</label>
                            <input type="file" class="form-control dropify" id="blog_image" accept="image/*" data-max-file-size="2M">
                            <p class="v-error-message" id="image_error"></p>
                        </div>
                        <!-- Image Preview Section -->
                        <div id="image_preview" class="mb-3" style="display: none;">
                            <img id="image_preview_img" src="#" alt="Preview" class="img-fluid" style="max-width: 100%; height: auto;">
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-primary me-1" id="saveBlogBtn">Save</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Create Blog Modal End --}}

    {{-- Edit Blog Modal Start --}}
    <div class="modal fade" id="updateBlogModel" tabindex="-1" aria-labelledby="updateBlogLabel" aria-hidden="true"></div>
    {{-- Edit Blog Modal End --}}
@endsection

@push('scripts')
    <script src="{{ asset('assets/dev/js/datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        let dTable;
        $(document).ready(function() {
            // Initialize DataTable
            if (!$.fn.DataTable.isDataTable('#data-table')) {
                dTable = $('#data-table').DataTable({
                    ordering: false,
                    lengthMenu: [
                        [10, 25, 50, 100, 200, 500, -1],
                        [10, 25, 50, 100, 200, 500, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    searching: false,
                    language: {
                        processing: ''
                    },
                    scroller: {
                        loadingIndicator: true
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'f>>tipr",
                    ajax: {
                        url: "{{ route('admin.blog.index') }}",
                        type: "GET",
                        data: (d) => {
                            d.search = $('#search-input').val();
                        }
                    },
                    columns: [
                        { data: 'title', name: 'title', orderable: true, searchable: true },
                        { data: 'content', name: 'content', orderable: true, searchable: true },
                        { data: 'image', name: 'image', orderable: true, searchable: false },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });

                // Custom search functionality
                $('#search-input').on('keyup', function() {
                    dTable.draw();
                });
            }

            // Initialize Dropify
            $('.dropify').dropify();

            // Save Blog Post
            $('#saveBlogBtn').click(() => {
                $('#overlay').show();
                const title = $('#blog_title').val();
                const content = $('#blog_content').val();
                const images = $('#blog_image')[0].files;

                // Clear validation messages
                $('#title_error').text('');
                $('#content_error').text('');
                $('#image_error').text('');

                let formData = new FormData();
                formData.append('title', title);
                formData.append('content', content);
                for (let i = 0; i < images.length; i++) {
                    formData.append('blog_images[]', images[i]);
                }
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    url: `{{ route('admin.blog.store') }}`,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: (response) => {
                        $('#overlay').hide();
                        toastr.success('Blog Created successfully!');
                        $('#blog_title').val('');
                        $('#blog_content').val('');
                        $('#blog_image').val('');
                        $('.dropify-clear').click();
                        $('#addBlogModel').modal('hide');
                        dTable.draw();
                    },
                    error: (Xhr) => {
                        $('#overlay').hide();
                        if (Xhr.responseJSON && Xhr.responseJSON.errors) {
                            if (Xhr.responseJSON.errors.title) {
                                $('#title_error').text(Xhr.responseJSON.errors.title[0]);
                            }
                            if (Xhr.responseJSON.errors.content) {
                                $('#content_error').text(Xhr.responseJSON.errors.content[0]);
                            }
                            if (Xhr.responseJSON.errors.blog_images) {
                                $('#image_error').text(Xhr.responseJSON.errors.blog_images[0]);
                            }
                        } else {
                            toastr.error('Something Went Wrong!');
                        }
                    }
                });
            });
        });

        // Edit Blog Post
        const editModal = (slug) => {
            try {
                $.ajax({
                    url: `{{ route('admin.blog.edit', '') }}/${slug}`,
                    type: 'GET',
                    dataType: 'json',
                    success: (response) => {
                        if (response.code == 200) {
                            $('#overlay').hide();
                            $('#updateBlogModel').html(response.data.html);
                            $('#updateBlogModel').modal('show');
                        } else {
                            $('#overlay').hide();
                            toastr.error('Something Went Wrong!');
                        }
                    },
                    error: (xhr, status, error) => {
                        $('#overlay').hide();
                        toastr.error('Something Went Wrong!');
                        console.error(error);
                    }
                });
            } catch (error) {
                $('#overlay').hide();
                toastr.error('Something went wrong');
                console.error(error);
            }
        }

        // Delete Blog Post
        const deleteAlert = (slug) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#624bff",
                cancelButtonColor: "#929292",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteContend(slug);
                }
            });
        }

        const deleteContend = (slug) => {
            $('#overlay').show();
            const formData = {
                _method: 'DELETE'
            };
            $.ajax({
                url: `{{ route('admin.blog.destroy', '') }}/${slug}`,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: (response) => {
                    if (response.code == 202) {
                        dTable.draw();
                        $('#overlay').hide();
                        toastr.success('Blog deleted successfully!');
                    } else {
                        $('#overlay').hide();
                        toastr.error('Something Went Wrong!');
                    }
                },
                error: (xhr, status, error) => {
                    $('#overlay').hide();
                    toastr.error('Something Went Wrong!');
                }
            });
        }
    </script>
@endpush
