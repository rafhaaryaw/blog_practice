<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head')
    <script src="assets/js/main.js"></script>
</head>

<body>

    <!-- ======= Header ======= -->
    @include('template.partials.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('template.partials.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('template.partials.footer')



</body>


</html>