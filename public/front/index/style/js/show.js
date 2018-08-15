//延迟加载
hao.innerHTML=js_hao.innerHTML;js_hao.innerHTML="";
sfava.innerHTML=js_fav.innerHTML;js_fav.innerHTML="";
mood.innerHTML=js_mood.innerHTML;js_mood.innerHTML="";
//百度分享
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
//字体
$(function () {
	var tfontsize = $(".tfontsize");
	var articleContent = $(".article-content");//summary
	var allP = articleContent.find("p");
	allP.css({
		textIndent:"2em"
	});
	function fontSize($szie) {
		allP.each(function (i) {
			if (allP.eq(i).parent("div").attr("class") != "say") {
				allP.eq(i).css({
					fontSize : $szie+"px"
				});
			} 
		});
	}
	fontSize(16);
	tfontsize.toggle(function () {
		fontSize(18)
	},function () {
		fontSize(16)
	});
});
$('.zdpl').click(function(){$('html,body').animate({scrollTop:$('.correlation').offset().top}, 300);});
//公众号订阅
var add = add || {};
add.wid = {
	Collect:function(){
		var wid = $('#a_dingyue a').attr('data');
		$.get("/e/extend/dingyue/?action=addHao&ajax=1&id="+wid+"", function(ret){
			var num=parseInt(ret);
			if(num==0)
			{
				AjaxLog();
			}
			else if(num==2)
			{
				alert('抱歉，订阅失败！');
			}
			else if(num==3)
			{
				alert('亲，您已经订阅过该公众号了！');
				$("#a_dingyue").addClass('ok');
			
			}
			else if(num==4)
			{
				alert('系统错误，请联系管理员！');
			}			
			else
			{
				$("#a_dingyue").addClass('ok');
			
			}
		});
	}
};
//文章收藏
add.nid = {
	Collect:function(){
		var nid = $('#a_fava a').attr('data');
		$.get("/e/extend/dingyue/?action=addfava&ajax=1&id="+nid+"", function(ret){
			var num=parseInt(ret);
			if(num==0)
			{
				AjaxLog();
			}
			else if(num==2)
			{
				alert('抱歉，收藏失败！');
			}
			else if(num==3)
			{
				alert('亲，您已经收藏过该文章了！');
				$("#a_fava").addClass('ok');
			
			}
			else if(num==4)
			{
				alert('系统错误，请联系管理员！');
			}			
			else
			{
				$("#a_fava").addClass('ok');
			
			}
		});
	}
};