@extends ('backend.layouts.app')

@section ('title',  '图集管理 | 编辑图集')

@section('breadcrumb-links')
    @include('backend.article_atlas.includes.breadcrumb-links')
@endsection

@section('content')

    {{ html()->modelForm($article, 'PATCH', route('admin.article_atlas.update', $article->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        图集管理
                        <small class="text-muted">编辑图集</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('标题')->class('col-md-2 form-control-label')->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder('标题')
                                ->attribute('maxlength', 125)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('来源')->class('col-md-2 form-control-label')->for('source') }}

                        <div class="col-md-10">
                            {{ html()->text('source')
                                ->class('form-control')
                                ->placeholder('来源')
                                ->attribute('maxlength', 32)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('编辑')->class('col-md-2 form-control-label')->for('author') }}

                        <div class="col-md-10">
                            {{ html()->text('author')
                                ->class('form-control')
                                ->placeholder('编辑')
                                ->attribute('maxlength', 64)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('简述')->class('col-md-2 form-control-label')->for('brief') }}

                        <div class="col-md-10">
                            {{ html()->text('brief')
                                ->class('form-control')
                                ->placeholder('简述')
                                ->attribute('maxlength', 255)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('图集文章链接')->class('col-md-2 form-control-label')->for('url') }}

                        <div class="col-md-10">
                            {{ html()->text('url')
                                ->class('form-control')
                                ->placeholder('图集文章链接')
                                ->attribute('maxlength', 255)
                                ->attribute('type','url')
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('排序')->class('col-md-2 form-control-label')->for('sort') }}

                        <div class="col-md-10">
                            {{ html()->text('sort')
                                ->class('form-control')
                                ->placeholder('排序')
                                ->attribute('type','number')
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">标签</label>

                        <div class="table-responsive col-md-10">
                            <div class="form-group row">
                                @foreach($labels as $k=>$label)
                                    <div class="checkbox col-md-2">
                                        <label class="switch switch-sm switch-3d switch-primary"
                                               for="permission-{{$k}}"><input
                                                    class="switch-input" type="checkbox" @if(in_array($label->id,$article->labels->pluck('id')->toArray())) checked @endif name="labels[]"
                                                    id="permission-{{$k}}" value="{{$label->id}}"><span
                                                    class="switch-label"></span><span
                                                    class="switch-handle"></span></label>
                                        <label for="permission-1">{{$label->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div><!--col-->
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.article_atlas.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
@section('scripts')

@endsection