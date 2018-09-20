@extends('mobile.layouts.no-nav')

@section('content')
<section class="aui-scrollView aui-scrollView-special">
    <div class="aui-content aui-content-detail">
        <div class="aui-special-box">
            <div class="page-loading"></div>
        </div>
    </div>
</section>
@endsection

@section('body_end')
<script src="{{ asset('mobile/themes/js/detail.js') }}"></script>
@endsection