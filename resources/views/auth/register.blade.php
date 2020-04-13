@extends('layout.app')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
        <div class="kt-login__container">
            <div class="kt-login__logo">
                <a href="#">
                    <img style="max-width:150px;" src="{{ asset('media/logos/CMI_spot_logo.jpg') }}">
                </a>
            </div>
            <div class="kt-login__signin">
                <div class="kt-login__head">
                    <h3 class="kt-login__title">Register for {{ config('app.name') }}</h3>
                </div>
                <form class="kt-form" action="{{ route('register') }}">
                    @csrf

                    @include('components.input', [
                        'id' => 'email',
                        'name' => 'email',
                        'type' => 'email',
                        'value' => old('email'),
                        'placeholder' => 'Email Address',
                        'required' => true
                    ])

                    @include('components.input', [
                        'id' => 'password',
                        'name' => 'password',
                        'type' => 'password',
                        'placeholder' => 'Password',
                        'required' => true
                    ])

                    @include('components.input', [
                        'id' => 'password_confirmation',
                        'name' => 'password_confirmation',
                        'type' => 'password',
                        'placeholder' => 'Password Confirmation',
                        'required' => true
                    ])

                    <div class="row kt-login__extra">
                        <div class="col">
                            <label class="kt-checkbox">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-login__actions">
                        <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
