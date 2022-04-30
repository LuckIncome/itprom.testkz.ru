@extends('partials.layout')
@section('page_title',(strlen($trend->title) > 1 ? $trend->title : ''))
@section('seo_title', (strlen($trend->seo_title) > 1 ? $trend->seo_title : ''))
@section('meta_keywords',(strlen($trend->meta_keywords) > 1 ? $trend->meta_keywords : ''))
@section('meta_description', (strlen($trend->meta_description) > 1 ? $trend->meta_description : ''))
@section('image','')
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs',['template' => 'Union', 'bread_title' => $trend->title])

<section class="banner banner-mini">
    <img src="{{ Voyager::image($trend->image) }}" class="banner__background banner__background-dark" alt="{{ $trend->title }}">
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1>{{ $trend->title }}</h1>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">

        @include('partials.sidebar_market_l')

        <div class="content">
            <div class="editors">
                {!! $trend->content !!}
            </div>
        </div>

         @include('partials.sidebar_trend_r')
    </div>
</section>

@endsection