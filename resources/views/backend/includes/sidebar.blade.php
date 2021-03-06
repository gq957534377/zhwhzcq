<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            {{--指示板--}}
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            {{--位置管理--}}
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/positions')) }}" href="{{ route('admin.positions.index') }}"><i class="icon-speedometer"></i> 位置</a>
            </li>

            {{--标签管理--}}
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/labels')) }}" href="{{ route('admin.labels.index') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.labels') }}</a>
            </li>

            {{--文章管理--}}
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/articles')) }}" href="{{ route('admin.articles.index') }}"><i class="icon-speedometer"></i> 文章</a>
            </li>

            {{--图集管理--}}
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/article_atlas')) }}" href="{{ route('admin.article_atlas.index') }}"><i class="icon-speedometer"></i> 图集</a>
            </li>

            {{--轮播图管理--}}
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/banners')) }}" href="{{ route('admin.banners.index') }}"><i class="icon-speedometer"></i> 轮播</a>
            </li>

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                        <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/log-viewer*')) }}" href="#">
                    <i class="icon-list"></i> {{ __('menus.backend.log-viewer.main') }}
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                            {{ __('menus.backend.log-viewer.dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                            {{ __('menus.backend.log-viewer.logs') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div><!--sidebar-->