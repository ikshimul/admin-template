<x-guest-layout>
<div class="col-xxl-3 col-lg-4 col-md-5">
    <div class="auth-full-page-content d-flex p-sm-5 p-4">
        <div class="w-100">
            <div class="d-flex flex-column h-100">
                <div class="mb-4 mb-md-5 text-center">
                    <a href="#" class="d-block auth-logo">
                        <img src="{{url('/')}}/assets/images/logo-sm.svg" alt="{{ config('app.name') }}" height="28"> <span class="logo-txt">{{ config('app.name') }}</span>
                    </a>
                </div>
                <!-- <div class="mb-2 mb-md-5 text-center">
                    <a href="{{url('/')}}" class="d-block auth-logo">
                        <img
                            src="{{url('/')}}/assets/images/logo-sm.svg" alt="" height="66">
                            <span class="logo-txt d-block mt-3">{{ config('app.name') }}</span>
                    </a>
                </div> -->
                <div class="auth-content my-auto">
                    <div class="text-center">
                        <div class="avatar-lg mx-auto">
                            <div class="avatar-title rounded-circle bg-light">
                                <i class="bx bxs-envelope h2 mb-0 text-primary"></i>
                            </div>
                        </div>
                        <h5 class="p-2 mt-4">Verify your email</h5>
                        <p class="text-muted mt-2">
                        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </p>
                    
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 fw-medium text-sm text-success dark:text-green-400">
                                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            
                            <div>
                                <x-button type="submit" class="btn btn-primary w-10">
                                    {{ __('Resend Verification Email') }}
                                </x-button>
                            </div>
                        </form>

                        <div class="mt-3 text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                <a href="{{ route('profile.show') }}" class="btn btn-link btn-rounded waves-effect"> {{ __('Edit Profile') }} </a>
                                </li>
                                <li class="list-inline-item">
                                <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a 
                                            class="btn btn-link btn-rounded waves-effect" 
                                            href="{{ route('logout') }}" 
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                        >
                                        {{ __('Logout') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mt-md-5 text-center">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}   .</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end auth full page content -->
</div>
<!-- end col -->
<div class="col-xxl-9 col-lg-8 col-md-7">
    <div class="auth-bg pt-md-5 p-4 d-flex">
        <div class="bg-overlay bg-primary"></div>
        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <!-- end bubble effect -->
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-7">
                <div class="p-0 p-sm-4 px-xl-0">

                    <!-- end review carousel -->
                </div>
            </div>
        </div>

    </div>
</div>
</x-guest-layout>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    {{ __('Edit Profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ms-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
