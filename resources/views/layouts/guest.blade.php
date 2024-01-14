<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- preloader css -->
        <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
         <!-- Icons Css -->
         <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Scripts -->
        <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
        <!-- Styles -->
        @livewireStyles
        <style>
		.auth-bg {
			  background-image: url(/assets/images/auth-bg.jpg);
			  background-position: center;
			  background-size: cover;
			  background-repeat: no-repeat;
			}
            #sidebar-menu .mm-active > .has-arrow:after {
                transform: rotate(-133deg);
            }

            #sidebar-menu .has-arrow:after {
                content:"";
                display: block;
                float: right;
                transition: transform 0.2s;
                font-size: .9rem;
                margin-right: 5px;
                margin-top: -2px;
            }

            .metismenu .has-arrow::after {
                transform: rotate(135deg) translate(0, -50%);
            }
            .btn-light{
                padding: 0.47rem 0.75rem;
            }
        </style>
    </head>
    <body>
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    {{ $slot }}
                </div>
            </div>
        </div>
         <!-- JAVASCRIPT -->
         <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/pace.min.js') }}"></script>
        @livewireScripts
        @stack('footer')
    </body>
</html>

