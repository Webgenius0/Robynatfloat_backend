<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">
    {{-- All CSS Links --}}
    @include('.backend.partials.styles')
    <title>Project | Dash UI - Responsive Bootstrap 5 Admin Dashboard</title>
</head>

<body>
    <main id="main-wrapper" class="main-wrapper">
        {{-- header --}}
        <x-backend.partials.header />
        <!-- navbar vertical -->
        <x-backend.partials.nav-bar />


        <!-- Page content -->
        <div id="app-content">
            <!-- Container fluid -->
            @yield('main')
        </div>
    </main>

    <!-- Scripts -->
    @include('backend.partials.scripts')

</body>



</html>
