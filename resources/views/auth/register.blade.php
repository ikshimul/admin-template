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
                        <h5 class="mb-0">Register Account</h5>
                        <p class="text-muted mt-2">Get your free {{ config('app.name') }} account now.</p>
                    </div>
					@if (session('error'))
					   <div class="alert alert-danger">
							{{ session('error') }}
					   </div>
					@endif
                    <form class="needs-validation mt-4 pt-2" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="f_name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" id="f_name" name="name" placeholder="Enter name" autofocus required />
                            @error('name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>  
                            @enderror  
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter email" required />  
                            @error('email')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>    
                            @enderror  
                        </div> 
                        <div class="mb-3">
                            <label for="userpassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password" placeholder="Enter password" required />
                            @error('password')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>  
                            @enderror      
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmed Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Enter confirmed password" required />
                            @error('confirmed')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>  
                            @enderror      
                        </div>
                        <div class="mb-4">
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ms-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button id="register-submit" class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </form>
                    <div class="mt-4 pt-2 text-center">
                        <div class="signin-other-title">
                            <!-- <h5 class="font-size-14 mb-3 text-muted fw-medium">- Login with -</h5> -->
                        </div>

                        <ul class="list-inline mb-0">
                            <!-- <li class="list-inline-item">
                                <a href="#" class="social-list-item bg-danger text-white border-danger">
                                    <i class="mdi mdi-google"></i>
                                </a>
                            </li> -->
                            <!-- <li class="list-inline-item">
                                <a href="#" class="social-list-item bg-primary text-white border-primary">
                                    <i class="mdi mdi-facebook"></i>
                                </a>
                            </li> -->
                        </ul>
                        <ul class="list-inline mb-0">
                           
                        </ul>
                    </div>
                    @if (session()->has('status'))
                        <div class="mt-5 text-center">
                            <p class="mb-0 text-danger">{{ session()->get('status') }} </p>
                        </div>
                    @endif

                     <div class="mt-5 text-center">
                        <p class="text-muted mb-0">Already have an account ?<a href="{{ route('login') }}"
                            class="text-primary fw-semibold" id="sign-up"> Login </a> 
                        </p>
                    </div>
                </div>
                <div class="mt-4 mt-md-5 text-center">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}.</p>
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
