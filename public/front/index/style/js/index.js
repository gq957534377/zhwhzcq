$(function () {
	function P (arg) {
		console.log(arg);
	}
	/**
	 * 	最新动态
	 */
	(function () {
		var latestnews = $("div.latestnews");
			if (latestnews.size() ==0)  return;
			latestnews.css({
				overflow:'hidden'
			});
		var RollH = latestnews.height();
		var ul = latestnews.find("ul");
		var li = ul.find("li");
		var num = 1;
		var moveDistence = -num*RollH;
		var cloneFirstLi = li.eq(0).clone();
			ul.append(cloneFirstLi);
			li = ul.find("li");
		var Size = li.size();
		autoRoll();
		function autoRoll () {
			if (num == Size) {
				 ul.css({top:0});
				 num =1;
				 moveDistence = -num*RollH;
				 autoRoll();
			} else {
				setTimeout(function () {
					ul.animate({
						top : moveDistence
					},"slow",function () {
						num++;
						moveDistence =  -num*RollH;
						autoRoll();
					});
				},2000);
			}
			
		}
	}) ();
		/**
		 * 首页幻灯片
		 */
	 (function () {
	 	var m_slide = $('div.m-slide');
	 	if (m_slide == "undefined") return ;
	 	var imgUl = m_slide.children(".img");
	 	var descUl = m_slide.find("#ifocus_tx").children("ul");
	 	var tabUl = m_slide.children(".tab");
	 	var imgLi = imgUl.find("li");
	 	var descLi = descUl.find("li");
	 	var tabLi = tabUl.find("li");
	 	// tabLi.width(130);
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
	/**
	 * 首页 今日头条
	 */
	 (function () {
	 	var sideMenu = $("div.sideMenu"); 
	 	if(sideMenu == "undefined") return ;
	 	var h3 = sideMenu.find("h3");
	 	var ul = sideMenu.find("ul");
	 	var activeNum = 0;	//	当前触发 num
	 	var isAct = true;		//	动画是否执行完毕
	 	ul.hide();
	 	avtive(4);
	 	h3.each(function (i) {
	 		(function (i) {
	 			h3.eq(i).mouseenter(function () {
	 				if (activeNum == i) return;
	 				avtive(i);
	 			});
	 		})(i)
	 	});
	 	function avtive (num) {
	 		if (!isAct) return;
	 		isAct = false;
	 		ul.eq(num).slideDown("normal");
	 		ul.eq(activeNum).slideUp("normal",function () {
	 			isAct = true;
	 		});
	 		activeNum = num;
	 	}
	 })()	
})

// 发布时间
$(function () {
          $(".timeago").timeago();
 });



//加载更多
$('#pageNo').val(1);
function getMoreSortAppInfo() {
	$('#morenews').hide();
	$('#loading').show();
	var pageNo = $('#pageNo').val();
	var pageCnt = $('#pageCnt').val();
	if (eval(pageNo) >= eval(pageCnt)) {
		$('#loading').hide();
		$('#noMore').show();
		return;
	} else {
		pageNo = eval(pageNo) + 1;
	}
	var error = 0;
	var type = $("#type").val();
	var toUrl='/e/extend/rolling/?page='+pageNo;
	$.ajax({
		url: toUrl,
		type: 'GET',
		cache: false,
		dataType: 'text',
		complete: function() {
			$('#loading').hide();
			if (error == 1) {
				$('#morenews').html('重新加载');
				$('#noMore').show();
				$('#morenews').show();
			} else {
				$('#morenews').html('点击加载更多内容 &darr;');
				if (eval(pageNo) >= eval(pageCnt)) {
					$('#noMore').show();
				} else {
					$('#morenews').show();
				}
			}
		},
		success: function(data) {
			if (data) {
				$('#content_list').append(data);
				$('#pageNo').val(pageNo);
			} else {
				error = 1;
			}
		},
		error: function() {
			error = 1;
		}
	});

}
