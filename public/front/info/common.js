$(function() {
    var innerGroup = $(".innerwraper");
    var leftArrow = $(".img-prev");
    var rightArrow = $(".img-next");
    var imgWidth = $(".innerwraper").width();
    $(".info-nav-left").html("<span>1</span> / "+innerGroup.length);
    var _index = 0;
    var timer = null;
    var flag = true;
    $(".info-nav-right p").eq(_index).show();
    rightArrow.on("click", function() {
        //右箭头
        flag = false;
        clearInterval(timer);
        _index++;
        selectPic(_index);
        if(_index==innerGroup.length){
            clearInterval(timer);
            flag = false;
            $('.atlas').show();
        }

    })
    // 点击按钮隐藏
    $('.atlas h3 span').click(function(){
        $('.atlas').hide();
    });
    leftArrow.on("click", function() {
        //左箭头
        flag = false;
        clearInterval(timer);
        if (_index == 0) {
            _index = innerGroup.length - 1;
            $(".list-nav").css("left", -(innerGroup.length - 1) * imgWidth);
        }
        _index--;
        selectPic(_index);
        if(_index==1){
            clearInterval(timer);
            flag = false;
            $('.atlas').show();
        }
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