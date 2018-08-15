function pageScroll() {
	$('html, body').animate({
		scrollTop: 0
	}, 'fast');
}

$(document).ready(function() {
	//位置标记
	var flag = true
	//是否隐藏的标记
	var panelflag = true
	//设置菜单样式
	$(".quick-item").css({
		"background": "#55b1dc",
		"padding": "10px 0px",
		"width": "70px",
		"height": "40px",
		"margin-bottom": "5px",
		"text-align": "center",
		"cursor": "pointer",
		"font-size": "12px"
	})
	$(".quick-item-text").css({
		"color": "white",
		"line-height": "20px"
	})
	$("#scrollToTop-icon").css({
		"margin-top": "12.5px",
		"width": "30px",
		"height": "15px",

	})
	$("#quick-panel-btn").css({
		"position": "fixed",
		"top": "40%",
		"right": "0px",
		"width": "20px",
		"height": "125px",
		"background": "#55b1dc"
	})
	$("#quick-panel-btn-icon").css({
		"position": "relative",
		"top": "58.5px",
		"left": "8px"
	})
	//绑定hover事件
	$("#quick-panel").hover(function() {
		panelflag = true
	}, function() {
		if(!flag) {
			panelflag = false
		}
	})
	$(".quick-item").hover(function() {
		$(this).css("background", "#208cc2")
	}, function() {
		$(this).css("background", "#55b1dc")
	})
	$("#quick-panel-btn").hover(function() {
		$(this).css("background", "#208cc2")
		$("#quick-panel").fadeIn(200)
		panelflag = true
	}, function() {
		var sliderInt = setInterval(function() {
			if(!panelflag) {
				$("#quick-panel-btn").css("background", "#55b1dc")
				console.log(123)
				$("#quick-panel").fadeOut(200)
				window.clearInterval(sliderInt)
			}
		}, 1000)
		panelflag = false
	})
	//设置悬浮菜单的样式
	function setPanel() {
		$("#quick-panel").css({
			"position": "fixed",
			"top": "40%",
			"right": "auto",
			"left": "50%",
			"margin-left": "605px",
			"opacity": "1"
		})
		$("#quick-panel-btn").hide()
		$("#quick-panel").show()
		flag = true;
	}
	function setPanelNarrow() {
		$("#quick-panel").css({
			"position": "fixed",
			"top": "40%",
			"right": "25px",
			"left": "auto",
			"margin-left": "0px",
			"display": "none"
		})
		$("#quick-panel-btn").show()
		$("#quick-panel").hide()
		flag = false;
	}
	//如果窗口宽度足够则显示
	if($(window).width() > 1400) {
		setPanel();
	} else {
		setPanelNarrow();
	}
	//绑定浏览器窗口大小改变事件
	$(window).resize(function() {
		var width = $(this).width();
		if(width > 1400) {
			setPanel();
		} else {
			setPanelNarrow();
		}
	});
	//初始化返回顶部按钮状态
	var sTop = document.documentElement.scrollTop + document.body.scrollTop;
	if(sTop < 800) {
		$("#scrollToTop").hide();
	} else {
		$("#scrollToTop").show();
	}
	//绑定窗口滚动事件
	$(window).scroll(function() {
		//获取窗口的滚动条的垂直位置
		var s = $(window).scrollTop();
		if(s > 800) {
			$("#scrollToTop").fadeIn(100);
		} else {
			$("#scrollToTop").fadeOut(200);
		};
	});
	//判断鼠标从哪个方向离开
	//	function moveDirection(tag, e) {
	//		var w = $(tag).width();
	//		var h = $(tag).height();
	//		var x = (e.pageX - tag.offsetLeft - (w / 2)) * (w > h ? (h / w) : 1);
	//		var y = (e.pageY - tag.offsetTop - (h / 2)) * (h > w ? (w / h) : 1);
	//		var direction = Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180) / 90) + 3) % 4;
	//		return direction;
	//	}
	//	$("#quick-panel-btn").on("mouseleave", function(e) {
	//		var eType = e.type;
	//		var direction = moveDirection(this, e);
	//		var dirName = new Array("上", "右", "下", "左");
	//			console.log(direction)
	//		if(eType == "mouseleave" && (direction == 0 || direction == 2)) {
	//			$("#quick-panel").fadeOut(200)
	//		}
	//	});
	/*
	 //判断设备是否是手机还是电脑
	 function isMobileClient() {
	 var userAgentInfo = navigator.userAgent;
	 var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
	 var agentinfo = null;
	 for(var i = 0; i < Agents.length; i++) {
	 if(userAgentInfo.indexOf(Agents[i]) > 0) {
	 agentinfo = userAgentInfo;
	 break;
	 }
	 }
	 if(agentinfo) {
	 return true;
	 } else {
	 return false;
	 }
	 }
	 if(isMobileClient()) {

	 $("#scrollToTop").hide();
	 $("#weather").hide();
	 flag = false;
	 }
	 //判断是否是微信中的浏览器
	 var ua = navigator.userAgent.toLowerCase();
	 if(ua.match(/MicroMessenger/i) == "micromessenger") {
	 $("#scrollToTop").hide();
	 $("#weather").hide();
	 flag = false;
	 }
	 */
});