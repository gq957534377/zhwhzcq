<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{$article->title}}</title>

    <meta name="keywords" content="资讯中心，滚动，时政，国际，财经，军事，娱乐，华人，图片，政权，房产，汽车，廉政，互联网，新媒体，教育，电视剧，电影，视频，访谈，直播，专题，旅游，广播，科技">
    <meta name="description" content="向世界展示中华文化独特魅力">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/front/info/detail.css">
    <link rel="stylesheet" href="/front/info/sidebar.css">
    <link rel="stylesheet" href="/front/info/footer.css">
    <style>
        @media screen and (max-width: 1270px) {
            body, .friendship-link, .footer, .div-mask {
                width: 1270px;
            }
        }
    </style>
</head>
<body>

<link rel="stylesheet" href="/front/info/common.css">
<div class="nav">
    <div class="width1200">
        <div class="language">
            <ul>
                <li>
                    <a href="#" target="_self">English</a>
                </li>
                <li>
                    <a href="#" target="_self">Español</a>
                </li>
                <li>
                    <a href="#" target="_self">Français</a>
                </li>
                <li>
                    <a href="#" target="_self">日本語</a>
                </li>
                <li>
                    <a href="#" target="_self">한국어</a>
                </li>
                <li class="more-li">
                    <img src="/front/info/more.png">
                    <!--                    <div class="language-more display-none">-->
                    <!--                        <div>-->
                    <!--                            <p>-->
                    <!--                                <a href="#" target="_self">한국어</a>-->
                    <!--                            </p>-->
                    <!--                            <p>-->
                    <!--                                <a href="#" target="_self">한국어</a>-->
                    <!--                            </p>-->
                    <!--                            <p>-->
                    <!--                                <a href="#" target="_self">한국어</a>-->
                    <!--                            </p>-->
                    <!--                            <p>-->
                    <!--                                <a href="#" target="_self">한국어</a>-->
                    <!--                            </p>-->
                    <!--                            <p>-->
                    <!--                                <a href="#" target="_self">한국어</a>-->
                    <!--                            </p>-->
                    <!--                            <p>-->
                    <!--                                <a href="#" target="_self">한국어</a>-->
                    <!--                            </p>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </li>
            </ul>
        </div>
        <div class="language-line">|</div>
        <div class="city">
            <ul>
                <li>
                    <a href="#" target="_self">北京</a>
                </li>
                <li>
                    <a href="#" target="_self">天津</a>
                </li>
                <li>
                    <a href="#" target="_self">河北</a>
                </li>
                <li>
                    <a href="#" target="_self">山西</a>
                </li>
                <li>
                    <a href="#" target="_self">陕西</a>
                </li>
                <li>
                    <a href="#" target="_self">辽宁</a>
                </li>
                <li>
                    <a href="#" target="_self">吉林</a>
                </li>
                <li>
                    <a href="#" target="_self">上海</a>
                </li>
                <li class="more-li">
                    <img src="/front/info/more.png">
                    <div class="city-more display-none">
                        <!--                        <div>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">哈尔滨</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                            <p>-->
                        <!--                                <a href="#" target="_self">上海</a>-->
                        <!--                            </p>-->
                        <!--                        </div>-->
                    </div>
                </li>
            </ul>
        </div>
        <div class="search">
            {{--<input type="text" placeholder="搜索">--}}
            <div class="search-button">
                {{--<img src="/front/info/search.png">--}}
            </div>
        </div>
    </div>
</div>
<div class="header box-shadow min-width1200">
    <div class="width1200 clear">
        <div class="logo">
            <a href="javascript:;" target="_blank"><img src="{{asset('front/index/style/logo/logo_new.png')}}"></a>
        </div>
        <div class="menu" style="width: 67%">
            <ul>
                @foreach($labels as $label)
                    <li>
                        <p>
                            <a href="{{url('/articles?position_id='.$label->id)}}"
                               target="_blank">{{$label->name}}</a>
                        </p>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>
</div>


