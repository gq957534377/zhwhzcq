@extends('mobile.layouts.main')

@section('content')
<!-- 新闻列表置顶 begin -->
<article class="aui-news-list aui-list-item-wrapper">
    <div class="page-loading"></div>
</article>
<!-- 新闻列表置顶 end -->
@include('mobile.partials.footer-nav')
@endsection

@section('body_end')
<script src="{{ asset('mobile/themes/js/list.js') }}"></script>
@endsection