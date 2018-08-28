@extends ('backend.layouts.app')

@section ('title',  '文章管理 | 添加文章')

@section('breadcrumb-links')
    @include('backend.article.includes.breadcrumb-links')
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="/admin_crop.min.css"/>
    <style type="text/css">
        /*.edui-default .edui-editor {*/
        .edui-default .edui-editor-iframeholder {
            background-image: url(/img/backend/col-dot.png);
            background-position-x: 765px;
            background-repeat: repeat-y;
        }
    </style>
@endsection

@section('content')
    @include('vendor.ueditor.assets')

    {{ html()->form('POST', route('admin.articles.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        文章管理
                        <small class="text-muted">新建文章</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr/>

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

                    {{--缩略图--}}
                    <div class="form-group row">
                        {{ html()->label('缩略图')->class('col-md-2 form-control-label')->for('banner') }}

                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <a href="javascript:void(0);" id="banner"><img id="banner_up-img"
                                                                           src="/upLoad.jpg"/></a>
                        </div>
                        <input required value="" type="hidden" name="banner"
                               id="banner_up">
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('文章链接')->class('col-md-2 form-control-label')->for('url') }}

                        <div class="col-md-10">
                            {{ html()->text('url')
                                ->class('form-control')
                                ->placeholder('文章链接')
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
                                ->attribute('value',0)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('内容')->class('col-md-2 form-control-label')->for('content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('content')
                                ->placeholder('内容')
                                ->attribute('id','content')
                                ->style(['height'=>'300px'])
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
                                                    class="switch-input" type="checkbox" name="labels[]"
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

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.articles.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
    <div id="zxzApp"></div>
    {{--缩略图--}}
    <div id="banner_up_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="close-model" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">上传缩略图</h4>
                </div>
                <div class="modal-body">
                    <div class="container_crop">
                        <div class="imageBox">
                            <div class="thumbBox"></div>
                            <div class="spinner" style="display: none"><span class="font-18" style="">Loading...</span>
                            </div>
                        </div>
                        <div class="action">
                            <!-- <input type="file" id="file" style=" width: 200px">-->
                            <div class="new-contentarea tc">
                                <a href="javascript:void(0)" class="upload-img"> <label
                                            for="upload-file">选择图像</label>
                                </a> <input type="file" class="" name="upload-file" id="upload-file"/>
                            </div>
                            <input type="button" id="btnCrop" class="Btnsty_peyton" value="裁切">
                            <input type="button" id="btnZoomIn" class="Btnsty_peyton" value="+">
                            <input type="button" id="btnZoomOut" class="Btnsty_peyton"
                                   value="-">
                        </div>
                    </div>
                    <div class="view-mail">
                        <br>
                        <p id="show-content"></p>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@section('scripts')
    <script type="text/javascript">
        var ue = UE.getEditor('content', {});
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
        window.zxzIsGood = function (data, field) {
            if (data.StatusCode === 200) {
                $('#banner_up-img').attr('src', data.ResultData);
                $('#banner_up').val(data.ResultData);
                $('.vicp-icon4').trigger('click');
            } else {
                alert(data.ResultData);
            }
        }

        $('#stage1').change(function () {
            $('#stage2').html();
        });
    </script>

    <script src="/crop.min.js"></script>
@endsection