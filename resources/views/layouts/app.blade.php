<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_META_DESCRIPTION') }}">
    <meta name="author" content="{{ env('APP_META_AUTHOR') }}">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="/xa/assets/images/favicon.png">
    <title>{{ env('APP_NAME') }}</title>
    @include('components.styles')
    @stack('sub-styles')
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('components.header')
        @if (auth()->user()->memberProfile)
            @include('components.sidebar-member')
        @else
            @include('components.sidebar-admin')
        @endif
        <div class="page-wrapper">
            @include('components.app.breadcrumb')
            @yield('content')
            <footer class="footer text-center">
                All Rights Reserved by Xtreme admin. Designed and Developed by
                <a href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>
</body>

@include('components.scripts')
@stack('sub-scripts')

</html>
