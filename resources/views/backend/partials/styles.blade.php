<style>
    :root {
        --m-error: #df4655;
        --m-success: #48b180;
    }

    .v-error-message {
        color: var(--m-error);
    }
    .success-color {
        color: var(--m-success);
    }
</style>

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">
<!-- Libs CSS -->
<link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">




{{-- development ................................................. --}}
{{-- toastr --}}
<link rel="stylesheet" href="{{ asset('assets/dev/css/toastr.css') }}">
{{-- push --}}
</script>


{{-- dropify --}}
<link rel="stylesheet" href="{{ asset('assets/dev/css/dropify.min.css') }}">


{{-- sweet alert --}}
<style>
    .my-popup-class {
        background-color: #fffefe;
        border-radius: 10px;
        border: 2px solid #f5f7fa;
    }

    .my-title-class {
        color: #e5780b;
        font-size: 24px;
    }

    .my-content-class {
        color: #003cc7 !important;
        font-size: 16px;
    }

    .my-confirm-button-class {
        background-color: #25b003;
        color: black;
        border-radius: 5px;
        border: none;
    }
</style>
{{-- development end ................................................. --}}

@stack('styles')
