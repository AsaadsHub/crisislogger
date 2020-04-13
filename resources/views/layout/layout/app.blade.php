@include('layout.head')

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('media/bg/bg-3.jpg') }});">
                @include('layout.header')
                @yield('content')
            </div>
        </div>
    </div>
    <!-- end:: Page -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <p>©2020 Child Mind Institute</p>
                </div>
                <div class="col-sm-12 col-md-3">
                    <img src="{{ asset('media/logos/open-humans.png') }}" alt="" style="" />
                </div>
            </div>
        </div>
    </footer>
    @include('layout.footer')
</body>
