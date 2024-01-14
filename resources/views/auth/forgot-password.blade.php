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
                        <!-- <h5 class="mb-0">Reset Password</h5> -->
                        <p class="text-muted mt-2">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success text-center my-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="mt-4" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"  name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                            @error('email')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>    
                            @enderror 
                        </div>
                        <div class="mb-3 mt-4">
                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">{{ __('Email Password Reset Link') }}</button>
                        </div>
                    </form>

                    <div class="mt-5 text-center">
                        <p class="text-muted mb-0">Remember It ?  <a href="{{url('login')}}" class="text-primary fw-semibold"> Sign In </a> </p>
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
