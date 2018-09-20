$(document).ready(function() {
    var listWrapper = $('.aui-news-list');
    var currentPage = 0;
    var pageSize = 10;
    var totalPage = 1;
    var currentVideo = null;
    var isLoading = false;

    // init
    getFixedPageData();

    function getFixedPageData() {
        isLoading = true;
        currentPage++;
        if (currentPage > 1) {
            listWrapper.append('<div class="aui-list-loading"></div>');
        }
        $.ajax({
            method: 'get',
            url: YDUI.util.serverHost + '/video.json',
            data: {
                page: currentPage
            },
            success: function(result) {
                isLoading = false;
                totalPage = result.ResultData.last_page;
                var videoList = result.ResultData.data;
                var tpl = '';
                if (currentPage == 1) {
                    if (videoList.length == 0) {
                        listWrapper.html('<div class="page-no-data">没有符合条件的内容。</div>');
                        return false;
                    }
                    listWrapper.html('');
                } else {
                    $('.aui-list-loading').remove();
                }
                videoList.forEach(function(listItem) {
                    tpl += '<div class="aui-news-item aui-news-list-one">';
                    tpl += '<div class="aui-news-item-img aui-news-item-video"><video src="' + listItem.videoSrc + '" webkit-playsinline playsinline></video><i class="aui-play-btn"></i></div>';
                    tpl += '<h2 class="aui-news-item-text-title">' + listItem.title + '</h2>';
                    tpl += '<div class="aui-news-item-text-info">';
                    tpl += '<span class="aui-news-item-text-info-text">' + listItem.source + '&nbsp;&nbsp;&nbsp;' + YDUI.util.formatFixedDate(new Date(listItem.updated_at.replace(/\-/g, "/")), 'yyyy-MM') + '</span>';
                    tpl += '</div></div></div>';
                });

                listWrapper.append(tpl);
                // 第一页
                if (currentPage == 1) {
                    bindEvents();
                }
                // 最后一页
                if (currentPage == totalPage) {
                    listWrapper.append('<div class="aui-list-nodata">已全部加载完毕</div>');
                }
            }
        });
    }


    function bindEvents() {
        // scroll
        listWrapper.scroll(function(event) {
            // 暂停播放
            if (currentVideo && YDUI.util.isOutViewPort(currentVideo)) {
                currentVideo.pause();
            }

            var scrollTop = $(this).scrollTop();
            var elemHeight = $(this).outerHeight();
            var scrollHeight = $(this).get(0).scrollHeight;
            if (scrollTop + elemHeight == scrollHeight && currentPage < totalPage && !isLoading) {
                getFixedPageData();
            }
        });

        // video play
        listWrapper.click(function(event) {
            var target = $(event.target || event.srcElement);
            if (target.hasClass('aui-play-btn')) {
                var videoElem = target.prev().get(0);
                currentVideo = videoElem;
                target.hide();
                videoElem.setAttribute('controls', 'controls');
                videoElem.play();
            }
        });
    }
});