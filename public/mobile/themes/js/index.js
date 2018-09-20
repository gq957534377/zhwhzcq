$(document).ready(function () {
    var listWrapper = $('.aui-news-list');
    $.ajax({
        url: YDUI.util.serverHost + '/mock/list.json',
        method: 'get',
        success: function (result) {
            var newsList = result.ResultData.data;
            var tpl = '';
            newsList.forEach(function (listItem) {
                if (listItem.type == 2) {
                    // 三张图
                    tpl += '<a href="special.html" class="aui-news-item aui-news-list-two">';
                    tpl += '<h2 class="aui-news-item-text-title aui-news-item-text-title-special">'+listItem.title+'</h2>';
                    tpl +='<div class="clearfix">';
                    listItem.atlas.forEach(function (subItem, index) {
                        if (index < 3) {
                            tpl += '<div class="aui-news-item-img"><img src="' + subItem.banner_url + '"></div>'
                        }
                    });
                    tpl +='</div>';
                    tpl += '<div class="aui-news-item-text">';
                    tpl += '<div class="aui-news-item-text-info">';
                    tpl += '<span class="aui-news-item-text-info-text">'+listItem.source+'&nbsp;&nbsp;&nbsp;'+YDUI.util.formatFixedDate(new Date(listItem.updated_at.replace(/\-/g, "/")), 'yyyy-MM')+'</span>';
                    tpl += '<div class="aui-cell-text-fr aui-cell-text-fr-special aui-cell-arrow">查看更多</div>';
                    tpl += '</div></div></a>'
                } else {
                    tpl += '<a href="detail.html?articleId=123" class="aui-news-item">';
                    // 图文模式
                    if (listItem.banner) {
                        tpl += '<div class="aui-news-item-img"><img src="' + listItem.banner_url + '"></div>';
                    }
                    tpl += '<div class="aui-news-item-text">';
                    tpl += '<h2 class="aui-news-item-text-title">'+listItem.title+'</h2>';
                    if (listItem.banner) {
                        tpl += '<p class="aui-news-item-text-text">'+listItem.brief+'</p>';
                    } else {
                        // 纯文字
                        tpl += '<p class="aui-news-item-text-text aui-news-item-text-text-special">'+listItem.brief+'</p>';
                    }
                    tpl += '<div class="aui-news-item-text-info">';
                    tpl += '<span class="aui-news-item-text-info-text">'+listItem.source+'&nbsp;&nbsp;&nbsp;'+YDUI.util.formatFixedDate(new Date(listItem.updated_at.replace(/\-/g, "/")), 'yyyy-MM')+'</span>';
                    tpl += '</div></div></a>'
                }
            });
            listWrapper.html(tpl);
        }
    })
});