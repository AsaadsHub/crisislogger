@extends('layout.authorized.app')
@section('title', '')
@section('profile-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Update My Profile
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        @if(Session::has('profile_success'))
                            <div class="alert alert-success" role="alert">
                                <div class="alert-text">{{ Session::get('profile_success') }}</div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('user_update') }}">
                            @csrf
                            <div class="form-group validated">
                                <label for="email">Email Address</label>
                                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ Auth::user()->email }}" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control @error('name') is_invalid @enderror" value="{{ Auth::user()->name }}" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Change My Password
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        @if(Session::has('password_success'))
                            <div class="alert alert-success" role="alert">
                                <div class="alert-text">{{ Session::get('password_success') }}</div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('user_change_password') }}">
                            @csrf
                            <div class="form-group validated">
                                <label for="old_password">Old Password</label>
                                <input id="old_password" type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required />
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group validated">
                                <label for="password">New Password</label>
                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group validated">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required />
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

