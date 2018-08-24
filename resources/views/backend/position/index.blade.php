@extends ('backend.layouts.app')

@section ('title', app_name() . ' | 位置管理')

@section('breadcrumb-links')
    @include('backend.position.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        位置管理
                        <small class="text-muted">创建列表</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.position.includes.header-buttons')
                </div><!--col-->
                <div class="col-sm-3">
                    <select id="stage" class="form-control input-sm">
                        <option value="">全部级别</option>
                        <option value="1" @if(!empty(Request::get('stage'))&&Request::get('stage')==1)selected @endif>一级</option>
                        <option value="2" @if(!empty(Request::get('stage'))&&Request::get('stage')==2)selected @endif>二级</option>
                    </select>
                </div>

            </div><!--row-->

            <div class="row">

            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>标签名</th>
                                <th>所属级别</th>
                                <th>父级id</th>
                                <th>是否展示在导航</th>
                                <th>排序</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($positions as $position)
                                <tr>
                                    <td>{{ $position->name}}</td>
                                    <td>{{ $position->stage}}</td>
                                    <td>{{ $position->parentPosition->name??'无'}}</td>
                                    <td>{!! $position->nav_show_cn !!}</td>
                                    <td>{{ $position->sort}}</td>
                                    <td>{{ $position->created_at}}</td>
                                    <td>{!! $position->action_buttons !!}</td>
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
                        {!! $positions->total() !!} {{ trans_choice('位置共计', $positions->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $positions->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
@section('scripts')
    <script>
        $('#stage').change(function () {
            window.location.href='/admin/positions?stage='+$(this).val()
        });
    </script>
    @endsection