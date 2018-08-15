//载入订阅数据
function ajaxlist(url){
					if(navigator.userAgent.indexOf('MSIE 6.0')>0||navigator.userAgent.indexOf('MSIE 9.0')>0){
				url=url+"-"+Math.random();
		           }
				$.ajax({ url: url, jsonpCallback: 'ajaxCallback1', success: function(data){
					if('' != data.ajaxtxt )
				   {
					$("#list").html(data.ajaxtxt);
					$("#page").html(data.pages);
					$("#page a").click(function (e){
						ajaxlist(e.target);
						return false;}
					);
					$(".del").click(function(){
						var parents=$(this).parent('li');
						$(this).ajaxdel({
							onsucc:function(data){
								if(parseInt(data.rcode)==1)
								{
									parents.remove();
								}
							}
						});
					});
					$(".haolist li").hover(function(){
						$(this).find(".ui-del").show();
						$(this).addClass("hover");
					},function(){
						$(this).find(".ui-del").hide();
						$(this).removeClass("hover");
					});				
				  }
				  else 
				     {
					   	$("#list").html("<li class='on'>订阅号为空，点击<a href='/hao' target='_blank'>这里</a>去看看有没有您喜欢的公众人物</li>");
					 }
				},dataType:'jsonp'});
				return false;				
}
ajaxlist("/e/extend/dingyue/list.php?dy=hao&act=get&");	
//删除操作
(function($) {
	$.fn.ajaxdel = function(options) {
		var defaults = {
			txt: '数据提交中,请稍后...',
			redirurl: window.location.href,
			dataType: 'json',
			onsucc: function(e) {},
			onerr: function() {},
			oncomplete: function() {},
			intvaltime: 3000
		};
		var options = $.extend(defaults, options);
		var ajurl = $(this).attr('url');
		$.ajax({
			url: ajurl,
			success: function(data) {
				options.onsucc(data);
			},
			error: function() {
				options.onerr();
			},
			complete: function() {
				options.oncomplete();
			},
			dataType: 'json'
		});
	};
})(jQuery);
//加载收藏文章
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
	var toUrl='/e/extend/dingyue/list.php?fava=news&act=get&page='+pageNo;
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
				$('#morenews').html('点击加载更多 &darr;');
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
