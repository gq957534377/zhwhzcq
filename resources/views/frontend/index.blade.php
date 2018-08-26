<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="renderer" content="ie-comp">
    <meta http-equiv="X-UA-Compatible" content="IE=8"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/front/index/style/css/css.css"/>
    <link rel="stylesheet" type="text/css" href="/front/index/style/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/front/info/footer.css"/>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <script type="text/javascript" src="/front/index/style/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/front/index/style/js/jquery.timeago.js"></script>
</head>
<body>
<!--网站公共头部-->
<div class="topbar">
    <div class=" wrapper">
        <div class="logo">
            <a href="/" title="" target="_self">
                <img src="{{ asset('front/index/style/logo/logo_new.png') }}"/>
            </a>
        </div>
        <ul class="nav">
            @foreach($labels as $label)
                <li>
                    <strong>
                        <a href="{{url('/articles?position_id='.$label->id)}}"
                           target="_self">{{$label->name}}</a>
                    </strong>
                    <dl>
                @foreach($label->childPositions as $childLabel)
                    <li>
                        <a href="{{url('/articles?position_id='.$childLabel->id)}}"
                           target="_self">{{$childLabel->name}}</a>
                    </li>
                    @endforeach
                    </dl>
                    </li>
                @endforeach
        </ul>
        <div class="mtopic">
            <a href="/articles?position_id=47"><img
                        src="{{ asset('/front/index/style/topic/mtopic-201808242159.jpg') }}"/></a>
        </div>
        <div class="msearch">
            <form action="/articles" method="get" target="_blank">
                <input type="text" placeholder="输入关键词" class="text-msearch" name="title">
                <input type="submit" value="" class="btn-msearch">
            </form>
        </div>

        <div class="langchose">
            <a class="active" href="#">中文</a>
            <a href="#">Eng</a>
            <a href="#">其他</a>
        </div>

        <div class="action">

            <div class="userbar">
                <div class="user" id="show_userinfo">
                    <a href="javascript:;" class="n4 head-username">游 客</a>
                    <ul class="drap">
                        <li class="i3"><a href="javascript:void(0);" onclick="AjaxReg()" target="_self"
                                          class="head-register">注 册</a></li>
                        <li class="i4"><a href="javascript:void(0);" target="_self" onclick="AjaxLog()"
                                          class="head-login">登 陆</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div>
