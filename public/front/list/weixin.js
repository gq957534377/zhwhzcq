// 微信配置
var shareTitle = '星河网-站在未来看世界'
var shareDesc = '星河网(vxinghe.com)依托五洲融媒“中央厨房”融媒发展优势，以多语种、全媒体形式...'
var shareLink = location.href.split('#')[0];

var shareIcon = 'http://www.vxinghe.com/public/images/portal/vxinghe.png'
function setShareInfo(title, desc, icon) {
	shareTitle = title
	shareDesc = desc
	if (icon != "" && icon != null) {
		shareIcon = icon
	}
}
console.log(shareLink)
$.ajax({
	url: 'http://iwtt.site/signPackage.php',
	type: 'GET',
	data: {
		gh: 'gh_09609b5c87c2',
		_url: shareLink,
	},
	dataType: 'jsonp',
	success: function(data) {
		wx.config({
			debug: false,
			appId: data.data.appid,
			timestamp: data.data.time,
			nonceStr: data.data.str,
			signature: data.data.signPackage,
			jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'onMenuShareQZone'] // 功能列表，我们要使用JS-SDK的什么功能
		});
		wx.ready(function() {
			order_id = window.localStorage.getItem("order_id");
			uid = window.localStorage.getItem("uid");

			wx.onMenuShareTimeline({ //朋友圈分享
				title: shareTitle, // 分享标题
				desc: shareDesc, // 分享描述
				link: shareLink,
				imgUrl: shareIcon, // 分享图标           
				success: function(data) {},
				cancel: function() {
					// 用户取消分享后执行的回调函数
				}
			});

			// 获取“分享给朋友”按钮点击状态及自定义分享内容接口
			wx.onMenuShareAppMessage({ //微信朋友分享
				title: shareTitle, // 分享标题
				desc: shareDesc, // 分享描述
				link: shareLink,
				imgUrl: shareIcon, // 分享图标           
				success: function(data) {},
				cancel: function() {
					// 用户取消分享后执行的回调函数
				}
			});
			wx.onMenuShareQQ({ //qq分享
				title: shareTitle, // 分享标题
				desc: shareDesc, // 分享描述
				link: shareLink,
				imgUrl: shareIcon, // 分享图标           
				success: function(data) {},
				cancel: function() {
					// 用户取消分享后执行的回调函数
				}
			});
			wx.onMenuShareWeibo({ //腾讯微博分享           	
				title: shareTitle, // 分享标题
				desc: shareDesc, // 分享描述
				link: shareLink,
				imgUrl: shareIcon, // 分享图标           
				success: function(data) {},
				cancel: function() {
					// 用户取消分享后执行的回调函数
				}
			});
			wx.onMenuShareQZone({ //qq空间分享
				title: shareTitle, // 分享标题
				desc: shareDesc, // 分享描述
				link: shareLink,
				imgUrl: shareIcon, // 分享图标           
				success: function(data) {},
				cancel: function() {
					// 用户取消分享后执行的回调函数
				}
			});
		});

	}
})