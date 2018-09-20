<!DOCTYPE html>
<html>
<head>
    @include('mobile.partials.page-metas')
    <title>图片专题 - 中华文化走出去网</title>
    <link href="{{ asset('mobile/themes/css/base.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mobile/themes/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mobile/themes/css/icon.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<section class="aui-flexView">
    <!-- 头部信息 begin -->
    <header class="aui-navBar">
        <div class="aui-navBar-center aui-navbar-title">图片专题</div>
        <a href="{{ route('mobile.search') }}">
            <i class="aui-icon aui-icon-search"></i>
        </a>
    </header>
    <!-- 头部信息 end -->
    <div class="aui-special-list-item aui-list-item-wrapper">
        <div class="page-loading"></div>
    </div>
    @include('mobile.partials.footer-nav')
</section>
<script src="{{ asset('mobile/themes/js/flexible.js') }}"></script>
<script src="{{ asset('mobile/themes/js/jquery.min.js') }}"></script>
<script src="{{ asset('mobile/themes/js/main.js') }}"></script>
<script src="{{ asset('mobile/themes/js/specail.js') }}"></script>
</body>
</html>