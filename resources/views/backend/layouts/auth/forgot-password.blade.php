@extends('backend.auth')

@section('title')
    Forget Password
@endsection

@section('main')
    <div class="row align-items-center justify-content-center g-0
min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
            <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle d-none ">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>

            </a>
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-5">
                    <div class="mb-4">
                        <a href="../index-2.html"><img src="../assets/images/brand/logo/logo-2.svg"
                                class="mb-2  text-inverse" alt="Image"></a>
                        <p class="mb-6">Forgot your password? No problem. Just let us know your email address and we will
                            email you a password reset link that will allow you to choose a new one.</p>
                        <p class="mb-6 success-color">{{ session('status') }}
                        </p>
                    </div>
                    <!-- Form -->
                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email"
                                placeholder="Enter Your Email">
                        </div>
                        <!-- Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                        <span>Don't have an account? <a href="{{ route('admin.register') }}">sign up</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
