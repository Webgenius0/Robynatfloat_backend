<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">

    {{-- all style start --}}
    @include('.backend.partials.styles')
    {{-- all style end --}}

    <title>@yield('title')</title>
</head>

<body>
    {{-- main start start --}}
    <main id="main-wrapper" class="main-wrapper">
        {{-- header start --}}
        <x-backend.partials.header />
        {{-- header end --}}

        <!-- navbar vertical start -->
        <x-backend.partials.nav-bar />
        <!-- navbar vertical end -->

        <!-- page content start -->
        <div id="app-content">
            <!-- Container fluid start -->
            @yield('main')
            <!-- Container fluid end -->
        </div>
        <!-- page content end -->
    </main>
    {{-- main end --}}

    <!-- scripts start -->
    @include('backend.partials.scripts')
    <!-- scripts end -->
</body>

</html>
