<!DOCTYPE html>
<html>
<head>
    @include('mobile.partials.page-metas')
    <title>中华文化走出去网</title>
    <link href="{{ asset('mobile/themes/css/base.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mobile/themes/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mobile/themes/css/icon.css') }}" rel="stylesheet" type="text/css" />
    @yield('html_head')
</head>

<body>
<section class="aui-flexView">
    @include('mobile.partials.header')
    @include('mobile.partials.header-nav')
    @yield('content')
</section>
<script src="{{ asset('mobile/themes/js/flexible.js') }}"></script>
<script src="{{ asset('mobile/themes/js/jquery.min.js') }}"></script>
<script src="{{ asset('mobile/themes/js/main.js') }}"></script>
@yield('body_end')
@include('mobile.partials.stats')
</body>

</html>