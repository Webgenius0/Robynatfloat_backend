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
                        <p class="mb-6 success-color">{{ session('status') }}
                        </p>
                    </div>
                    <!-- Form -->
                    <form method="POST" action="{{ route('admin.password.store') }}">
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email"
                                placeholder="Enter Your Email">
                            @error('email')
                                <p class="v-error-message"> {{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="**************">
                            @error('password')
                                <p class="v-error-message"> {{ $message }}</p>
                            @enderror
                        </div>
                        <!-- password_confirmation -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm
                                Password</label>
                            <input type="password" id="password_confirmation" class="form-control"
                                name="password_confirmation" placeholder="**************">
                        </div>
                        <!-- Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
