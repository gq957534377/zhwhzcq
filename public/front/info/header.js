function SetHome(obj,url){
    try{
        obj.style.behavior='url(#default#homepage)';
        obj.setHomePage(url);
    }catch(e){
        if(window.netscape){
            try{
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                alert('ok')
            }catch(e){
                alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
            }
        }else{
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
        }
    }
}

$(function() {

	//轮播图js已经转移到app/view/portal/templates/version2/lunbo.php文件
	$(".icon-top li").each(function() {
		$(this).mouseenter(function() {
				$(this).find(".icon-erweima").stop()
				$(this).find(".icon-erweima").fadeIn(200)
		})
		$(this).mouseleave(function() {
				$(this).find(".icon-erweima").stop()
				$(this).find(".icon-erweima").fadeOut(200)
		})
	})

})