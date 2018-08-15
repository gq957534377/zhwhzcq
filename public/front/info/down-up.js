$(function () {

    $(".link-1 p").click(function () {
        var ul = $(".new");
        if (ul.css("display") == "none") {
            ul.slideDown();
        } else {
            ul.slideUp();
        }
    });

    $(".set").click(function () {
        var _name = $(this).attr("name");
        if ($("[name=" + _name + "]").length > 1) {
            $("[name=" + _name + "]").removeClass("select");
            $(this).addClass("select");
        } else {
            if ($(this).hasClass("select")) {
                $(this).removeClass("select");
            } else {
                $(this).addClass("select");
            }
        }
    });

    $(".link-1 li").click(function () {
        var li = $(this).text();
        $(".link p").html(li);
        $(".new").hide();
        /*$(".set").css({background:'none'});*/
        $("p").removeClass("select");
    });
})

