@extends('backend.app')

@section('title')
    Users-Admin
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/dev/css/datatables.min.css') }}">
@endpush

@section('main')
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="mb-5">
                        <h3 class="mb-0 ">Customers</h3>

                    </div>
                </div>
            </div>
            <div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <!-- card -->
                        <div class="card mb-4">
                            <div class="card-header  ">

                                <div class="row justify-content-between">
                                    <div class="col-md-6 mb-3 ">

                                        <a href="#!" class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#addCustomerModal">+ Add Customer</a>

                                    </div>
                                    <div class="col-md-6 text-lg-end mb-3">
                                        <a href="#!" class="btn btn-light me-1"><i data-feather="trash-2"
                                                class="icon-xs"></i></a>
                                        <a href="#!" class="btn btn-light me-1">Import</a>
                                        <a href="#!" class="btn btn-light ">Export</a>
                                    </div>
                                    <div class=" col-lg-4 col-md-6">
                                        <input type="search" class="form-control "
                                            placeholder="Search for customer, email, phone, status or something">

                                    </div>
                                    <div class="col-lg-2 col-md-6  mt-3 mt-md-0">

                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Blocked</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table text-nowrap mb-0 table-centered table-hover" id="data-table">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="ps-1">Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-md-flex justify-content-between align-items-center">
                                <span>Showing 1 to 8 of 12 entries</span>
                                <nav class="mt-2 mt-md-0">
                                    <ul class="pagination mb-0 ">
                                        <li class="page-item "><a class="page-link" href="#!">Previous</a></li>
                                        <li class="page-item active"><a class="page-link" href="#!">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- modal start --}}
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addCustomerModalLabel">Add Customer</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            <div class="mb-3">
                                <label for="customerName" class="form-label">Customer name</label>
                                <input type="text" class="form-control" placeholder="Enter name" id="customerName">
                            </div>
                            <div class="mb-3">
                                <label for="customerEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" id="customerEmail">
                            </div>
                            <div class="mb-3">
                                <label for="customerPhone" class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Phone" id="customerPhone">
                            </div>
                            <div class="mb-3">
                                <label for="customerDate" class="form-label">Joining Date</label>
                                <input type="text" class="form-control flatpickr" placeholder="Select date"
                                    id="customerDate">
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-primary me-1">+ Add Customer</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- modal end --}}
@endsection



@push('scripts')
    {{-- Datatable --}}
    <script src="{{ asset('assets/dev/js/datatables.min.js') }}"></script>
    <script>
        var routeUrls = {
            viewUrl: "#",
            editUrl: "#"
        };
    </script>
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#data-table')) {
                var dTable = $('#data-table').DataTable({
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
                        url: "{{ route('admin.user.admin.index') }}",
                        type: "GET",
                        data: (d) => {
                            d.search = $('#search-input').val();
                        }
                    },
                    columns: [
                        {
                            data: 'name',
                            name: 'name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'email',
                            name: 'email',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });
                // Custom search functionality
                $('#search-input').on('keyup', function() {
                    dTable.draw(); // Redraw the table with the custom search value
                });
            }
        });
    </script>
@endpush
