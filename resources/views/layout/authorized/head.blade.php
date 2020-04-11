<html lang="en" >
<head>
    <meta charset="utf-8"/>

    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('css/pages/login/login-3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages/wizard/wizard-2.css') }}" rel="stylesheet" type="text/css">
    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />        <!--end::Layout Skins -->
    <link href="{{ asset('scss/main.css') }}" rel="stylesheet" type="text/css" />

</head>
