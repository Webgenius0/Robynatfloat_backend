@extends('backend.auth')

@section('title')
    Register
@endsection

@section('main')
    <div class="row align-items-center justify-content-center g-0
min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
            <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle d-none">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>

            </a>
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        <a href="../index-2.html"><img src="../assets/images/brand/logo/logo-2.svg"
                                class="mb-2  text-inverse" alt="Image"></a>
                        <p class="mb-6">Please enter your user information.</p>

                    </div>
                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- first_name -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name"
                                placeholder="First name" value="{{ old('first_name') }}">
                            @error('first_name')
                                <p class="v-error-message"> {{ $message }}</p>
                            @enderror
                        </div>
                        <!-- last_name -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label">First Name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name"
                                placeholder="First name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <p class="v-error-message"> {{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email"
                                placeholder="Email address here" value="{{ old('email') }}">
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
                        <!-- Checkbox -->
                        <div class="mb-3">
                            <div class="form-check custom-checkbox" style="padding-left: 0px;">
                                <input type="checkbox" class="policy" id="policy" name="policy">
                                <label class="form-check-label" for="policy"><span class="fs-5">I agree to the <a
                                            href="terms-condition-page.html">Terms of
                                            Service </a>and
                                        <a href="terms-condition-page.html">Privacy Policy.</a></span>
                                </label>
                                @error('policy')
                                    <p class="v-error-message"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Create Free Account
                                </button>
                            </div>

                            <div class="d-md-flex justify-content-between mt-4">
                                <div class="mb-2 mb-md-0">
                                    <a href="{{ route('login') }}" class="fs-5">Already
                                        member? Login </a>
                                </div>
                                <div>
                                    <a href="{{ route('password.request') }}" class="text-inherit fs-5">Forgot your
                                        password?</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
