$(document).ready(function () {
    var listWrapper = $('.aui-special-list-item');
    var currentPage = 0;
    var pageSize = 10;
    var totalPage = 1;
    var isLoading = false;

    getFixedPageData();

    function getFixedPageData() {
        isLoading = true;
        currentPage++;
        if (currentPage > 1) {
            listWrapper.append('<div class="aui-list-loading"></div>');
        }
        $.ajax({
            url: YDUI.util.serverHost +  '/api/article_pages',
            data: {
                page: currentPage,
                type: 2
            },
            method: 'get',
            success: function (result) {
                isLoading = false;
                totalPage = result.ResultData.last_page;
                var specialList = result.ResultData.data;
                var tpl = '';
                if (currentPage == 1) {
                    if (specialList.length == 0) {
                        listWrapper.html('<div class="page-no-data">没有符合条件的内容。</div>');
                        return false;
                    }
                    listWrapper.html('');
                } else {
                    $('.aui-list-loading').remove();
                }
                specialList.forEach(function (listItem) {
                    if (listItem.type == 2) {
                        // 三张图
                        tpl += '<a href="/gallery?articleId=' + listItem.id + '" class="aui-special-cell">';
                        tpl += '<div class="aui-special-cell-title">'+listItem.title+'</div>';
                        tpl += '<div class="aui-special-cell-img clearfix">';
                        listItem.atlas.forEach(function (subItem, index) {
                            if (index < 3) {
                                tpl += '<div><img src="'+subItem.banner_url+'"></div>'
                            }
                        });
                        tpl +='</div>';
                        tpl += '<div class="aui-special-cell-pl">';
                        tpl += '<p>'+listItem.source+'&nbsp;&nbsp;&nbsp;'+YDUI.util.formatFixedDate(new Date(listItem.updated_at.replace(/\-/g, "/")), 'yyyy-MM')+'</p>';
                        tpl += '</div></a>'
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
});