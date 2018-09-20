$(document).ready(function() {
    var listWrapper = $('.aui-slider-photo-list');
    var articleId = YDUI.util.getQueryString('articleId');

    function getSpecialDetail () {
        $.ajax({
            url: YDUI.util.serverHost + '/api/article/' + articleId,
            method: 'get',
            success: function(result) {
                var detailAtlas = result.data.atlas;
                var tpl = '';
                detailAtlas.forEach(function(listItem) {
                    tpl += '<div class="swiper-slide">';
                    tpl += '<div class="img-wrapper"><img src="' + listItem.banner_url + '"></div>'
                    tpl += '<footer class="with-bot-ad">';
                    tpl += '<div class="description-wrapper">';
                    tpl += '<div class="description">';
                    tpl += '<div class="photo-num-wrapper">';
                    tpl += '<span class="swiper-pagination-current current-num"></span>';
                    tpl += '<span class="swiper-pagination-total">/</span>';
                    tpl += '</div>';
                    tpl += '<h1 class="album-title">' + result.data.title + '</h1>';
                    tpl += '<p class="description-word-wrapper"><span>' + listItem.brief + '</span></p>';
                    tpl += '</div></div></footer></div>'
                });
                listWrapper.html(tpl);
                bindEvents();
            }
        });
    }


    function bindEvents() {
        var swiper = new Swiper('.aui-content-special-detail', {
            pagination: {
                el: '.photo-num-wrapper',
                type: 'fraction'
            }
        });
    }

    getSpecialDetail();
});