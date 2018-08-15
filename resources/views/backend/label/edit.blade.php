@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.labels.management') . ' | ' . __('labels.backend.access.labels.edit'))

@section('breadcrumb-links')
    @include('backend.label.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($label, 'PATCH', route('admin.labels.update', $label->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.labels.management') }}
                        <small class="text-muted">{{ __('labels.backend.access.labels.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.labels.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.labels.name'))
                                ->attribute('maxlength', 64)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.labels.stage'))->class('col-md-2 form-control-label')->for('stage') }}
                        <div class="col-md-10">
                            <select name="stage" class="form-control" required="required">
                                <option value="1">一级</option>
                                <option value="2">二级</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.labels.parent_id'))->class('col-md-2 form-control-label')->for('parent_id') }}

                        <div class="col-md-10">
                            <select name="parent_id" class="form-control" required="required">
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}">{{ $label->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.labels.nav_show'))->class('col-md-2 form-control-label')->for('nav_show') }}

                        <div class="col-md-10">
                            <label class="switch switch-3d switch-primary">
                                {{ html()->checkbox('nav_show', true, '1')->class('switch-input') }}
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
