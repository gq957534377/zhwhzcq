<!DOCTYPE html>
<html>
<head>
    @include('mobile.partials.page-metas')
    <title>搜索 - 中华文化走出去网</title>
    <link href="{{ asset('mobile/themes/css/base.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mobile/themes/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mobile/themes/css/icon.css') }}" rel="stylesheet" type="text/css" />
</head>

<body style="background:#fff">
<section class="aui-flexView">
    <header class="aui-navBar aui-navbar-detail">
        <div class="aui-navBar-center aui-navBar-center-clear">
            <div class="aui-search-key aui-search-key-color">
                <i class="aui-icon aui-icon-search"></i>
                <input type="text" placeholder="输入关键词" class="aui-search-key-in">
            </div>
        </div>
        <a href="javascript:void(0);" class="aui-navBar-item aui-item-search" style="color:#eb4245">搜索 &nbsp;</a>
    </header>
    <!-- 新闻列表置顶 begin -->
    <article class="aui-news-list aui-list-item-wrapper" style="padding-bottom: 0;">
        <div class="page-loading"></div>
    </article>
    <!-- 新闻列表置顶 end -->
</section>

<script src="{{ asset('mobile/themes/js/flexible.js') }}"></script>
<script src="{{ asset('mobile/themes/js/jquery.min.js') }}"></script>
<script src="{{ asset('mobile/themes/js/main.js') }}"></script>
<script src="{{ asset('mobile/themes/js/search.js') }}"></script>
</body>

</html>