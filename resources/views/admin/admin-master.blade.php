<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Bitecom Admin | Dashboard</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ asset('backend/css/sleek.css') }}" />

    <!-- TOASTR CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- FAVICON -->
    <link href="{{ asset('backend/img/favicon.png') }}" rel="shortcut icon" />

    <script src="{{ asset('assets/plugins/nprogress/nprogress.js') }}"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();

    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <div class="page-wrapper">
            <!-- Header -->
            @include('admin.partials.header')

            <!-- Main -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Footer -->
            @include('admin.partials.footer')
        </div>

    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/jekyll-search.min.js') }}"></script>
    <script src="{{ asset('backend/js/sleek.js') }}"></script>
    <script src="{{ asset('backend/js/chart.js') }}"></script>
    <script src="{{ asset('backend/js/date-range.js') }}"></script>
    <script src="{{ asset('backend/js/map.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
                case 'info' :
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success' :
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning' :
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error' :
                toastr.error(" {{ Session::get('message') }} ");
                break;
            }
        @endif
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/js/code.js') }}"></script>
</body>

</html>
