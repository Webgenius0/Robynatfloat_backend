@extends('backend.app')

@section('title')
    Admin
@endsection

@section('main')
    <div class="app-content-area">
        <div class="bg-primary pt-10 pb-21 mt-n6 mx-n4"></div>
        <div class="container-fluid mt-n22">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0 text-white">Edit Profile</h3>
                        </div>
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-white">Back to Profile</a>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" class="card p-4">
                @csrf

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}">
                </div>

                <div class="mb-3">
                    <label for="web" class="form-label">Website</label>
                    <input type="text" class="form-control" id="web" name="web" value="{{ $profile->web }}">
                </div>

                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" name="bio">{{ $profile->bio }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cv_url" class="form-label">CV URL</label>
                    <input type="text" class="form-control" id="cv_url" name="cv_url" value="{{ $profile->cv_url }}">
                </div>

                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $profile->facebook }}">
                </div>

                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $profile->instagram }}">
                </div>

                <div class="mb-3">
                    <label for="youtube" class="form-label">YouTube</label>
                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $profile->youtube }}">
                </div>

                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $profile->linkedin }}">
                </div>

                <div class="mb-3">
                    <label for="yacht_length" class="form-label">Yacht Length</label>
                    <input type="text" class="form-control" id="yacht_length" name="yacht_length" value="{{ $profile->yacht_length }}">
                </div>

                <div class="mb-3">
                    <label for="yacht_year_build" class="form-label">Yacht Year Build</label>
                    <input type="text" class="form-control" id="yacht_year_build" name="yacht_year_build" value="{{ $profile->yacht_year_build }}">
                </div>

                <div class="mb-3">
                    <label for="yacht_location" class="form-label">Yacht Location</label>
                    <input type="text" class="form-control" id="yacht_location" name="yacht_location" value="{{ $profile->yacht_location }}">
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
