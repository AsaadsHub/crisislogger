<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <a href="/"><img src="{{ asset('media/logos/CMI_spot_logo.jpg') }}" alt="{{ config('app.name') }}"></a>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="float-right">
                    <a href="{{ route('capture') }}" class="btn btn-primary btn-wide mr-2">Share Your Thoughts</a>
                    @auth
                        <div class="btn-group">
                            <a href="{{ route('dashboard') }}" class="btn btn-link">Dashboard</a>
                            <a class="btn btn-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link btn-wide">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
