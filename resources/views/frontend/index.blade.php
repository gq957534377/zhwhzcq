<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="renderer" content="ie-comp">
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <script type="text/javascript" src="/front/index/style/js/mobile.js"></script>
    <script type="text/javascript">uaredirect("http://m.diguo001.com/");</script>
    <meta name="keywords" content="帝国网站管理系统,EmpireCMS" />
    <meta name="description" content="　　帝国软件是一家专注于网络软件开发的科技公司，其主营产品“帝国网站管理系统(EmpireCMS)”是目前国内应用最广泛的CMS程序。通过十多年的不断创新与完善，使系统集安全、稳定、强大、灵活于一身。目前EmpireCMS程序已经广泛应用在国内上百万家网站，覆盖国内上千万上网人群，并经过上千家知名网站的严格检测，被称为国内最安全、最稳定的开源CMS系统。" />
    <title>仿砍柴网站程序</title>
    <link rel="stylesheet" type="text/css" href="/front/index/style/css/css.css" />
    <link rel="stylesheet" type="text/css" href="/front/index/style/css/style.css" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <script type="text/javascript" src="/front/index/style/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/front/index/style/js/common.js"></script>
</head>
<body>
<!--网站公共头部-->
<div class="topbar">
    <div class=" wrapper">
        <div class="logo"><a href="/" title="仿砍柴网站程序" target="_self">仿砍柴网站程序</a></div>
        <ul class="nav">
            @foreach($labels as $label)
                <li>
                    <strong>
                        <a href="{{url('/articles?label_id='.$label->id)}}"
                               target="_self">{{$label->name}}</a>
                    </strong>
                    <dl>
                        @foreach($label->childLabels as $childLabel)
                            <li>
                                <a href="{{url('/articles?label_id='.$childLabel->id)}}"
                               target="_self">{{$childLabel->name}}</a>
                            </li>
                        @endforeach
                    </dl>
                </li>

            @endforeach
        </ul>
        <div class="mtopic"><img src="/front/index/style/topic/mtopic.jpg" /></div>
        <div class="msearch">
            <form action="/e/search/" method="post" target="_blank">
                <input type="hidden" name="show" value="title,keyboard" />
                <input type="hidden" name="tempid" value="1" />
                <input type="text"  placeholder="输入关键词" class="text-msearch"  name="keyboard">
                <input type="submit" value="" class="btn-msearch">
            </form>
        </div>
        <div class="langchose"><a href="">中文</a><a href="">Eng</a><a href="">中文</a><a href="">其他</a></div>
        <div class="action">
            <a href="/e/DoInfo/AddInfo.php?mid=1&enews=MAddInfo&classid=25" class="n1" target="_blank" title="投稿">投稿</a>
            <div class="userbar">
                <div class="user" id="show_userinfo">
                    <span class="avatar"><img src="/style/images/symbol-25.png" /></span>
                    <a href="javascript:;" class="n4 head-username">游  客</a>
                    <ul class="drap">
                        <li class="i3"><a  href="javascript:void(0);" onclick="AjaxReg()" target="_self" class="head-register">注  册</a></li>
                        <li class="i4"><a href="javascript:void(0);" target="_self"  onclick="AjaxLog()"  class="head-login">登  陆</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/e/member/ajaxlog/?loadjs=1"></script>
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
                            <a href="{{$banner->url}}" title="{{$banner->title}}">
                                <img src="{{$banner->file}}" alt="{{$banner->title}}"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div id="ifocus_opdiv"></div>
                <div id="ifocus_tx">
                    <ul>
                        @foreach($banners as $banner)
                        <li><a href="{{$banner->url}}" title="{{$banner->title}}">{{$banner->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <ul class="tab">
                    @if(count($banners)>1)
                        @foreach($banners as $key => $banner)
                            <li><div class="color{{$key+1}}">{{$key+1}}</div></li>
                        @endforeach
                    @endif
                </ul>

            </div>
        <!-- @首页幻灯片 -->
            <!-- 广告位01 -->
            <div class="leftbanber">
                <a href="javascript:alert('首页左侧820x90，ID(1)');" target="_blank"><img src="/front/index/d/a/a1.png" /></a>		</div>
        <!-- @广告位01 -->
        </div>
        <div class="newsr">
            <div class="topnews">
                <div class="com-title"><span>实时要闻</span></div>
                <div class="sideMenu" style="margin:0 auto">
                    <h3 class="h3img1"><a href="/yuanchuang/10932.html" title="碎片化阅读时代，我们需要怎样的新闻客户端？">碎片化阅读时代，我们需要怎样的新闻客户端？</a>
                    </h3>
                    <ul>
                        <li>随着互联网大数据时代的到来，以用户社交网络为基础和用户信息流为载体的阅读平台悄然诞生，以今日头条为代表的新闻客户端在不知不觉中生长出了算法推荐的...</li>
                    </ul>
                    <h3 class="h3img2"><a href="/guandian/1/10944.html" title="小米成了“中米”，梦想成了现实">小米成了“中米”，梦想成了现实</a></h3>
                    <ul>
                        <li>而曾经小不经事的小米粉，已经长成，他们在一个不大的房子里喜爱张杰、看着《男人装》和黄晓明。希望从一颗不起眼的粗粮长成一颗光鲜亮丽的水果。得到尊重...</li>
                    </ul>
                    <h3 class="h3img3"><a href="/guandian/1/10942.html" title="从互联网的+-X÷开始带你认识“互联网+”八大悖论">从互联网的+-X÷开始带你认识“互联网+”八大悖论</a>
                    </h3>
                    <ul>
                        <li>我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇开始陆陆续续写了十几篇关于“互联网+”的文章。到底什么是“互联网+”?我曾...</li>
                    </ul>
                    <h3 class="h3img4"><a href="/shangye/1/10940.html" title="小米的学霸之路：厚积薄发的从容赌徒">小米的学霸之路：厚积薄发的从容赌徒</a>
                    </h3>
                    <ul>
                        <li>两天前，在正式宣布与酷派合资推出“奇酷”手机品牌的发布会上，周鸿祎以“Are you OK”作为开场白，显然，这是在嘲讽他的业内同行和湖北同乡在印度发布会上显...</li>
                    </ul>
                    <h3 class="h3img5 on"><a href="/chuangtou/chuangye/10938.html"
                                             title="BAT、风投、地产密集布局孵化器，“众创时代”孵化器怎么玩？">BAT、风投、地产密集布局孵化器，“众创时代”孵化器怎么玩？</a>
                    </h3>
                    <ul>
                        <li>近期，京东推出JD+计划“孵化器”，腾讯宣布年内建立25个线下众创空间，上市公司鹏博士发布鹏云课堂2.0推出教育O2O孵化器，“优客工场”要打造“孵化器中的万...</li>
                    </ul>
                </div>
            </div>
            <!-- 首页-标语02 -->
            <div class="rightbanber">
                <a href="/aboutme/report.html"><img src="/front/index/style/images/img3.png"  /></a>
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
                <div class="com-title"><span>新闻要点</span></div>

                <div class="chosenbox">
                    <div class="chosenimg"><a href="/guandian/1/10944.html" title="24位副国级为这事走遍全国"><img  src="/front/index/d/a/u18.png" alt="24位副国级为这事走遍全国" /></a></div>
                    <h3><a href="/guandian/1/10944.html" title="24位副国级为这事走遍全国" target="_blank">24位副国级为这事走遍全国事走遍全国</a></h3>
                    <p>我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇…</p>
                    <p><span></span></p>
                </div>

                <div class="chosenbox chosenbox-ml">
                    <div class="chosenimg"><a href="/guandian/1/10942.html" title="24位副国级为这事走遍全国"><img  src="/front/index/d/a/u18.png" alt="24位副国级为这事走遍全国" /></a></div>
                    <h3><a href="/guandian/1/10942.html" title="24位副国级为这事走遍全国" target="_blank">24位副国级为这事走遍全国</a></h3>
                    <p>我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇…</p>
                    <p><span></span></p>
                </div>
                <div class="chosenbox">
                    <div class="chosenimg"><a href="/guandian/1/10944.html" title="24位副国级为这事走遍全国"><img  src="/front/index/d/a/u18.png" alt="24位副国级为这事走遍全国" /></a></div>
                    <h3><a href="/guandian/1/10944.html" title="24位副国级为这事走遍全国" target="_blank">24位副国级为这事走遍全国事走遍全国</a></h3>
                    <p>我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇…</p>
                    <p><span></span></p>
                </div>

                <div class="chosenbox chosenbox-ml">
                    <div class="chosenimg"><a href="/guandian/1/10942.html" title="24位副国级为这事走遍全国"><img  src="/front/index/d/a/u18.png" alt="24位副国级为这事走遍全国" /></a></div>
                    <h3><a href="/guandian/1/10942.html" title="24位副国级为这事走遍全国" target="_blank">24位副国级为这事走遍全国</a></h3>
                    <p>我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇…</p>
                    <p><span></span></p>
                </div>
                <div class="chosenbox">
                    <div class="chosenimg"><a href="/guandian/1/10944.html" title="24位副国级为这事走遍全国"><img  src="/front/index/d/a/u18.png" alt="24位副国级为这事走遍全国" /></a></div>
                    <h3><a href="/guandian/1/10944.html" title="24位副国级为这事走遍全国" target="_blank">24位副国级为这事走遍全国事走遍全国</a></h3>
                    <p>我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇…</p>
                    <p><span></span></p>
                </div>

                <div class="chosenbox chosenbox-ml">
                    <div class="chosenimg"><a href="/guandian/1/10942.html" title="24位副国级为这事走遍全国"><img  src="/front/index/d/a/u18.png" alt="24位副国级为这事走遍全国" /></a></div>
                    <h3><a href="/guandian/1/10942.html" title="24位副国级为这事走遍全国" target="_blank">24位副国级为这事走遍全国</a></h3>
                    <p>我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇我的第一篇关于“互联网+”的文章是讨论“互联网+”与“+互联网”的，从那篇…</p>
                    <p><span></span></p>
                </div>


                <div class="floatfix"></div>
            </div>
        <!--@精选导读-->
            <!--外宣媒体-->
            <script type="text/javascript" src="/front/index/style/js/jquery.timeago.js"></script>
            <div class="hot">
                <div class="com-title"><span>外宣媒体</span></div>
                <div id="content_list">

                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>
                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>
                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>

                </div>
                <!--<div class="IndexLoading">
                <a href="javascript:getMoreSortAppInfo()" id="morenews">点击加载更多内容 &darr;</a>
                <a id="noMore" style="display:none">全部加载完了</a>
                <a id="loading" style="display:none"><img src="/style/images/loader.gif"></a>
                </div>-->
            </div>

            <!--专题活动-->
            <script type="text/javascript" src="/front/index/style/js/jquery.timeago.js"></script>
            <div class="hot">
                <div class="com-title"><span>专题活动</span></div>
                <div id="content_list">

                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>
                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>
                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>

                </div>
                <!--<div class="IndexLoading">
                <a href="javascript:getMoreSortAppInfo()" id="morenews">点击加载更多内容 &darr;</a>
                <a id="noMore" style="display:none">全部加载完了</a>
                <a id="loading" style="display:none"><img src="/style/images/loader.gif"></a>
                </div>-->
            </div>

            <!--专题活动-->
            <script type="text/javascript" src="/front/index/style/js/jquery.timeago.js"></script>
            <div class="hot">
                <div class="com-title"><span>专题活动</span></div>
                <div id="content_list">

                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>
                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>
                    <div class="hotbox">
                        <div class="hotimg">
                            <a href=""><img  src="/front/index/d/a/u75.png" alt="市场监管总局：打击傍名牌等制售假冒伪劣商品行为"/></a>
                        </div>
                        <h3><a href="/guandian/1/10945.html">市场监管总局：打击傍名牌等制售假冒伪劣商品行为伪劣商品行为</a></h3>

                        <span class="fst">中国新闻网</span> · <span><i>5</i>评论</span> · <span><time class="timeago" datetime="2015-05-11 12:43:00.0"></time></span>
                    </div>

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
                <div class="followcon"> <span>关注微信公众号，了解最新精彩内容</span>
                    <p> <img src="/front/index/style/logo/qr1.png"  /> <img src="/front/index/style/logo/qr2.png"  /> </p>
                    <a href="http://www.admin99.cn/" class="awb1"></a>
                    <a href="http://www.cnzhan.cc/" class="awb2"></a>
                    <div id="arc_fxbtm" class="bdsharebuttonbox"><a href="javascript:void(0);" class="bds_more" data-cmd="more"></a></div>
                </div>
            </div>
            <!--本月焦点-->
            <div class="read">
                <div class="com-title"><span>本月焦点</span></div>
                <a href=""><img src="/front/index/d/a/u84.jpg" alt="" /></a>

                <div class="flink" >
                    <a href=""><p>港股市场开闸，等待上市的独角兽鱼贯而出。当“造富梦”进入兑现期，这是移动互联网时代，所有人能吃到的最后一口肉。</p></a>
                </div>
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
                <div class="com-title"><span>文化投资</span></div>
                <ul>
                    <li><a href="/kuaibao/jishi/11197.html" title="长沙大妈豪掷20万充话费 “中国大妈”再登网民热议榜">长沙大妈豪掷20万充话费 “中国大妈”再登网民热议榜</a></li><li><a href="/kuaibao/jishi/11186.html" title="央行降息或致存款搬家 P2P行业再迎发展新机遇">央行降息或致存款搬家 P2P行业再迎发展新机遇</a></li><li><a href="/kuaibao/jishi/11196.html" title="移动医疗开诊所行得通吗？">移动医疗开诊所行得通吗？</a></li><li><a href="/kuaibao/yejie/11194.html" title="WiFi会是入口么？看淡WiFi模组，这家物联网公司已经进入C轮">WiFi会是入口么？看淡WiFi模组，这家物联网公司已经进入C轮</a></li><li><a href="/kuaibao/yejie/11192.html" title="iBeacon CS “互联网”的第一步">iBeacon CS “互联网”的第一步</a></li><li><a href="/kuaibao/yejie/11189.html" title="复盘爱投资750万逾期项目">复盘爱投资750万逾期项目</a></li></ul>
            </div>

            <script type="text/javascript" src="/front/index/style/js/scrollad.js"></script>
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
            <div class="partnersimg"><a href="http://www.smallseashell.com" title="今日头条" target="_blank"><img src="http://img.ikanchai.com/templates/ikanchai/html/images/link_logo7.jpg" alt="今日头条" /></a></div>
            <div class="partnersimg"><a href="http://www.smallseashell.com" title="创业家" target="_blank"><img src="http://img.ikanchai.com/templates/ikanchai/html/images/link_logo5.jpg" alt="创业家" /></a></div>
            <div class="partnersimg"><a href="http://www.smallseashell.com" title="创享派" target="_blank"><img src="http://img.ikanchai.com/templates/ikanchai/html/images/link_logo6.jpg" alt="创享派" /></a></div>
            <div class="partnersimg"><a href="http://www.smallseashell.com" title="techweb" target="_blank"><img src="http://img.ikanchai.com/templates/ikanchai/html/images/link_logo8.jpg" alt="techweb" /></a></div>


        </div>
    <!-- @合作伙伴 -->
        <!-- 友情链接 -->
        <div class="links">
            <div class="linkstitle"></div>
            <ul class="ulfix">
                <li><a href="http://www.smallseashell.com" title="源码" target="_blank">源码</a></li>
                <li><a href="http://www.smallseashell.com" title="站长精品源码" target="_blank">站长精品源码</a></li>

            </ul>
        </div>
    <!-- @友情链接 -->
    </div>
</div>
<input id="pageNo" type="hidden" value="1" />
<input id="pageCnt" type="hidden" value="6" />
<script type="text/javascript" src="/front/index/style/js/index.js"></script>
<script type="text/javascript">
    window._bd_share_config = {
        common : {
            bdText : '推荐一个非常赞的网站，来自：扩展变量-简称',
            bdDesc : '　　帝国软件是一家专注于网络软件开发的科技公司，其主营产品“帝国网站管理系统(EmpireCMS)”是目前国内应用最广泛的CMS程序。通过十多年的不断创新与完善，使系统集安全、稳定、强大、灵活于一身。目前EmpireCMS程序已经广泛应用在国内上百万家网站，覆盖国内上千万上网人群，并经过上千家知名网站的严格检测，被称为国内最安全、最稳定的开源CMS系统。',
            bdUrl : 'http://www.diguo001.com/',
            bdPic : 'http://www.diguo001.com/style/logo/nopic.gif'
        },
        share : [{
            "bdSize" : 32
        }],
    }
</script>
<div id="erweipic" class="erweipic">
    <script src="/e/extend/code/?data=http://m.diguo001.com/" language="javascript"></script>
</div>
<div class="footer">
    <div class="wrapper">
        <div class="lft">© 2013-2015 砍柴网（www.ikanchai.com）版权所有  备案：沪ICP备12040744号-3 </div>
        <div class="rgt">
            <a href="/aboutme/index.html" target="_blank"> 关于我们</a><span></span><a href="/aboutme/report.html" target="_blank">寻求报道</a><span></span><a href="/aboutme/submission.html" target="_blank">投稿须知</a><span></span><a href="/aboutme/cooperation.html" target="_blank">商务合作</a><span></span>	<a href="/aboutme/sitemap.html" target="_blank">网站地图</a>
            <span></span><a href="/baidunews.xml" target="_blank">百度新闻</a>
            <span></span><a href="/tags.html" target="_blank">标签云</a>
            <span></span>#统计代码
        </div>
    </div>
</div>
<script type="text/javascript" src="/e/extend/html/"></script>
<!---承接帝国程序二次开发，网站制作。QQ：75250060 苏奇--->
</body>
</html>
