@extends ('backend.layouts.app')

@section ('title', app_name() . ' | 图集文章管理')

@section('breadcrumb-links')
    @include('backend.article_atlas.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        图集文章管理
                        <small class="text-muted">图集文章列表</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.article_atlas.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>标题</th>
                                <th>来源</th>
                                <th>缩略图</th>
                                <th>简述</th>
                                <th>编辑</th>
                                <th>排序</th>
                                <th>创建时间</th>
                                <th>上次更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id}}</td>
                                    <td>{{ $article->title}}</td>
                                    <td>{{ $article->source}}</td>
                                    <td>
                                        <img src="{{$article->Atlas->first()->banner??''}}" style="width: 70px;height: 30px;">
                                    </td>
                                    <td title="{{$article->brief}}">{{str_limit($article->brief,10,'...')}}</td>
                                    <td>{{ $article->author}}</td>
                                    <td>{{ $article->sort}}</td>
                                    <td>{{ $article->created_at}}</td>
                                    <td>{{ $article->updated_at}}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
                                            <a href="/admin/article_atlas/{{$article->id}}/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-1" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="编辑"><title id="svg-inline--fa-title-1">编辑</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="编辑"></i> --></a>

                                            <div class="btn-group" role="group">
                                                <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    More
                                                </button>
                                                <a href="/admin/article_has_atlas?article_id={{$article->id}}" class="btn btn-success dropdown-item">设置图集</a>
                                                <div class="dropdown-menu" aria-labelledby="userActions">
                                                    <a data-method="delete" data-trans-button-cancel="取消" data-trans-button-confirm="删除" data-trans-title="你确定这样做吗？" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">删除
                                                        <form action="/admin/article_atlas/{{$article->id}}" method="POST" name="delete_item" style="display:none">
                                                            <input type="hidden" name="_method" value="delete">
                                                            <input type="hidden" name="_token" value="8TYs11CMRN1QJCCLZf5WvVJ61ePsFNViWfBLRHr4">
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
                        {!! $articles->total() !!} 图集文章总计
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $articles->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
