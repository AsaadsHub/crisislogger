@auth
    <script>window.location.href = '{{ \App\Providers\RouteServiceProvider::HOME }}';</script>
@endauth
@extends('layout.app')
@section('title', '')
@section('content')

    <div class="container content">
        <div class="kt-portlet">
            <div class="kt-portlet__body">

                <h1 class="display-4">LAST STEP: User Information</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <p>Please fill in your name and a password to come back and see your previous submissions.</p>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" aria-describedby="nameHelp" name="name" placeholder="Enter full name">
                        <span class="form-text text-muted">Your full name.</span>
                    </div>

                    <div class="form-group">
                        <label>Password<span class="text-danger"></span></label>

                        <input type="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="passwordHelp" name="password" required>

                        <span class="form-text text-muted">Must be at least 8 characters.</span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password<span class="text-danger"></span></label>

                        <input type="password" class="form-control"  name="password_confirmation" required>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <!--a href="{{ route('home') }}" class="btn btn-link">Skip</a-->
                    </div>

                    <input type="hidden" value="{{ Session::get('filename') }}" name="filename" />

                </form>

                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>

@endsection
