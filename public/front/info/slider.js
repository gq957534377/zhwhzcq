$(function() {

	//横向轮播图
	var xSlider = function(el, speed, interval) {

		var _this = this
		this.el = el
		// 参数配置
		this.config = {
			w: this.el.width(),
			current: 0,
			speed: speed,
			intervalTime: interval
		}

		// 保存查找dom元素
		var slider_img = this.el.children('.slider_div')
		var slider_img_ul = slider_img.children('ul')
		var slider_img_ul_li = slider_img_ul.children('li')
		var slider_img_length = slider_img_ul_li.length

		// 初始化左右按钮
		this.el.append('<a href="javascript:" class="slider_btn slider_btn_left">&lt;</a>')
		this.el.append('<a href="javascript:" class="slider_btn slider_btn_right">&gt;</a>')
		var slider_btn_left = this.el.children('.slider_btn_left')
		var slider_btn_right = this.el.children('.slider_btn_right')

		// 初始化圆点
		this.el.append('<div class="slider_dot"><ul class="slider_dot_ul"></ul></div>')
		var slider_dot = this.el.children('.slider_dot')
		var slider_dot_ul = slider_dot.children('ul')
		for(var i = 0; i < slider_img_length - 2; i++) {
			if(i === this.config.current) {
				slider_dot_ul.append('<li class="active"></li>')
			} else {
				slider_dot_ul.append('<li></li>')
			}
		}
		var slider_dot_ul_li = slider_dot_ul.children('li')

		// 初始化默认显示图片位置
		slider_img_ul.css('left', -this.config.w * this.config.current - this.config.w)

		// 圆点切换点亮
		var active = function(i) {
			slider_dot_ul_li.removeClass('active')
			slider_dot_ul_li.eq(i).addClass('active')
		}

		// 右点击事件
		slider_btn_right.on('click', function(event) {
			event.preventDefault()
			if(_this.config.current < slider_img_length - 2) {
				//				toggleInterval()
				_this.config.current++
					if(_this.config.current != slider_img_length - 2) {
						slider_img_ul.stop(true, false).animate({
							left: -_this.config.w * _this.config.current - _this.config.w
						}, _this.config.speed, function() {
							active(_this.config.current)
						})
					}
				if(_this.config.current === slider_img_length - 2) {
					slider_img_ul.stop(true, false).animate({
						left: -_this.config.w * _this.config.current - _this.config.w
					}, _this.config.speed, function() {
						slider_img_ul.css('left', -_this.config.w)
						_this.config.current = 0
						active(_this.config.current)
					})
				}
			}
		})

		// 左点击事件
		slider_btn_left.on('click', function(event) {
			event.preventDefault()
			if(_this.config.current > -1) {
				//				toggleInterval()
				_this.config.current--
					if(_this.config.current != -1) {
						slider_img_ul.stop(true, false).animate({
							left: -_this.config.w * _this.config.current - _this.config.w
						}, _this.config.speed, function() {
							active(_this.config.current)
						})
					}
				if(_this.config.current === -1) {
					slider_img_ul.stop(true, false).animate({
						left: 0
					}, _this.config.speed, function() {
						slider_img_ul.css('left', -_this.config.w * (slider_img_length - 2))
						_this.config.current = slider_img_length - 3
						active(_this.config.current)
					})
				}
			}
		})

		// dot点击事件
		slider_dot_ul_li.on('click', function(event) {
			event.preventDefault()
			//			toggleInterval()
			var index = $(this).index()
			active(index)
			slider_img_ul.stop(true, false).animate({
				left: -_this.config.w * index - _this.config.w
			}, _this.config.speed, function() {
				_this.config.current = index
			})
		})

		// 自动切换
		var sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		// 判断图片切换
		function sliderInterval() {
			if(_this.config.current < slider_img_length - 2) {
				_this.config.current++
					slider_img_ul.stop(true, false).animate({
						left: -_this.config.w * _this.config.current - _this.config.w
					}, _this.config.speed, function() {
						active(_this.config.current)
						if(_this.config.current === slider_img_length - 2) {
							slider_img_ul.css('left', -_this.config.w)
							_this.config.current = 0
							active(_this.config.current)
						}
					})
			}
		}
		// 重置计时器
		function toggleInterval() {
			clearInterval(sliderInt)
			sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		}
		//鼠标悬停和离开
		el.mouseover(function() {
			clearInterval(sliderInt)
		})
		el.mouseleave(function() {
			sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		})

	} // --end-- xSlider

	$.fn.extend({
		xSlider: function(speed, interval) {
			new xSlider($(this), speed, interval)
		}
	})

	//横向轮播图 显示多个图片
	var sSlider = function(el, speed, interval) {

		var _this = this
		this.el = el
		// 参数配置
		this.config = {
			w: this.el.width(),
			current: 0,
			speed: speed,
			intervalTime: interval
		}

		// 保存查找dom元素
		var slider_img = this.el.children('.slider_div')
		var slider_img_ul = slider_img.children('ul')
		var slider_img_ul_li = slider_img_ul.children('li')
		var slider_img_length = slider_img_ul_li.length

		// 初始化左右按钮
		this.el.append('<a href="javascript:" class="slider_btn slider_btn_left">&lt;</a>')
		this.el.append('<a href="javascript:" class="slider_btn slider_btn_right">&gt;</a>')
		var slider_btn_left = this.el.children('.slider_btn_left')
		var slider_btn_right = this.el.children('.slider_btn_right')

		// 初始化默认显示图片位置
		slider_img_ul.css('left', -this.config.w * this.config.current - this.config.w)

		// 右点击事件
		slider_btn_right.on('click', function(event) {
			event.preventDefault()
			if(_this.config.current < slider_img_length - 2) {
				//				toggleInterval()
				_this.config.current++
					if(_this.config.current != slider_img_length - 2) {
						slider_img_ul.stop(true, false).animate({
							left: -_this.config.w * _this.config.current - _this.config.w
						}, _this.config.speed, function() {})
					}
				if(_this.config.current === slider_img_length - 2) {
					slider_img_ul.stop(true, false).animate({
						left: -_this.config.w * _this.config.current - _this.config.w
					}, _this.config.speed, function() {
						slider_img_ul.css('left', -_this.config.w)
						_this.config.current = 0
					})
				}
			}
		})

		// 左点击事件
		slider_btn_left.on('click', function(event) {
			event.preventDefault()
			if(_this.config.current > -1) {
				//				toggleInterval()
				_this.config.current--
					if(_this.config.current != -1) {
						slider_img_ul.stop(true, false).animate({
							left: -_this.config.w * _this.config.current - _this.config.w
						}, _this.config.speed, function() {})
					}
				if(_this.config.current === -1) {
					slider_img_ul.stop(true, false).animate({
						left: 0
					}, _this.config.speed, function() {
						slider_img_ul.css('left', -_this.config.w * (slider_img_length - 2))
						_this.config.current = slider_img_length - 3
					})
				}
			}
		})

		// 自动切换
		var sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		// 判断图片切换
		function sliderInterval() {
			if(_this.config.current < slider_img_length - 2) {
				_this.config.current++
					slider_img_ul.stop(true, false).animate({
						left: -_this.config.w * _this.config.current - _this.config.w
					}, _this.config.speed, function() {
						if(_this.config.current === slider_img_length - 2) {
							slider_img_ul.css('left', -_this.config.w)
							_this.config.current = 0
						}
					})
			}
		}
		// 重置计时器
		function toggleInterval() {
			clearInterval(sliderInt)
			sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		}
		//鼠标悬停和离开
		el.mouseover(function() {
			clearInterval(sliderInt)
		})
		el.mouseleave(function() {
			sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		})

	}

	$.fn.extend({
		sSlider: function(speed, interval) {
			new sSlider($(this), speed, interval)
		}
	})

	//水平切换广告（简）
	var hSlider = function(el, speed, interval) {

		var _this = this
		this.el = el
		// 参数配置
		this.config = {
			w: this.el.width(),
			current: 0,
			speed: speed,
			intervalTime: interval
		}

		// 保存查找dom元素
		var guanggao_div = this.el.children('.slider_div')
		var guanggao_div_ul = guanggao_div.children('ul')
		var guanggao_div_ul_li = guanggao_div_ul.children('li')
		var guanggao_div_ul_li_length = guanggao_div_ul_li.length
		// 初始化默认显示图片位置
		guanggao_div_ul.css('left', -this.config.w * this.config.current - this.config.w)
		// 自动切换
		var sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		// 判断图片切换
		function sliderInterval() {
			if(_this.config.current < guanggao_div_ul_li_length - 2) {
				_this.config.current++
					guanggao_div_ul.stop(true, false).animate({
						left: -_this.config.w * _this.config.current - _this.config.w
					}, _this.config.speed, function() {
						if(_this.config.current === guanggao_div_ul_li_length - 2) {
							guanggao_div_ul.css('left', -_this.config.w)
							_this.config.current = 0
						}
						changeTitle(_this.config.current, guanggao_div_ul_li_length)
					})
			}
		}
		//切换标题
		function changeTitle(index, length) {
			index = (index + length) % length
			$(".zhuanti-desc").html($(".zhuanti-desc").next().children()[index].innerHTML)
		}
		// 重置计时器
		function toggleInterval() {
			clearInterval(sliderInt)
			sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		}
		//鼠标悬停和离开
		el.mouseover(function() {
			clearInterval(sliderInt)
		})
		el.mouseleave(function() {
			sliderInt = setInterval(sliderInterval, _this.config.intervalTime)
		})
		// 初始化左右按钮
		this.el.append('<a href="javascript:" class="slider_btn slider_btn_left">&lt;</a>')
		this.el.append('<a href="javascript:" class="slider_btn slider_btn_right">&gt;</a>')
		var slider_btn_left = this.el.children('.slider_btn_left')
		var slider_btn_right = this.el.children('.slider_btn_right')
		// 右点击事件
		slider_btn_right.on('click', function(event) {
			event.preventDefault()
			if(_this.config.current < guanggao_div_ul_li_length - 2) {
				//				toggleInterval()
				_this.config.current++
					if(_this.config.current != guanggao_div_ul_li_length - 2) {
						guanggao_div_ul.stop(true, false).animate({
							left: -_this.config.w * _this.config.current - _this.config.w
						}, _this.config.speed, function() {
							changeTitle(_this.config.current, guanggao_div_ul_li_length)
						})
					}
				if(_this.config.current === guanggao_div_ul_li_length - 2) {
					guanggao_div_ul.stop(true, false).animate({
						left: -_this.config.w * _this.config.current - _this.config.w
					}, _this.config.speed, function() {
						guanggao_div_ul.css('left', -_this.config.w)
						_this.config.current = 0
						changeTitle(_this.config.current, guanggao_div_ul_li_length)
					})
				}
			}
		})

		// 左点击事件
		slider_btn_left.on('click', function(event) {
			event.preventDefault()
			if(_this.config.current > -1) {
				//				toggleInterval()
				_this.config.current--
					if(_this.config.current != -1) {
						guanggao_div_ul.stop(true, false).animate({
							left: -_this.config.w * _this.config.current - _this.config.w
						}, _this.config.speed, function() {
							changeTitle(_this.config.current, guanggao_div_ul_li_length)
						})
					}
				if(_this.config.current === -1) {
					guanggao_div_ul.stop(true, false).animate({
						left: 0
					}, _this.config.speed, function() {
						guanggao_div_ul.css('left', -_this.config.w * (guanggao_div_ul_li_length - 2))
						_this.config.current = guanggao_div_ul_li_length - 3
						changeTitle(_this.config.current, guanggao_div_ul_li_length)
					})
				}
			}
		})
	} // --end-- hSlider

	$.fn.extend({
		hSlider: function(speed, interval) {
			new hSlider($(this), speed, interval)
		}
	})

	//文字竖直滚动
	var vSlider = function(el, speed, interval) {

		function autoScroll() {
			var height = $(el).css("height")
			var top = "-" + height
			$(el).find("ul").animate({
				marginTop: top
			}, speed, function() {
				$(this).css({
					marginTop: "0px"
				}).find("li:first").appendTo(this);
			})
		}
		//自动滚动
		var sliderInt = setInterval(autoScroll, interval)
		//鼠标悬停和离开
		el.mouseover(function() {
			clearInterval(sliderInt)
		})
		el.mouseleave(function() {
			sliderInt = setInterval(autoScroll, interval)
		})

	} // --end-- vSlider

	$.fn.extend({
		vSlider: function(speed, interval) {
			new vSlider($(this), speed, interval)
		}
	})

	$("#slider").xSlider(500, 5000)
	$("#slider2").hSlider(500, 5000)

})