<div class="main clear">
    <div class="left">
        <div class="article box-shadow">
            <div class="article-title">{{$article->title}}</div>
            <div class="article-about clear">
                <div class="float-left">
                    <span class="article-time">发布时间：{{$article->created_at}}</span>
                    <span class="article-from">来源：                            <a
                                href="http://www.taiwan.cn/31t/wh31/201804/t20180423_11947430.htm" target="_blank"
                                rel="nofollow">{{$article->source}}</a>
                        </span>
                </div>
                <div class="float-right">
                    <!--                    <span class="article-commit"><img src="--><!--" />评论&nbsp;(111)</span>-->
                    <!--                    <span class="article-collect"><img src="--><!--" />收藏&nbsp;(35)</span>-->
                </div>
            </div>
            <div class="split-line"></div>
            <!--            <div class="article-title-old">原标题：饿了么等三大外卖平台被诉破坏环境</div>-->
            <div class="article-content" id="con">
                {!! $article->content !!}
            </div>
        </div>
    </div>
    <div class="right">
        <div class="hot">
            <div class="hot-title clear">
                <div>热点排行</div>
            </div>
            <ul>
                @foreach($hotArticles as  $k => $hotArticle)
                    <li>
                        <div>{{$k+1}}</div>
                        <a href="/articles/{{$hotArticle->id}}"
                           target="_blank">{{$hotArticle->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="recommand">
            <div class="hot-title clear">
                <div>精彩推荐</div>
            </div>
            <ul>
                @foreach($pointArticles as  $pointArticle)
                    <li>
                        <div class="xinwen-right-image">
                            <a href="/articles/{{$pointArticle->id}}"
                               target="_blank">
                                <img style="width: 360px;height: 210px" src="{{$pointArticle->banner}}">
                            </a>
                        </div>
                        <div class="xinwen-right-title">
                            <a href="/articles/{{$pointArticle->id}}"
                               target="_blank">{{$pointArticle->title}}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="friendship-link">
    <div class="link-center">
        <div class="link-five">
            <p class="link-p">友情链接:</p>
            <!--<div class="left-clear"></div>-->
            <span><a target="_blank" href="http://www.npc.gov.cn/">全国人大</a></span>|
            <span><a target="_blank" href="http://www.cppcc.gov.cn/">全国政协</a></span>|
            <span><a target="_blank" href="http://www.gov.cn/">国务院</a></span>|
            <span><a target="_blank" href="http://www.court.gov.cn/">最高法院</a></span>|
            <span><a target="_blank" href="http://www.spp.gov.cn/">最高检察院</a></span>

        </div>

        <div class="link-network">
            <p class="link-network-p">外宣网站:</p>
            <span><a target="_blank" href="http://www.chinaxinjiang.cn/">中国新疆网</a></span>|
            <span><a target="_blank" href="http://www.tibet.cn/">中国西藏网</a></span>|
            <span><a target="_blank" href="http://www.cicc.org.cn/">五洲传播网</a></span>|
            <span><a target="_blank" href="http://en.people.cn/">人民网英文频道</a></span>|
            <span><a target="_blank" href="http://www.china.org.cn/chinese/node_7160004.htm">中国网英文频道</a></span>|
            <span><a target="_blank" href="http://english.cctv.com/">央视网英文频道</a></span>|
            <span><a target="_blank" href="http://chinaplus.cri.cn/">国际在线英文频道</a></span>|
            <span><a target="_blank" href="https://www.shine.cn/">上海日报</a></span>|
            <span><a target="_blank" href="http://en.youth.cn/">中青网英文频道</a></span>|
            <span><a target="_blank" href="http://www.ecns.cn/">中新网英文频道</a></span>|
            <span><a target="_blank" href="http://en.gmw.cn/">光明网英文频道</a></span>
        </div>
    </div>
</div>

@include('frontend.includes.footer')

</body>
<script src="/front/info/jquery-1.12.4.min.js" type="text/javascript"></script>
<script type="application/javascript" src="/front/info/common.js"></script>
</html>