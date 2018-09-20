$(document).ready(function() {
    var detailWrapper = $('.aui-special-box');
    var articleId = YDUI.util.getQueryString('articleId');
    var currentPage = 1;
    $.ajax({
        url: YDUI.util.serverHost + '/api/article/' + articleId,
        method: 'get',
        success: function(result) {
            var detailData = result.data;

            if (detailData.type == 2) {
                location.href = '/gallery?articleId=' + articleId;
                return;
            }

            var tpl = '';
            tpl += '<div class="aui-special-head">';
            tpl += '<h1>' + detailData.title + '</h1>';
            tpl += '<p>' + detailData.source + '&nbsp;&nbsp;&nbsp;' + YDUI.util.formatFixedDate(new Date(detailData.created_at.replace(/\-/g, "/")), 'yyyy-MM') + '</p>';
            tpl += '</div>';
            tpl += detailData.content;
            detailWrapper.html(tpl);
        }
    })
});