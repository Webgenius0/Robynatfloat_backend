<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">
    <!-- Google tag (gtag.js) start -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>
    <!-- Google tag (gtag.js) end -->

    {{-- all style start --}}
    @include('.backend.partials.styles')
    {{-- all style end --}}

    <title>@yield('title')</title>
</head>

<body>
    {{-- main start --}}
    <main class="container d-flex flex-column">
        @yield('main')
    </main>
    {{-- main end --}}

    <!-- scripts start -->
    @include('backend.partials.scripts')
    <!-- scripts end -->
</body>

</html>
