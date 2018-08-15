;(function($) {
        $.extend({
            tipsBox: function(options) {
                options = $.extend({
                    obj: null,  
                    str: "+1", 
                    startSize: "12px",
                    endSize: "30px",   
                    interval: 600,  
                    color: "red",    
                    callback: function() {}
                }, options);
                $("body").append("<span class='jia1'>"+ options.str +"</span>");
                var box = $(".jia1");
                var left = options.obj.offset().left + options.obj.width() / 2;
                var top = options.obj.offset().top - options.obj.height();
                box.css({
                    "position": "absolute",
                    "left": left + "px",
                    "top": top + "px",
                    "z-index": 9999,
                    "font-size": options.startSize,
                    "line-height": options.endSize,
                    "color": options.color
                });
                box.animate({
                    "font-size": options.endSize,
                    "opacity": "0",
                    "top": top - parseInt(options.endSize) + "px"
                }, options.interval , function() {
                    box.remove();
                    options.callback();
                });
            }
        });
    })(jQuery);
	$(function() {
		$(".add").click(function() {
			$.tipsBox({
				obj: $(this),
				str: "+1",
                callback: function() {
                }
			});
		});
	});
