$(document).ready(function() {
    var listWrapper = $('.aui-news-list');
    var searchElem = $('.aui-search-key-in');
    var keyword = YDUI.util.getQueryString('keyword');
    var currentPage = 0;
    var pageSize = 10;
    var totalPage = 1;
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
            url: YDUI.util.serverHost + '/api/article_pages',
            data: {
                title: keyword,
                page: currentPage
            },
            method: 'get',
            success: function(result) {
                isLoading = false;
                totalPage = result.ResultData.last_page;
                var resultList = result.ResultData.data;
                var tpl = '';
                if (currentPage == 1) {
                    if (resultList.length == 0) {
                        listWrapper.html('<div class="page-no-data">没有符合条件的内容。</div>');
                        return false;
                    }
                    listWrapper.html('');
                } else {
                    $('.aui-list-loading').remove();
                }
                resultList.forEach(function(listItem) {
                    if (listItem.type == 2) {
                        // 三张图
                        tpl += '<a href="/gallery?articleId=' + listItem.id + '" class="aui-news-item aui-news-list-two">';
                        tpl += '<h2 class="aui-news-item-text-title aui-news-item-text-title-special">' + listItem.title + '</h2>';
                        tpl += '<div class="clearfix">';
                        listItem.atlas.forEach(function(subItem, index) {
                            if (index < 3) {
                                tpl += '<div class="aui-news-item-img"><img src="' + subItem.banner_url + '"></div>'
                            }
                        });
                        tpl += '</div>';
                        tpl += '<div class="aui-news-item-text">';
                        tpl += '<div class="aui-news-item-text-info">';
                        tpl += '<span class="aui-news-item-text-info-text">' + listItem.source + '&nbsp;&nbsp;&nbsp;' + YDUI.util.formatFixedDate(new Date(listItem.updated_at.replace(/\-/g, "/")), 'yyyy-MM') + '</span>';
                        tpl += '<div class="aui-cell-text-fr aui-cell-text-fr-special aui-cell-arrow">查看更多</div>';
                        tpl += '</div></div></a>'
                    } else {
                        tpl += '<a href="/article?articleId=' + listItem.id + '" class="aui-news-item">';
                        // 图文模式
                        if (listItem.banner) {
                            tpl += '<div class="aui-news-item-img"><img src="' + listItem.banner_url + '"></div>';
                        }
                        tpl += '<div class="aui-news-item-text">';
                        tpl += '<h2 class="aui-news-item-text-title">' + listItem.title + '</h2>';
                        if (listItem.banner) {
                            tpl += '<p class="aui-news-item-text-text">' + listItem.brief + '</p>';
                        } else {
                            // 纯文字
                            tpl += '<p class="aui-news-item-text-text aui-news-item-text-text-special">' + listItem.brief + '</p>';
                        }
                        tpl += '<div class="aui-news-item-text-info">';
                        tpl += '<span class="aui-news-item-text-info-text">' + listItem.source + '&nbsp;&nbsp;&nbsp;' + YDUI.util.formatFixedDate(new Date(listItem.updated_at.replace(/\-/g, "/")), 'yyyy-MM') + '</span>';
                        tpl += '</div></div></a>'
                    }
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
        listWrapper.scroll(function() {
            var scrollTop = $(this).scrollTop();
            var elemHeight = $(this).outerHeight();
            var scrollHeight = $(this).get(0).scrollHeight;
            if (scrollTop + elemHeight == scrollHeight && currentPage < totalPage && !isLoading) {
                getFixedPageData();
            }
        });
    }

    // search
    $('.aui-item-search').click(function() {
        var value = searchElem.val();
        window.location.href = '/search?keyword=' + value;
    });
});