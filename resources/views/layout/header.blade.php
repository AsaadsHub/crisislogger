<div class="header" style="text-align: center;">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3 my-auto">
                <a href="/"><img src="{{ asset('media/logos/CMI_spot_logo.jpg') }}" alt="{{ config('app.name') }}"></a>
            </div>
            <div class="col-6 col-md-3 my-auto">
                <img src="{{ asset('media/logos/parents_magazine_logo.png') }}" alt="{{ config('app.name') }}" id="parents_magazine_logo">
            </div>
            <div class="col-12 col-md-6 my-auto mx-auto">
               
                <div class="float-right">
                    <a href="{{ route('capture-choice') }}" class="btn btn-primary btn-wide mr-2">Share Your Thoughts</a>

                    @auth
                        <div class="btn-group">
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
</div>
