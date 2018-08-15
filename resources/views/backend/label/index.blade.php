@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.access.labels.management'))

@section('breadcrumb-links')
    @include('backend.label.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.labels.management') }}
                        <small class="text-muted">{{ __('labels.backend.access.labels.active') }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.label.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.backend.access.labels.table.name') }}</th>
                                <th>{{ __('labels.backend.access.labels.table.stage') }}</th>
                                <th>{{ __('labels.backend.access.labels.table.parent_id') }}</th>
                                <th>{{ __('labels.backend.access.labels.table.nav_show') }}</th>
                                <th>{{ __('labels.backend.access.labels.table.created_at') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($labels as $label)
                                <tr>
                                    <td>{{ $label->name}}</td>
                                    <td>{{ $label->stage}}</td>
                                    <td>{{ $label->parentLabel->name??'无'}}</td>
                                    <td>{!! $label->nav_show_cn !!}</td>
                                    <td>{{ $label->created_at}}</td>
                                    <td>{!! $label->action_buttons !!}</td>
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
                        {!! $labels->total() !!} {{ trans_choice('labels.backend.access.labels.table.total', $labels->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $labels->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
