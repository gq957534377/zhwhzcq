@extends ('backend.layouts.app')

@section ('title', app_name() . ' | 轮播图管理')

@section('breadcrumb-links')
    @include('backend.banner.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        轮播图管理
                        <small class="text-muted">轮播图列表</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.banner.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>排序</th>
                                <th>标题</th>
                                <th>图</th>
                                <th>url</th>
                                <th>创建时间</th>
                                <th>上次更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $banner->sort}}</td>
                                    <td>{{ $banner->title}}</td>
                                    <td>{{ $banner->file}}</td>
                                    <td>{{ $banner->url}}</td>
                                    <td>{{ $banner->created_at}}</td>
                                    <td>{{ $banner->updated_at}}</td>
                                    <td>{!! $banner->action_buttons !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {!! $banners->total() !!} 轮播图总计
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $banners->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
