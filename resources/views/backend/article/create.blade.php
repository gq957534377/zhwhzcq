@extends ('backend.layouts.app')

@section ('title',  '文章管理 | 添加文章')

@section('breadcrumb-links')
    @include('backend.article.includes.breadcrumb-links')
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="/admin_crop.min.css"/>
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

                    {{--缩略图--}}
                    <div class="form-group row">
                        {{ html()->label('缩略图')->class('col-md-2 form-control-label')->for('banner') }}

                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <a href="javascript:void(0);" id="banner"><img id="banner_up-img"
                                                                           src="/upLoad.jpg"/></a>
                        </div>
                        <input required value="11111" type="hidden" name="banner"
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
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('内容')->class('col-md-2 form-control-label')->for('content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('content')
                                ->class('form-control')
                                ->placeholder('内容')
                                ->attribute('id','content')
                                ->style(['height'=>'300px'])
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

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

    {{--缩略图--}}
    <div id="banner_up_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
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
        var ue = UE.getEditor('content', {
            autoHeightEnabled: true,
            autoFloatEnabled: true,
        });
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });

    </script>
    <script src="/crop.min.js"></script>
    <script>
        $(function () {
            var options =
                {
                    thumbBox: '.thumbBox',
                    spinner: '.spinner',
                    imgSrc: '',
                };
            var cropper = $('.imageBox').cropbox(options);
            $('#upload-file').on('change', function () {

                var file = this.files[0];
                // 限制图片类型
                if (file.type.indexOf("image") === -1) {
                    swal('提示!', '请选择图片类型文件！', 'error');
                    return false;
                }
                // 限制图片大小

                if (file.size >= 1024 * 1024) {
                    swal('提示!', '请选择小于1M的图片！', 'error');
                    return false;
                }

                var reader = new FileReader();
                reader.onload = function (e) {
                    options.imgSrc = e.target.result;
                    cropper = $('.imageBox').cropbox(options);
                };
                reader.readAsDataURL(this.files[0]);
//                this.files = [];
            });
            $('#btnCrop').on('click', function () {
                var img = cropper.getDataURL();
                $('.cropped').html('');
                $('.cropped').append('<img src="' + img + '" align="absmiddle" style="width:64px;margin-top:4px;border-radius:64px;box-shadow:0px 0px 12px #7E7E7E;" ><p>64px*64px</p>');
                $('.cropped').append('<img src="' + img + '" align="absmiddle" style="width:128px;margin-top:4px;border-radius:128px;box-shadow:0px 0px 12px #7E7E7E;"><p>128px*128px</p>');
                $('.cropped').append('<img src="' + img + '" align="absmiddle" style="width:180px;margin-top:4px;border-radius:180px;box-shadow:0px 0px 12px #7E7E7E;"><p>180px*180px</p>');


                // 定义上传事件
                // 将base64文件转换为bolb文件
                function getBlobBydataURI(dataURI, type) {
                    var binary = atob(dataURI.split(',')[1]);
                    var array = [];
                    for (var i = 0; i < binary.length; i++) {
                        array.push(binary.charCodeAt(i));
                    }
                    return new Blob([new Uint8Array(array)], {type: type});
                }

                var formData = new FormData();
//                var $Blob = getBlobBydataURI(img, 'image/jpeg');
//                formData.append('banner', $Blob);
                formData.append('_token', "{{csrf_token()}}");
                console.log(formData);
                console.log(1111);
                $.ajax({
                    url: '/admin/uploadBanner',
                    type: 'post',
                    beforeSend: function () {
                        $('#banner_up-img').attr('src', '/loading.gif');
                    },
                    data: formData,
                    success: function (data) {
                        console.log(data);
//                        $('#banner_up').val(data.key);
//                        $('#banner_up-img').attr('src', url);
//                        $('#banner_up_modal').modal('hide');

                    }
                });
//
            });
            $('#btnZoomIn').on('click', function () {
                cropper.zoomIn();
            });
            $('#btnZoomOut').on('click', function () {
                cropper.zoomOut();
            })
            //  显示上传缩略图模态框
            $('#banner').click(function () {
                $('#banner_up_modal').modal('show');
            })
        })
    </script>
@endsection