<!-- 底部导航 begin -->
<footer class="aui-footer-bar aui-footer-fixed">
    <a href="{{ route('mobile.index') }}" class="aui-footer-item @if(route('mobile.index') == request()->url()) current @endif">
					<span class="aui-footer-item-icon">
						<i class="aui-icon aui-icon-news"></i>
					</span>
        <span class="aui-footer-item-text">要闻</span>
    </a>
    <a href="video.html" class="aui-footer-item" style="display: none;">
					<span class="aui-footer-item-icon">
						<i class="aui-icon aui-icon-video"></i>
					</span>
        <span class="aui-footer-item-text">视频</span>
    </a>
    <a href="{{ route('mobile.gallery.list') }}" class="aui-footer-item @if(route('mobile.gallery.list') == request()->url()) current @endif">
					<span class="aui-footer-item-icon">
						<i class="aui-icon aui-icon-hot"></i>
					</span>
        <span class="aui-footer-item-text">图片</span>
    </a>
</footer>
<!-- 底部导航 end -->