<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ogani | DashBoard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/admin/vendorsadmin/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/vendorsadmin/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/vendorsadmin/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/admin/vendorsadmin/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/vendorsadmin/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/admin/cssadmin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/vendorsadmin/sweetalerts/sweetalert2.min.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="" />
    @stack('css')

</head>

<body>


    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('admin.partials.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            @include('admin.partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-inner-wraper">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                bootstrapdash.com 2020</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                    templates</a> from Bootstrapdash.com</span>
                        </div>
                    </div>
                </footer>
                <!-- partial -->

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/admin/vendorsadmin/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('/admin/vendorsadmin/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/admin/vendorsadmin/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/admin/jsadmin/off-canvas.js') }}"></script>
    <script src="{{ asset('/admin/jsadmin/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/admin/jsadmin/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->

    <script src="{{ asset('/vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="{{ asset('/admin/jsadmin/file-upload.js') }}"></script>
    <script src="{{ asset('/admin/jsadmin/typeahead.js') }}"></script>
    <script src="{{ asset('/admin/jsadmin/select2.js') }}"></script>
    <!-- End custom js for this page -->


    <!-- End custom js for this page -->
    @include('sweetalert::alert')
    @stack('scripts')
</body>

</html>
