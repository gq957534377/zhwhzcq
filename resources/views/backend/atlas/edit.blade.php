@extends ('backend.layouts.app')

@section ('title',  '图集管理 | 编辑图集')

@section('breadcrumb-links')
    @include('backend.atlas.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($atlas, 'PATCH', route('admin.article_has_atlas.update', $atlas->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        图集管理
                        <small class="text-muted">编辑</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <input type="hidden" name="article_id" value="{{Request::get('article_id')}}">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('简述')->class('col-md-2 form-control-label')->for('brief') }}

                        <div class="col-md-10">
                            {{ html()->text('brief')
                                ->class('form-control')
                                ->placeholder('简述')
                                ->attribute('maxlength', 125)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('图集链接')->class('col-md-2 form-control-label')->for('url') }}
                        <div class="col-md-10">
                            {{ html()->text('url')
                                ->class('form-control')
                                ->placeholder('图集链接')
                                ->attribute('maxlength', 255)
                                ->attribute('type','url')
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{--缩略图--}}
                    <div class="form-group row">
                        {{ html()->label('缩略图')->class('col-md-2 form-control-label')->for('banner') }}

                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <a href="javascript:void(0);" id="banner"><img id="banner_up-img"
                                                                           src="{{$atlas->banner??'/upLoad.jpg'}}"/></a>
                        </div>
                        <input required type="hidden" value="{{$atlas->banner}}" name="banner"
                               id="banner_up">
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
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.banners.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
<div id="zxzApp"></div>

@endsection
@section('scripts')
    <script type="text/javascript">
        window.zxzIsGood = function(data, field){
            if (data.StatusCode===200){
                $('#banner_up-img').attr('src',data.ResultData);
                $('#banner_up').val(data.ResultData);
                $('.vicp-icon4').trigger('click');
            }else{
                alert(data.ResultData);
            }
        }
    </script>

    <script src="/crop.min.js"></script>
@endsection