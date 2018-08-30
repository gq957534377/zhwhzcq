$(function() {
    var innerGroup = $(".innerwraper");
    $('.list-nav').css('width',innerGroup.length*1024+'px');
    var leftArrow = $(".img-prev");
    var rightArrow = $(".img-next");
    var imgWidth = $(".innerwraper").width();
    $(".info-nav-left").html("<span>1</span> / "+innerGroup.length);
    var _index = 0;
    var timer = null;
    var flag = true;
    $(".info-nav-right p").eq(_index).show();
    rightArrow.on("click", function() {
        if(_index ==innerGroup.length) {
            $('.atlas').show();
            return false;
        }
        $(".info-nav-right p").hide();
        $(".info-nav-right p").eq(_index).show();
        $(".info-nav-left").html();
        $(".info-nav-left").html("<span>"+(parseInt($('.info-nav-left span').html())+1)+"</span> / "+innerGroup.length);
        $(".list-nav").animate({
            left: -((_index+1) * imgWidth),
        }, 500);
        _index++;
    })
    // 点击按钮隐藏
    $('.atlas h3 span').click(function(){
        $('.atlas').hide();
    });
    leftArrow.on("click", function() {
        if(_index==0) {
            return false;
        }
        $(".info-nav-right p").hide();
        $(".info-nav-right p").eq(_index-1).show();
        $(".info-nav-left").html();
        $(".info-nav-left").html("<span>"+(parseInt($('.info-nav-left span').html())-1)+"</span> / "+innerGroup.length);
        $(".list-nav").animate({
            left: -((_index-1) * imgWidth),
        }, 500);
        _index--;
    })

    // $(".banner").hover(function() {
    //     //鼠标移入
    //     clearInterval(timer);
    //     flag = false;
    // }, function() {
    //     flag = true;
    //     timer = setInterval(go, 3000);
    // });

    // function autoGo(bol) {
    //     //自动行走
    //     if (bol) {
    //         timer = setInterval(go, 3000);
    //     }
    // }
    // autoGo(flag);

    function go() {
        //计时器的函数
        _index++;
        selectPic(_index);
    }
    function selectPic(num) {
        var nums = num == innerGroup.length ? 0 : num;

        $(".info-nav-right p").hide();
        $(".info-nav-right p").eq(nums).show();
        $(".info-nav-left").html();
        $(".info-nav-left").html("<span>"+(nums+1)+"</span> / "+innerGroup.length);
        $(".list-nav").animate({
            left: -num * imgWidth,
        }, 500, function() {

            //检查是否到最后一张
            if (_index == innerGroup.length) {
                _index = 0;
                $(".list-nav").css("left", "0px");
            }
        })
    }



})