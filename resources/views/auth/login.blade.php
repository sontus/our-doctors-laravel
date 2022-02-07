
@extends('layouts.auth')
@section('title','Login')

@push('vendor-css')
    
@endpush
@push('onpage-css')
    
@endpush
@section('content')

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('assets/backend/images/logo-full.png')}}" alt="">
                                </div>
                                <h4 class="text-center mb-4">{{ __('Login') }}</h4>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="mb-1"><strong>{{ __('E-Mail Address') }}</strong></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="hello@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>{{ __('Password') }}</strong></label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                           <div class="custom-control custom-checkbox ml-1">
                                                <input type="checkbox" class="custom-control-input" id="basic_checkbox_1" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>

                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if (Route::has('password.request'))
                                                <a  href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>Don't have an account? <a class="text-primary" href="{{ route('register')}}">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('vendor-js')
    
@endpush
@push('onpage-js')
    
@endpush
