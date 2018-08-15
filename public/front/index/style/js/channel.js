$(function () {
	 	var m_slide = $('div.m-slide');
	 	if (m_slide == "undefined") return ;
	 	var imgUl = m_slide.children(".img");
	 	var descUl = m_slide.find("#ifocus_tx").children("ul");
	 	var tabUl = m_slide.children(".tab");
	 	var imgLi = imgUl.find("li");
	 	var descLi = descUl.find("li");
	 	var tabLi = tabUl.find("li");
	 	tabLi.width(130);
	 	var activeNum = 0;	//	当前触发 num
	 	var isAct = true;		//	动画是否执行完毕
	 	avtive(0);			//	初始化
	 	imgLi.each(function (i) {
	 		(function (i) {
	 			tabLi.eq(i).mouseenter(function () {
	 				if (activeNum == i) return;
	 				avtive(i);
	 			});
	 		})(i)
	 	});
	 	/**
	 	 * 控制器
	 	 */
	 	function avtive (num) {
	 		if (!isAct) return;
	 		isAct = false;
	 		tabLi.eq(activeNum).attr("class",'');
	 		tabLi.eq(num).attr("class",'on');
	 		imgLi.eq(activeNum).fadeOut("fast");
	 		imgLi.eq(num).fadeIn("fast",function () {
	 			isAct = true;
	 		});
	 		descLi.eq(activeNum).hide();
	 		descLi.eq(num).show();
	 		activeNum = num;
	 	}
	 	/**
	 	 * 自动执行
	 	 */
	 	setInterval(function () {
	 		var num = (activeNum+1)%4;
	 		if (isAct) tabLi.eq(num).trigger("mouseenter");
	 	},2000);
	 })();



// 发布时间
$(function () {
          $(".timeago").timeago();
 });