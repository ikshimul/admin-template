<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('/')}}/assets/images/favicon.ico">
        <!-- Sweet Alert-->
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
        <!-- preloader css -->
        <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}" />
         <!-- twitter-bootstrap-wizard css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
        <!-- Bootstrap Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/metismenu/metisMenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/simplebar/simplebar.min.css') }}">
        <!-- Icons Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}" />
        <!-- Scripts -->
        <!-- Styles -->
        @livewireStyles
        <link href="{{ asset('assets/css/table.css') }}?1" id="table-style" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/table.css') }}?1" id="table-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.css') }}?1" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Custom Css -->
        <link href="{{ asset('assets/css/custom.css') }}?10" id="custom-style" rel="stylesheet" type="text/css" />
    </head>
    <body class="pace-done modal-open">
        <div class="pace pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
          </div>
        <div class="pace-activity"></div></div>
        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <x-common.top-nav />

            <!-- Left Sidebar Start -->
            <x-common.aside />
            <!-- @livewire('navigation-menu') -->
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <!-- Page Heading -->
                        @if (isset($header))
                            <header class="bg-white dark:bg-gray-800 shadow">
                                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                            </header>
                        @endif
                        <!-- end page title -->

                        <x-common.alert />

                        <div class="row">
                            <div class="col-12">
                                {{ $slot }}
                            </div>
                        </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <x-common.footer />
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <x-common.right />
        <x-banner />
        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>
        <script src="{{ asset('assets/feather-icons/feather.min.js') }}"></script>
        <!-- pace js -->
        <script src="{{ asset('assets/js/pace.min.js') }}"></script>
        <!-- twitter-bootstrap-wizard js -->
	    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ asset('assets/js/form-wizard.init.js') }}"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- Alpine js 3 -->
        <script src="{{ asset('assets/libs/intlTelInput/js/intlTelInput.min.js') }}"></script>
        <script src="{{ asset('assets/libs/intlTelInput/js/utils.js') }}"></script>
        @stack('modals')
        @livewireScripts
    </body>
</html>
