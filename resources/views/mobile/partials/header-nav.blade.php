<!-- 头部导航滑动 begin -->
<div class="aui-nav-top">
    <div class="aui-nav-scroll">
        <div class="aui-nav-main">
            <div class="aui-nav-track">
                <a href="{{ route('mobile.index') }}" class="aui-nav-list current">首页</a>
                @foreach($__vs_nav_data['pos'] as $pos)
                    <a href="{{ route('mobile.list', [], false) }}?positionId={{ $pos->id }}" class="aui-nav-list">{{ $pos->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- 头部导航滑动 end -->