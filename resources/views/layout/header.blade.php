<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <a href="/"><img src="{{ asset('media/logos/CMI_spot_logo.jpg') }}" alt="{{ config('app.name') }}"></a>
            </div>
            <div class="col-sm-12 col-md-8">
{{--                    <button class="btn btn-primary btn-wide mr-2" id="share-thought-btn">Share Your Thoughts</button>--}}
                    @auth
                        <div class="btn-group float-right">
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
                    <div class="float-right">
                        <a href="{{ route('login') }}" class="btn btn-link btn-wide">Login</a>
                    </div>
                    @endauth

            </div>
        </div>
    </div>
</div>
