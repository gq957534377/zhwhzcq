@extends('mobile.layouts.main')

@section('content')
    <section class="aui-scrollView">
        <div class="aui-content">
            <!-- 首页轮播滚动 begin -->
            <div class="m-slider" data-ydui-slider>
                <div class="slider-wrapper">
                    @foreach($banners as $banner)
                    <div class="slider-item">
                        <a href="{{ $banner->url }}">
                            <p class="aui-slider-text">{{ $banner->title }}</p>
                            <img src="{{ $banner->banner_url }}">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="slider-pagination"></div>
            </div>
            <!-- 首页轮播滚动 end -->

            <!-- 新闻列表 begin -->
            <div class="aui-news-box">
                <article class="aui-news-list">
                    @foreach($news_list as $news_cate => $news_items)
                        @foreach($news_items as $news)
                            @if($news->type == 1)
                                <a href="{{ route('mobile.article.detail', [], false) }}?articleId={{ $news->id }}" class="aui-news-item">
                                    <div class="aui-news-item-img">
                                        <img src="{{ $news->banner_url }}" title="" alt="">
                                    </div>
                                    <div class="aui-news-item-text">
                                        <h2 class="aui-news-item-text-title">外交部：美方动作频频 暴露“只能我有，不允许你有”霸权心态</h2>
                                        <p class="aui-news-item-text-text">华春莹表示，在中国苹果手机随处可见，我们不觉得是威胁，但美国如果有人买了华为手机</p>
                                        <div class="aui-news-item-text-info">
                                            <span class="aui-news-item-text-info-text">新华社&nbsp;&nbsp;&nbsp;2018-09-08</span>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="special.html" class="aui-news-item aui-news-list-two">
                                    <h2 class="aui-news-item-text-title aui-news-item-text-title-special">江苏调查连云港灌河口化工园区污染事件：已挖到疑似排污暗管</h2>
                                    <div class="clearfix">
                                        @foreach($news->atlas as $atlas)
                                            <div class="aui-news-item-img">
                                                <img src="{{ $atlas->banner_url }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="aui-news-item-text">
                                        <div class="aui-news-item-text-info">
                                            <span class="aui-news-item-text-info-text">新华社&nbsp;&nbsp;&nbsp;2018-09-08</span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @endforeach
                </article>
            </div>
            <!-- 新闻列表 end -->

        </div>
        @include('mobile.partials.footer-nav')
    </section>
@endsection