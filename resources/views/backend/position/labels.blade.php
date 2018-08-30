@extends ('backend.layouts.app')

@section ('title',  '位置管理 | 绑定标签')

@section('breadcrumb-links')
    @include('backend.position.includes.breadcrumb-links')
@endsection

@section('content')
    <form action="{{'/admin/positions_saveLabels/'.$position->id}}" method="post">
        {{csrf_field()}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            绑定标签
                            <small class="text-muted">{{$position->name}}</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr/>

                <div class="row mt-4 mb-4">
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">标签</label>

                        <div class="table-responsive col-md-10">
                            <div class="form-group row">
                                @foreach($labels as $k=>$label)
                                    <div class="checkbox col-md-2">
                                        <label class="switch switch-sm switch-3d switch-primary"
                                               for="permission-{{$k}}"><input
                                                    class="switch-input" type="checkbox"
                                                    @if(in_array($label->id,$myLabels)) checked @endif name="labels[]"
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
                    {{ form_cancel(route('admin.positions.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
        </div><!--card-->
    </form>
@endsection