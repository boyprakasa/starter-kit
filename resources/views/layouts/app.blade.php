<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_META_DESCRIPTION') }}">
    <meta name="author" content="{{ env('APP_META_AUTHOR') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="/xa/assets/images/favicon.png">
    <title>{{ env('APP_NAME') }}</title>
    <link href="/xa/dist/css/style.min.css" rel="stylesheet">
    <link href="/xa/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
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
        @include('components.left-sidebar')
        <div class="page-wrapper">
            @include('components.app.breadcrumb')
            @yield('content')
        </div>
    </div>
    @include('components.scripts')
    @stack('sub-scripts')
</body>

</html>
