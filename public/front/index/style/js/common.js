//头部导航
$(function () {
			if ($('.nav li') == "undefined") return;
			$('.nav li').hover(function(){
				$(this).addClass('selected');							  
			},function(){
				$(this).removeClass('selected');		
			})
			$('.userbar div').hover(function(){
				$(this).addClass('selected');							  
			},function(){
				$(this).removeClass('selected');		
			})
})
  
//返回顶部
if($.browser.msie) {
  var ieVersion = parseInt($.browser.version)
}
var $backtotop=function(){
    if($(this).scrollTop() > 0) {
	  var _bw = 1200,_wt = document.body.clientWidth;
	  $("#backtotop").css('right', ((_wt-_bw)/2)-56);
	  $("#erweipic").css('right', ((_wt-_bw)/2)-0);
	  var st = $(document).scrollTop(), winh = $(window).height();
	  if(ieVersion != 6) {
	 	 $("#backtotop").css('top',(winh/2) - 0);
	  }
	  $("#erweipic").css('top',st+438);
	 $("#backtotop").css({"display": "block"});
    } 
};
var __initEvent = function() {
  $(window).bind("resize",$backtotop);
  $(window).bind("scroll", $backtotop);
  $("#totop").bind("click", function(e) {
    e.preventDefault();
    $("html,body").animate({scrollTop:0},500)
  });
  $("#erweima").bind("mouseover",function(){
	  $('#erweipic').css('display','block');
  });
 $("#erweima").bind("mouseout",function(){
	  $('#erweipic').css('display','none');
  });
 }
$(function() {
  if(screen.width >= 1200) {
    (function() {
      __feedCreat();
      __initEvent()
    })()
  }
});
var __feedCreat = function() {
  var feedHtml = $('<div id="backtotop" class="backtotop" ></div>');
  feedHtml.html('<a class="erweima" id="erweima"><span>扫二维码</span></a><a target="_self" class="fave_b" href="javascript:;" title="添加收藏" onclick="addFav();return false;"><span>添加收藏</span></a><a id="totop" class="totop"><span>返回顶部</span></a>');
  $("body").append(feedHtml);
  $("body").append('');
};
//收藏提示
function addFav(){
	var title = document.title.toString();
	var url = window.location.href;
	    try{
    	window.external.AddFavorite(url,title);
    }catch (e) {
		try{
        	window.sidebar.addPanel(title,url, "");   
		}catch(e){
			alert("您的浏览器不支持一键收藏，请按Ctrl+D将本页添加到收藏夹");
		}
	}
}