@extends('backend.app')

@section('title')
    Admin
@endsection

@section('main')
    <div class="app-content-area">
        <div class="bg-primary pt-10 pb-21 mt-n6 mx-n4"></div>
        <div class="container-fluid mt-n22 ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white">Dashboard</h3>
                        </div>
                        {{-- <div>
                            <a href="#!" class="btn btn-white">Create New Project</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lift">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Total Yacht</h4>
                                </div>
                                <div class="icon-shape icon-md bg-primary-soft text-primary rounded-2">
                                    <i data-feather="briefcase" height="20" width="20"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div class="lh-1">
                                <h1 class=" mb-1 fw-bold">{{ $yachts }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lift">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
        mb-3">
                                <div>
                                    <h4 class="mb-0">Total Supplier</h4>
                                </div>
                                <div class="icon-shape icon-md bg-primary-soft text-primary
          rounded-2">
                                    <i data-feather="list" height="20" width="20"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div class="lh-1">
                                <h1 class="  mb-1 fw-bold">{{ $suppliers }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lift">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
        mb-3">
                                <div>
                                    <h4 class="mb-0">Total Crew</h4>
                                </div>
                                <div class="icon-shape icon-md bg-primary-soft text-primary
          rounded-2">
                                    <i data-feather="users" height="20" width="20"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div class="lh-1">
                                <h1 class="  mb-1 fw-bold">{{$crews}}</h1>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lift">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
        mb-3">
                                <div>
                                    <h4 class="mb-0">Total Freelancer</h4>
                                </div>
                                <div class="icon-shape icon-md bg-primary-soft text-primary
          rounded-2">
                                    <i data-feather="target" height="20" width="20"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div class="lh-1">
                                <h1 class="  mb-1 fw-bold">{{$freelancers}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row  -->
            <div class="row ">
                <div class="col-xl-8 col-12 mb-5">
                    <!-- card  -->
                    <div class="card">
                        <!-- card header  -->
                        <div class="card-header ">
                            <h4 class="mb-0">Active Jobs</h4>
                        </div>
                        <!-- table  -->
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table text-nowrap mb-0 table-centered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Job Category</th>
                                            <th>Location</th>
                                            <th>Application Deadline</th>
                                            <th>Number of Openings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                @foreach($jobs as $job)
                <tr>
                    <!-- Job Title -->
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">
                                    <a href="#!" class="text-inherit">{{ $job->job_title }}</a>
                                </h5>
                            </div>
                        </div>
                    </td>
                      <td>{{ $job->job_category }}</td>
                      <td>{{ $job->location }}</td>
                      <td>{{ $job->application_deadline }}</td>
                      <td>{{ $job->number_of_openings }}</td>
                </tr>
                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- card footer  -->
                        {{-- <div class="card-footer text-center">
                            <a href="#!" class="btn btn-primary">View All Projects</a>

                        </div> --}}
                    </div>

                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-5 ">
                    <!-- card  -->
                    <div class="card h-100">
                        <!-- card body  -->
                        <div class="card-header d-flex align-items-center
                    justify-content-between">
                            <div>
                                <h4 class="mb-0">Jobs Performance </h4>
                            </div>

                            <!-- dropdown  -->
                            <div class="dropdown drop start">
                                <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!" role="button"
                                    id="dropdownTask" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-xs" data-feather="more-vertical"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownTask">
                                    <a class="dropdown-item d-flex align-items-center" href="#!">Action</a>
                                    <a class="dropdown-item d-flex align-items-center" href="#!">Another
                                        action</a>
                                    <a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                        here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <!-- chart  -->
                            <div class="mb-6">
                                <div id="perfomanceChart"></div>
                            </div>
                            <!-- icon with content  -->
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="text-center">
                                    <i class="icon-sm text-success" data-feather="check-circle"></i>
                                    <h1 class="fs-2 mb-0 ">{{$activeJobs??0}}</h1>
                                    <p>Active</p>
                                </div>
                                <div class="text-center">
                                    <i class="icon-sm text-warning" data-feather="trending-up"></i>
                                    <h1 class="fs-2 mb-0 ">{{$completedJobs??0}}</h1>
                                    <p>Completed</p>
                                </div>
                                <div class="text-center">
                                    <i class="icon-sm text-danger" data-feather="trending-down"></i>
                                    <h1 class="fs-2 mb-0 ">{{$cancelled??0}}</h1>
                                    <p>Cancelled</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row  -->
            <div class="row ">

                <!-- card  -->
                <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-5 mb-xl-0">
                    <div class="card h-100">
                        <!-- card header  -->
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">My Task </h4>
                            <div class="dropdown">
                                <a class="btn btn-outline-white btn-sm dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Task
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end ">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- table  -->
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table text-nowrap mb-0 table-centered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Deadline</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckOne">
                                                    <label class="form-check-label" for="flexCheckOne">
                                                        Design a FreshCart Home page
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Today</td>
                                            <td>
                                                <span class="badge badge-success-soft">Approved</span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckTwo">
                                                    <label class="form-check-label" for="flexCheckTwo">
                                                        Dash UI Dark Version Design
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Yesterday</td>
                                            <td>
                                                <span class="badge badge-danger-soft">Pending</span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckThree">
                                                    <label class="form-check-label" for="flexCheckThree">
                                                        Dash UI landing page design
                                                    </label>
                                                </div>
                                            </td>
                                            <td>16 Sept, 2023</td>
                                            <td>
                                                <span class="badge badge-warning-soft">In Progress</span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckFour">
                                                    <label class="form-check-label" for="flexCheckFour">
                                                        Next.js Dash UI version
                                                    </label>
                                                </div>
                                            </td>
                                            <td>23 Sept, 2023
                                            </td>
                                            <td>
                                                <span class="badge badge-success-soft">Approved</span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckFive">
                                                    <label class="form-check-label" for="flexCheckFive">
                                                        Develop a Dash UI Laravel
                                                    </label>
                                                </div>
                                            </td>
                                            <td>20 Sept, 2023
                                            </td>
                                            <td>
                                                <span class="badge badge-danger-soft">Pending</span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckSix">
                                                    <label class="form-check-label" for="flexCheckSix">
                                                        Coach home page design
                                                    </label>
                                                </div>
                                            </td>
                                            <td>12 Sept, 2023
                                            </td>
                                            <td>
                                                <span class="badge badge-success-soft">Approved</span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckSeven">
                                                    <label class="form-check-label" for="flexCheckSeven">
                                                        Develop a Dash UI Laravel
                                                    </label>
                                                </div>
                                            </td>
                                            <td>11 Sept, 2023
                                            </td>
                                            <td>
                                                <span class="badge badge-danger-soft">Pending</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card  -->
                <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-5 mb-xl-0">
                    <div class="card h-100">
                        <!-- card header  -->
                        <div class="card-header">
                            <h4 class="mb-0">Teams </h4>
                        </div>
                        <!-- table  -->
                        <div class="card-body">
                            <div class="table-responsive table-card" data-simplebar="" style="max-height: 380px;">
                                <table class="table text-nowrap mb-0 table-centered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Last Activity</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#!"><img src="assets/images/avatar/avatar-2.jpg"
                                                                alt="Image"
                                                                class="avatar-md avatar rounded-circle"></a>
                                                    </div>
                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1"> <a href="#!" class="text-inherit">Anita
                                                                Parmar</a></h5>
                                                        <p class="mb-0">anita@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Front End Developer</td>
                                            <td>3 May, 2023</td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                        role="button" id="dropdownTeamOne" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-xs" data-feather="more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#!"> <img src="assets/images/avatar/avatar-11.jpg"
                                                                alt="Image"
                                                                class="avatar-md avatar rounded-circle"></a>
                                                    </div>
                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1"> <a href="#!" class="text-inherit">Jitu
                                                                Chauhan</a></h5>
                                                        <p class="mb-0">jituchauhan@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Project Director </td>
                                            <td>Today</td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                        role="button" id="dropdownTeamTwo" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-xs" data-feather="more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownTeamTwo">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#!"><img src="assets/images/avatar/avatar-3.jpg"
                                                                alt="Image"
                                                                class="avatar-md avatar rounded-circle"></a>
                                                    </div>
                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1"> <a href="#!"
                                                                class="text-inherit">Sandeep Chauhan</a></h5>
                                                        <p class="mb-0">sandeepchauhan@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Full- Stack Developer</td>
                                            <td>Yesterday</td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                        role="button" id="dropdownTeamThree" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-xs" data-feather="more-vertical"></i>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownTeamThree">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div>
                                                        <a href="#!"> <img src="assets/images/avatar/avatar-4.jpg"
                                                                alt="Image"
                                                                class="avatar-md avatar rounded-circle"></a>
                                                    </div>

                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1"> <a href="#!" class="text-inherit">Amanda
                                                                Darnell</a></h5>
                                                        <p class="mb-0">amandadarnell@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Digital Marketer</td>
                                            <td>3 May, 2023</td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                        role="button" id="dropdownTeamFour" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-xs" data-feather="more-vertical"></i>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownTeamFour">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div>
                                                        <a href="#!"> <img src="assets/images/avatar/avatar-5.jpg"
                                                                alt="Image"
                                                                class="avatar-md avatar rounded-circle"></a>
                                                    </div>

                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1"> <a href="#!"
                                                                class="text-inherit">Patricia Murrill</a></h5>
                                                        <p class="mb-0">patriciamurrill@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Account Manager</td>
                                            <td>3 May, 2023</td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                        role="button" id="dropdownTeamFive" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-xs" data-feather="more-vertical"></i>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownTeamFive">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#!"><img src="assets/images/avatar/avatar-6.jpg"
                                                                alt="Image"
                                                                class="avatar-md avatar rounded-circle"></a>
                                                    </div>
                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1"> <a href="#!"
                                                                class="text-inherit">Darshini Nair</a></h5>
                                                        <p class="mb-0">darshininair@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Front End Developer</td>
                                            <td>3 May, 2023</td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                        role="button" id="dropdownTeamSix" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-xs" data-feather="more-vertical"></i>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownTeamSix">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <div>
                                                        <a href="#!"> <img src="assets/images/avatar/avatar-5.jpg"
                                                                alt="Image"
                                                                class="avatar-md avatar rounded-circle"></a>
                                                    </div>

                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1"> <a href="#!"
                                                                class="text-inherit">Patricia Murrill</a></h5>
                                                        <p class="mb-0">patriciamurrill@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Account Manager</td>
                                            <td>3 May, 2023</td>
                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a class="btn btn-icon btn-ghost btn-sm rounded-circle" href="#!"
                                                        role="button" id="dropdownTeamFive" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-xs" data-feather="more-vertical"></i>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownTeamFive">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Another action</a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="#!">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
