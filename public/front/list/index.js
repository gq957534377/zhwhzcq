$(function() {
	
	$(".more-li").mouseenter(function() {
		$(this).find("div").fadeIn(100)
	})
	$(".more-li").mouseleave(function() {
		$(this).find("div").fadeOut(100)
	})
//	$(".more-li").find("div").mouseleave(function() {
//		$(this).fadeOut(100)
//	})

	function startFlip(eleArr) {
		var oneElem = $(eleArr[0])
		var twoElem = $(eleArr[1])
		eleArr.css("transition", "1s")
		oneElem.css("transform", "scale(1,-1)")
		twoElem.css("transform", "none")
		oneElem.css("z-index", "1")
		flipElem(eleArr)
		setInterval(function() {
			flipElem(eleArr)
		}, 5000)
	}
	
	function flipElem(eleArr) {
		var oneElem = $(eleArr[0])
		var twoElem = $(eleArr[1])
		if (oneElem.css("transform") == "none") {
			oneElem.css("transform", "scale(1,-1)")
			twoElem.css("transform", "none")
			oneElem.css("z-index", "0")
			twoElem.css("z-index", "1")
		} else {
			oneElem.css("transform", "none")
			twoElem.css("transform", "scale(1,-1)")
			oneElem.css("z-index", "1")
			twoElem.css("z-index", "0")
		}
	}
	
//	startFlip($(".toutiao-top"))
	
})