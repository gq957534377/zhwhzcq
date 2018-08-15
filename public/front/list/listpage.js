$(function() {


    function revisePosition(elem) {
        var left = parseInt($(elem).css("left"))
        var width = parseInt($(elem).css("width"))
        left = left - width / 2
        $(elem).css("left", left + "px")
    }
    $('.slider').xSlider(0, 5000)
    revisePosition(".slider_dot_ul")

    $(".footer_bg").addClass("box-shadow-foot")

})
