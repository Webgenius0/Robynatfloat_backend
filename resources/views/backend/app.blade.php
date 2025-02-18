<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">
    {{-- All CSS Links --}}
    @include('.backend.partials.styles')
    {{-- All CSS Links End --}}
    <title>@yield('title')</title>
</head>

<body>
    {{-- main start --}}
    <main id="main-wrapper" class="main-wrapper">
        {{-- header --}}
        <x-backend.partials.header />
        {{-- header end --}}

        <!-- navbar vertical -->
        <x-backend.partials.nav-bar />
        <!-- navbar vertical -->

        <!-- page content -->
        <div id="app-content">
            <!-- Container fluid -->
            @yield('main')
            <!-- Container fluid end -->
        </div>
        <!-- page content end -->
    </main>
    {{-- main end --}}

    <!-- scripts -->
    @include('backend.partials.scripts')
    <!-- scripts end -->
</body>

</html>
