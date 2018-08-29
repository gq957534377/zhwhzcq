<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="format-detection" content="telephone=no">

    <title>中华文化走出去网-{{$key}}</title>

    <meta name="keywords" content="资讯中心，滚动，时政，国际，财经，军事，娱乐，华人，图片，政权，房产，汽车，廉政，互联网，新媒体，教育，电视剧，电影，视频，访谈，直播，专题，旅游，广播，科技">
    <meta name="description" content="向世界展示中华文化独特魅力">
    <link rel="stylesheet" href="/front/list/common.css">
    {{--本页面css--}}
    <link rel="stylesheet" href="/front/list/list.css">
    <link rel="stylesheet" href="/front/list/sidebar.css">
    <link rel="stylesheet" href="/front/list/go-out.css">
    <link rel="stylesheet" href="/front/list/index1.css">
    <link rel="stylesheet" href="/front/list/footer.css">
    <style>
        @media screen and (max-width: 1270px) {
            body, .friendship-link, .footer, .div-mask {
                width: 1270px;
            }
        }
    </style>
</head>
<body>
<div class="nav">
    <div class="width1200">
        <div class="language">
            <ul>
                <li>
                    <a href="javascript:;" target="_self">English</a>
                </li>
                <li>
                    <a href="javascript:;" target="_self">Español</a>
                </li>
                <li>
                    <a href="javascript:;" target="_self">Français</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">日本語</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">한국어</a>
                </li>
                <li class="more-li">
                    <img src="/front/list/more.png">
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
                    <a href="javascript:;"
                       target="_self">北京</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">天津</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">河北</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">山西</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">陕西</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">辽宁</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">吉林</a>
                </li>
                <li>
                    <a href="javascript:;"
                       target="_self">上海</a>
                </li>
                <li class="more-li">
                    <img src="/front/list/more.png">
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
                {{--<img src="/front/list/search.png">--}}
            </div>
        </div>
    </div>
</div>
<div class="header box-shadow min-width1200">
    <div class="width1200 clear topbar">
        <div class="logo">
            <a href="/"><img style="margin-top: 3%" src="{{asset('front/index/style/logo/logo_new.png')}}"></a>
        </div>
        <div class="menu" style=" width:67%">
            <ul>
                @foreach($labels as $label)
                    <li>
                        <p>
                            <a href="{{url('/articles?position_id='.$label->id)}}">{{$label->name}}</a>
                        </p>
                    </li>

                @endforeach
            </ul>

        </div>
    </div>
</div>


{{--列表--}}
<div class="main clear">
    <div class="left">
        <div class="Chinese-beautiful" style="height: 50px;">
            <p class="Chinese-p">{{$key}}</p>
        </div>
        <div class="list">
            <ul>
                @foreach($articles as $i=>$article)
                    @if($article->type==1)
                        <li>
                            <div class="list-title">
                                <a href="/articles/{{$article->id}}">{{$article->title}}</a>
                            </div>
                            @if(!empty($article->banner))
                                <div class="list-image">
                                    <a href="/articles/{{$article->id}}"><img src="{{$article->banner}}"></a>
                                </div>
                            @endif
                            <div class="list-content">
                                <p style="font-size: 16px;">
                                    {{$article->brief}}
                                </p>
                                <span class="fst">{{$article->author}}
                                    &nbsp;&nbsp;{{$article->created_at->format('Y-m-d')}}</span>
                                {{--<span>{{$article->created_at}}</span>--}}
                            </div>
                        </li>
                    @else
                        <li>
                            <div class="list-title">
                                <a href="/articles/{{$article->id}}}">{{$article->title}}</a>
                            </div>
                            @foreach($article->atlas as $item)
                                <div class="list-image" style="margin-right: 25px;">
                                    <img src="{{$item->banner}}">
                                </div>
                            @endforeach
                        </li>
                    @endif
                        @if ($i == 2) @break @endif
                @endforeach
            </ul>
        </div>
        <input id="request-data" type="hidden" value={{json_encode(Request::all())}}>

        @if($articles->lastPage()>1)
            <div id="more" class="more-button grayborder" data-next_page="{{$articles->currentPage()+1}}">加载更多</div>
        @endif
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
                        <a href="/articles/{{$hotArticle->id}}">{{$hotArticle->title}}</a>
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
                            <a href="/articles/{{$pointArticle->id}}">
                                <img style="width: 360px;height: 210px" src="{{$pointArticle->banner}}">
                            </a>
                        </div>
                        <div class="xinwen-right-title">
                            <a href="/articles/{{$pointArticle->id}}">{{$pointArticle->title}}</a>
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
<script src="/front/list/jquery-1.12.4.min.js" type="text/javascript"></script>
<script type="application/javascript" src="/front/list/common.js"></script>
<script>
    var page = $("#more").data('next_page');
    $("#more").click(function () {
        var This = $(this);
        var url = "/article_pages";
        var data = JSON.parse($('#request-data').val());
        data.page = page;

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function (data) {
                if (data.StatusCode === 200) {
                    var html = data.ResultData.data.map(function (res) {
                        if (res.type == 1) {
                            html = '<li>';
                            html += '<div class="list-title">';
                            html += '<a href="/articles/' + res.id + '">' + res.title + '</a>';
                            html += '</div>';
                            if (res.banner) {
                                html += '<div class="list-image">';
                                html += '<a href="/articles/' + res.id + '"><img src="' + res.banner + '"></a>';
                                html += '</div>';
                            }

                            html += '<div class="list-content">';
                            html += '<p style="font-size: 16px;">';
                            html += res.brief;
                            html += '</p>';
                            html += '<span class="fst">' + res.author + '&nbsp;&nbsp;' + res.created_at + '</span>';
                            html += '</div>';
                            html += '</li>';
                        } else {
                            html += '<li>';
                            html += '<div class="list-title">';
                            html += '<a href = "/articles/' + res.id + '">' + res.title + '</a>';
                            html += '</div>';
                            html += res.atlas.map(function (img) {
                                return '<div class="list-image" style="margin-right: 25px;"><img src="' + img.banner + '"></div>';
                            });
                            html += '</li>';
                        }
                        return html;
                    });
                    console.log(html);
                    $(".list ul").append(html);
                    page = page + 1;

                    if (!data.ResultData.next_page_url || !data.ResultData.data) {
                        $("#more").html('没有更多了！');
                    }
                } else {
                    alert(data.ResultData);
                }
                // $("#more").html('加载更多');
            },
            before: function () {
                $("#more").html('加载中......');
            },
        });
    });
</script>
</html>