@extends ('backend.layouts.app')

@section ('title',  '轮播图管理 | 添加轮播图')

@section('breadcrumb-links')
    @include('backend.banner.includes.breadcrumb-links')
@endsection
@section('styles')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.banners.store'))->class('form-horizontal')->attribute('enctype',"multipart/form-data")->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        轮播图管理
                        <small class="text-muted">新建轮播图</small>
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
                        {{ html()->label('轮播图链接')->class('col-md-2 form-control-label')->for('url') }}
                        <div class="col-md-10">
                            {{ html()->text('url')
                                ->class('form-control')
                                ->placeholder('轮播图链接')
                                ->attribute('maxlength', 255)
                                ->attribute('type','url')
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{--缩略图--}}
                    <div class="form-group row">
                        {{ html()->label('缩略图')->class('col-md-2 form-control-label')->for('banner') }}

                        {{--<div class="col-md-9 col-sm-9 col-xs-12">--}}
                            {{--<a href="javascript:void(0);" id="banner"><img id="banner_up-img"--}}
                                                                           {{--src="/upLoad.jpg"/></a>--}}
                        {{--</div>--}}
                        {{--<input required type="hidden" name="file"--}}
                               {{--id="banner_up">--}}
                        <input value="" type="file" name="file">

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

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.banners.index'), __('buttons.general.cancel')) }}
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
                        {{--<div class="cropped"></div>--}}
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