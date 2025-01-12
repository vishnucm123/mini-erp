<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation -->
    @include('layout.navbar')

    <div class="content-wrapper">
        @yield('content')

        <!-- Footer -->
        @include('layout.footer')
    </div>

</body>
</html>