<!--@网站公共头部-->
<div class="main">
    <!--主要内容-->
    <div class="mainnews">
        <!--顶部文字新闻
        <div class="latestnews">
            <ul id="miniNewsRegion">
                <li><a href="/kuaibao/yunying/11214.html" title="近500微信公众号被处罚传递了什么信息">近500微信公众号被处罚传递了什么信息</a><a href="/kuaibao/yunying/11213.html" title="互联网时代创业，是坑，还是一片蓝天！">互联网时代创业，是坑，还是一片蓝天！</a></li><li><a href="/kuaibao/yunying/11212.html" title="2015年微信公众号运营突围手册，微商必看！">2015年微信公众号运营突围手册，微商必看！</a><a href="/kuaibao/yunying/11211.html" title="699元：中兴联手中国电信发布小鲜2">699元：中兴联手中国电信发布小鲜2</a></li><li><a href="/kuaibao/yunying/11210.html" title="乐视手机遭科技媒体吐槽，但却取悦了消费者">乐视手机遭科技媒体吐槽，但却取悦了消费者</a><a href="/kuaibao/yunying/11209.html" title="诺基亚突围方向：卖功能机给农村大妈">诺基亚突围方向：卖功能机给农村大妈</a></li><li><a href="/kuaibao/yunying/11208.html" title="失去梦想的众筹还有什么？">失去梦想的众筹还有什么？</a><a href="/kuaibao/yunying/11207.html" title="作死的营销：说下危机公关中的加多宝与烧烤#隔壁老王，见笑了吧#">作死的营销：说下危机公关中的加多宝与烧烤#隔壁老王，见笑了吧#</a></li><li><a href="/kuaibao/yunying/11206.html" title="传统企业不要过分迷恋互联网+">传统企业不要过分迷恋互联网+</a><a href="/kuaibao/yunying/11205.html" title="电商转型微商渠道必学的核心">电商转型微商渠道必学的核心</a></li>		</ul>

         </div>
        左侧-->
        <div class="newsl">
            <!-- 首页幻灯片 -->
            <div class="m-slide">
                <ul class="img">
                    @foreach($banners as $banner)
                        <li>
                            <a href="{{ $banner->url }}"
                               title="{{$banner->title}}">
                                <img src="{{$banner->file}}" alt="{{$banner->title}}"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div id="ifocus_opdiv"></div>
                <div id="ifocus_tx">
                    <ul>
                        @foreach($banners as $banner)
                            <li><a href="{{ $banner->url}}"
                                   title="{{$banner->title}}">{{$banner->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <ul class="tab">
                    @if(count($banners)>1)
                        @foreach($banners as $key => $banner)
                            <li>
                                <div class="color{{$key+1}}">{{$key+1}}</div>
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>
        <!-- @首页幻灯片 -->
            <!-- 广告位01 -->
            <div class="leftbanber">
                <a href="http://www.cicc.org.cn/html/2018/dtzx_0823/4957.html" target="_blank">
                    <img src="{{ asset('/front/index/d/a/ad_index_middle_banner.jpg') }}"/>
                </a>
            </div>
        <!-- @广告位01 -->
        </div>
        <div class="newsr">
            <div class="topnews">
                <div class="com-title"><span>实时要闻</span></div>
                <div class="sideMenu" style="margin:0 auto">
                    @foreach($newsTime as $k=>$item)
                        <h3 class="h3img{{($k+1)}}">
                            <a href="{{ route('frontend.articles.show', ['article' => $item->id]) }}"
                               title="{{$item->title}}">{{$item->title}}</a>
                        </h3>
                        <ul>
                            <li>{{$item->brief}}...</li>
                        </ul>
                    @endforeach

                </div>
            </div>
            <!-- 首页-标语02 -->
            <div class="rightbanber">
                <a href="/articles?position_id=49"><img src="/front/index/style/images/ent.png"/></a>
            </div>
        <!-- @首页-标语02 -->
        </div>
        <div class="floatfix"></div>
    </div>
    <!-- 广告位02 -->

<!-- @广告位02 -->
    <div class="mainnews">
        <!--左侧-->
        <div class="newsl mt-25">
            <!--新闻要点-->
            <div class="chosen">
                <div class="com-title"><span>新闻要点</span><a href="/articles?position_id=41">MORE</a></div>
                @foreach($newsPoints as $newsPoint)
                    <div class="chosenbox chosenbox-ml">
                        @if(!empty($newsPoint->banner))
                        <div class="chosenimg">
                            <a href="{{ route('frontend.articles.show', ['article' => $newsPoint->id]) }}"
                               title="{{$newsPoint->title}}">
                                <img src="{{$newsPoint->banner}}" alt="{{$newsPoint->title}}"/>
                            </a>
                        </div>
                        @endif
                        <h3><a href="{{ route('frontend.articles.show', ['article' => $newsPoint->id]) }}"
                               title="{{$newsPoint->title}}" target="_blank">{{$newsPoint->title}}</a>
                        </h3>
                        <p>{{$newsPoint->brief}}…</p>
                    </div>
                @endforeach
                <div class="floatfix"></div>
            </div>
        <!--@精选导读-->
            <!--外宣媒体-->
            <div class="hot">
                <div class="com-title"><span>外宣媒体</span><a href="/articles?position_id=15">MORE</a></div>
                <div id="content_list">
                    @foreach($newsOut as $item)

                        <div class="hotbox">
                            @if(!empty($item->banner))
                            <div class="hotimg">
                                <a href="{{ route('frontend.articles.show', ['article' => $item->id]) }}">
                                    <img src="{{$item->banner}}" alt="{{$item->title}}"/>
                                </a>
                            </div>
                            @endif
                            <h3 style="margin-top: 0">
                                <a href="{{ route('frontend.articles.show', ['article' => $item->id]) }}">{{$item->title}}</a>
                            </h3>
                            <p style="height: 55px">
                                {{str_limit($item->brief,150,'...')}}
                            </p>
                            <span class="fst">{{$item->source}}</span> · <span><time class="timeago"
                                                                                     datetime="{{$item->created_at}}"></time></span>
                        </div>
                    @endforeach

                </div>
                <!--<div class="IndexLoading">
                <a href="javascript:getMoreSortAppInfo()" id="morenews">点击加载更多内容 &darr;</a>
                <a id="noMore" style="display:none">全部加载完了</a>
                <a id="loading" style="display:none"><img src="/style/images/loader.gif"></a>
                </div>-->
            </div>

            <!--专题活动-->
            <div class="hot">
                <div class="com-title"><span>专题活动</span><a href="/articles?position_id=7">MORE</a></div>
                <div id="content_list">
                    @foreach($thematicActivities as $thematicActivity)
                        <div class="hotbox">
                            @if(!empty($thematicActivity->banner))
                                <div class="hotimg">
                                    <a href="{{ route('frontend.articles.show', ['article' => $thematicActivity->id]) }}"><img
                                                src="{{$thematicActivity->banner}}" alt="{{$thematicActivity->title}}"/></a>
                                </div>
                            @endif

                            <h3 style="margin-top: 0"><a
                                        href="{{ route('frontend.articles.show', ['article' => $thematicActivity->id]) }}">{{$thematicActivity->title}}</a>
                            </h3>
                            <p style="height: 55px">
                                {{str_limit($thematicActivity->brief,150,'...')}}
                            </p>

                            <span class="fst">{{$thematicActivity->source}}</span> · <span><time class="timeago"
                                                                                                 datetime="{{$thematicActivity->created_at}}"></time></span>
                        </div>
                    @endforeach

                </div>
                <!--<div class="IndexLoading">
                <a href="javascript:getMoreSortAppInfo()" id="morenews">点击加载更多内容 &darr;</a>
                <a id="noMore" style="display:none">全部加载完了</a>
                <a id="loading" style="display:none"><img src="/style/images/loader.gif"></a>
                </div>-->
            </div>

        <!--@热门推荐-->
        </div>
        <!--右侧-->
        <div class="newsr mt-15">
            <!--关注我们-->

            <div class="follow">
                <div class="com-title"><span>关注我们</span></div>
                <div class="followcon"><span>关注微信公众号，了解最新精彩内容</span>
                    <p class="qr-grid">
                        <i class="left"></i>
                        <i class="right"></i>
                    </p>
                </div>
            </div>
            <!--本月焦点-->

            <div class="read">
                <div class="com-title"><span>本月焦点</span><a href="/articles?position_id=43">MORE</a></div>
                @foreach($monthPoints as $item)
                    <a href="{{ route('frontend.articles.show', ['article' => $item->id]) }}"><img
                                src="{{$item->banner}}" alt="{{$item->title}}"/></a>

                    <div class="flink">
                        <a href="{{ route('frontend.articles.show', ['article' => $item->id]) }}">
                            <p>{{$item->brief}}</p></a>
                    </div>
                @endforeach
            </div>


        <!--@广告3-->
            <!--<div class="columnauthor">
              <div class="com-title">
                <div class="join"><a href="/hao">在这与他们同行</a></div>
                <span><img src="/style/images/symbol-3.png"  />作者专栏</span></div>
              <ul class="ulfix">
           <li class="ge1">
              <div class="authorimg"><a href="/hao/yuyongfu.html" title="俞永福" ><img  src="/d/file/p/hao/uiz53qbpvh2.jpg" class="thumb" /></a></div>
                      <p>俞永福</p>
          </li>	<li class="ge2">
              <div class="authorimg"><a href="/hao/yibeichen.html" title="易北辰" ><img  src="/d/file/p/hao/liivkzzh4oy.jpg" class="thumb" /></a></div>
                      <p>易北辰</p>
          </li>	<li class="ge3">
              <div class="authorimg"><a href="/hao/world.html" title="杨世界" ><img  src="/d/file/p/hao/eiewovo1sns.jpg" class="thumb" /></a></div>
                      <p>杨世界</p>
          </li>	<li class="ge4">
              <div class="authorimg"><a href="/hao/zhouhongyi.html" title="周鸿祎" ><img  src="/d/file/p/hao/qvhbqzhkvyn.jpg" class="thumb" /></a></div>
                      <p>周鸿祎</p>
          </li>	<li class="ge5">
              <div class="authorimg"><a href="/hao/zouzhengkang.html" title="邹正康" ><img  src="/d/file/p/hao/ddk0n0xf0bw.jpg" class="thumb" /></a></div>
                      <p>邹正康</p>
          </li>	<li class="ge6">
              <div class="authorimg"><a href="/hao/yuntuwang.html" title="云图网" ><img  src="/d/file/p/hao/wbbrjlnncly.jpg" class="thumb" /></a></div>
                      <p>云图网</p>
          </li>	<li class="ge7">
              <div class="authorimg"><a href="/hao/zhusanzang.html" title="猪三藏" ><img  src="/d/file/p/hao/4yjzknqwj13.jpg" class="thumb" /></a></div>
                      <p>猪三藏</p>
          </li>	<li class="ge8">
              <div class="authorimg"><a href="/hao/yutuo.html" title="喻拓" ><img  src="/d/file/p/hao/eifpzxyra5m.jpg" class="thumb" /></a></div>
                      <p>喻拓</p>
          </li>	<li class="ge9">
              <div class="authorimg"><a href="/hao/P2Pfenxishi.html" title="郑常怀" ><img  src="/d/file/p/hao/k1osvdanrmv.jpg" class="thumb" /></a></div>
                      <p>郑常怀</p>
          </li>
       </ul>
            </div>-->
            <!--文化投资-->
            <div class="newsletter">
                <div class="com-title"><span>文化投资</span><a href="/articles?position_id=44">MORE</a></div>
                <ul>
                    @foreach($culturalInvestment as $item)
                        <li><a href="{{ route('frontend.articles.show', ['article' => $item->id]) }}"
                               title="{{$item->item}}">{{$item->title}}</a></li>
                    @endforeach
                </ul>
            </div>

        <!--@广告4-->
            <div class="floatfix"></div>
        </div>
        <div class="floatfix"></div>
    </div>
    <!--其他信息-->
    <div class="mainother">
        <!-- 合作伙伴 -->
        <div class="partners">
            <div class="partnerstitle"></div>

            <div class="partnersimg" style="background-color:#4998FD;">
                <a href="http://www.yidaiyilu.gov.cn" title="中国一带一路网" target="_blank">
                    <img src="{{ asset('front/index/d/a/link_logo_ydyl.png') }}" style="height:auto;margin-top:15px;" alt="中国一带一路网"/>
                </a>
            </div>

            <div class="partnersimg">
                <a href="http://www.xinhuanet.com" title="新华网" target="_blank">
                    <img src="{{ asset('front/index/d/a/link_logo_xinhua.png') }}" alt="新华网"/>
                </a>
            </div>

            <div class="partnersimg">
                <a href="http://www.wenming.cn" title="中国文明网" target="_blank">
                    <img src="{{ asset('front/index/d/a/link_logo_zgwmw.png') }}" alt="中国文明网"/>
                </a>
            </div>

            <div class="partnersimg">
                <a href="http://www.people.com.cn" title="人民网" target="_blank">
                    <img src="{{ asset('front/index/d/a/link_logo_rmw.png') }}" alt="人民网"/>
                </a>
            </div>

            <div class="partnersimg">
                <a href="http://www.chinadaily.com.cn" title="中国日报网" target="_blank">
                    <img src="{{ asset('front/index/d/a/link_logo_zgrbw.jpg') }}" alt="中国日报网"/>
                </a>
            </div>
        </div>
    <!-- @合作伙伴 -->
        <!-- 友情链接 -->
        <div class="links">
            <div class="linkstitle"></div>
            <ul class="ulfix">
                <li><a href="http://www.ccdi.gov.cn/" title="中央纪委" target="_blank">中央纪委</a></li>
                <li><a href="http://www.zgg.gov.cn/" title="紫光阁" target="_blank">紫光阁</a></li>
                <li><a href="http://www.idcpc.org.cn/" title="中联部" target="_blank">中联部</a></li>
                <li><a href="http://www.zytzb.org.cn/" title="统战部" target="_blank">统战部</a></li>
                <li><a href="http://www.scopsr.gov.cn/" title="中编办" target="_blank">中编办</a></li>
                <li><a href="http://www.scio.gov.cn/" title="新闻办" target="_blank">新闻办</a></li>
                <li><a href="http://www.locpg.hk/index.htm" title="香港中联办" target="_blank">香港中联办</a></li>
                <li><a href="http://www.zlb.gov.cn/index.htm" title="澳门中联办" target="_blank">澳门中联办</a></li>
                <li><a href="http://www.cflac.org.cn/" title="中国文联" target="_blank">中国文联</a></li>
                <li><a href="http://www.tibet.cn/" title="中国西藏网" target="_blank">中国西藏网</a></li>
                <li><a href="http://rencai.people.com.cn/" title="中国人才网" target="_blank">中国人才网</a></li>
                <li><a href="http://www.people.com.cn/" title="人民网" target="_blank">人民网</a></li>
                <li><a href="http://www.china.com.cn/" title="中国网" target="_blank">中国网</a></li>
                <li><a href="http://www.cntv.cn/" title="CNTV" target="_blank">CNTV</a></li>
                <li><a href="http://www.chinadaily.com.cn/" title="中国日报" target="_blank">中国日报</a></li>
                <li><a href="http://www.cri.cn/" title="国际在线" target="_blank">国际在线</a></li>
                <li><a href="http://www.youth.cn/" title="中青网" target="_blank">中青网</a></li>
                <li><a href="http://www.ce.cn/" title="中经网" target="_blank">中经网</a></li>
                <li><a href="http://www.taiwan.cn/" title="中国台湾网" target="_blank">中国台湾网</a></li>
                <li><a href="http://www.cnr.cn/" title="央广网" target="_blank">央广网</a></li>
                <li><a href="http://www.gmw.cn/" title="光明网" target="_blank">光明网</a></li>
                <li><a href="http://www.chinanews.com/" title="中新网" target="_blank">中新网</a></li>
                <li><a href="http://www.dangjian.cn/" title="党建网" target="_blank">党建网</a></li>
                <li><a href="http://www.gov.cn/index.htm" title="中国政府网" target="_blank">中国政府网</a></li>
            </ul>
        </div>
    <!-- @友情链接 -->
    </div>
</div>
<div id="erweipic" class="erweipic">
</div>

@include('frontend.includes.footer')

<script type="text/javascript" src="/front/index/style/js/common.js"></script>
<script type="text/javascript" src="/front/index/style/js/index.js"></script>
</body>
</html>
