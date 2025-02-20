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
                        <p class="mb-6">Thanks for signing up! Before getting started, could you verify your email address
                            by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly
                            send you another.</p>

                        @if (session('status') == 'verification-link-sent')
                            <p class="mb-6 success-color">A new verification link has been sent to the email address you
                                provided during registration.</p>
                        @endif
                    </div>
                    <!-- Form -->
                    <form method="POST" action="{{ route('admin.verification.notice') }}">
                        @csrf
                        <!-- Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                                Resend Verification Email
                            </button>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <!-- Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                                Log Out
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
