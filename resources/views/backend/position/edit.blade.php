@extends ('backend.layouts.app')

@section ('title', '位置管理 | 修改位置')

@section('breadcrumb-links')
    @include('backend.position.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($position, 'PATCH', route('admin.positions.update', $position->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        位置管理
                        <small class="text-muted">修改位置</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('位置名')->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('位置名')
                                ->attribute('maxlength', 64)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('级别')->class('col-md-2 form-control-label')->for('stage') }}
                        <div class="col-md-10">
                            <select name="stage" class="form-control" required="required">
                                <option value="1">一级</option>
                                <option value="2">二级</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('所属一级')->class('col-md-2 form-control-label')->for('parent_id') }}

                        <div class="col-md-10">
                            <select name="parent_id" class="form-control">
                                <option value="">无</option>
                                @foreach ($parents as $parent)
                                    <option @if($parent->parent_id=== $parent->id) selected @endif value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('是否导航展示')->class('col-md-2 form-control-label')->for('nav_show') }}
                        <div class="col-md-10">
                            <label class="switch switch-3d switch-primary">
                                <input class="switch-input" type="checkbox" name="nav_show" id="nav_show" value="1" @if($position->nav_show===1) checked @endif>
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
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
{{ html()->closeModelForm() }}
@endsection
