@extends('backend.app')

@section('title')
    Mail Settings - Admin
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/dev/css/datatables.min.css') }}">
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
    </style>
@endpush


@section('main')
    <div id="overlay"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5); z-index:9999;">
    </div>
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="mb-5">
                        <h3 class="mb-0 ">Mail Setting</h3>
                    </div>
                </div>
            </div>
            <div>



                <form id="mailSettingsForm">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <label for="mail_mailer" class="col-md-3 form-label">MAIL MAILER</label>
                        <div class="col-md-9">
                            <input class="form-control @error('mail_mailer') is-invalid @enderror" id="mail_mailer"
                                name="mail_mailer" placeholder="Enter your mail mailer" type="text"
                                value="{{ env('MAIL_MAILER') }}">
                            @error('mail_mailer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="mail_host" class="col-md-3 form-label">MAIL HOST</label>
                        <div class="col-md-9">
                            <input class="form-control" id="mail_host" name="mail_host" placeholder="Enter your mail host" type="text"
                                value="{{ env('MAIL_HOST') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="mail_port" class="col-md-3 form-label">MAIL PORT</label>
                        <div class="col-md-9">
                            <input class="form-control" id="mail_port" name="mail_port" placeholder="Enter your mail port" type="text"
                                value="{{ env('MAIL_PORT') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="mail_username" class="col-md-3 form-label">MAIL USERNAME</label>
                        <div class="col-md-9">
                            <input class="form-control" id="mail_username" name="mail_username" placeholder="Enter your mail username" type="text"
                                value="{{ env('MAIL_USERNAME') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="mail_password" class="col-md-3 form-label">MAIL PASSWORD</label>
                        <div class="col-md-9">
                            <input class="form-control" id="mail_password" name="mail_password" placeholder="Enter your mail password" type="password"
                                value="{{ env('MAIL_PASSWORD') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="mail_encryption" class="col-md-3 form-label">MAIL ENCRYPTION</label>
                        <div class="col-md-9">
                            <input class="form-control" id="mail_encryption" name="mail_encryption" placeholder="Enter mail encryption type" type="text"
                                value="{{ env('MAIL_ENCRYPTION') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="mail_from_address" class="col-md-3 form-label">MAIL FROM ADDRESS</label>
                        <div class="col-md-9">
                            <input class="form-control" id="mail_from_address" name="mail_from_address" placeholder="Enter sender email" type="email"
                                value="{{ env('MAIL_FROM_ADDRESS') }}">
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <button class="btn btn-primary" type="button" id="updateMailSettings">Submit</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
    $('#updateMailSettings').click(function(e) {
        e.preventDefault();

        var formData = {
            _token: '{{ csrf_token() }}',
            _method: 'PUT',
            mail_mailer: $('#mail_mailer').val(),           // Add mail_mailer here
            mail_host: $('#mail_host').val(),
            mail_port: $('#mail_port').val(),
            mail_username: $('#mail_username').val(),
            mail_password: $('#mail_password').val(),
            mail_encryption: $('#mail_encryption').val(),
            mail_from_address: $('#mail_from_address').val()
        };

        $.ajax({
            url: "{{ route('admin.setting.mail.update') }}",  // Update mail settings route
            type: "POST",
            data: formData,
            success: function(response) {
                alert('Mail settings updated successfully');
                location.reload();
            },
            error: function(response) {
                alert('Failed to update mail settings');
            }
        });
    });
});

</script>
@endpush
