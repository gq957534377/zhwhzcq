@extends('mobile.layouts.no-nav')

@section('content')
<section class="aui-scrollView aui-scrollView-special">
    <div class="aui-content-special-detail swiper-container">
        <div class="aui-slider-photo-list swiper-wrapper">
            <div class="page-loading"></div>
        </div>
    </div>
</section>
@endsection

@section('body_end')
<script src="{{ asset('mobile/themes/js/swiper.js') }}"></script>
<script src="{{ asset('mobile/themes/js/specail-detail.js') }}"></script>
@endsection