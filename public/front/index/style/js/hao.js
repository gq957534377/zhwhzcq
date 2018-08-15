//延迟加载
num.innerHTML=js_num.innerHTML;js_num.innerHTML="";
click.innerHTML=js_click.innerHTML;js_click.innerHTML="";
sfdy.innerHTML=js_sfdy.innerHTML;js_sfdy.innerHTML="";
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