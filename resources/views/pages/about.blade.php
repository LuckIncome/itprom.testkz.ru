@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs',['template' => 'Union','bread_title' => $page->title])

<section class="banner banner-mini">
    <img src="{{ Voyager::image($about->bg_image) }}" class="banner__background banner__background-dark" alt="{{ $about->title }}">
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1>{{ $about->title }}</h1>
            <p>{{ $about->excerpt }}</p>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">

        @include('partials.sidebar_union')
        
        <div class="content">
            <div class="editors">
                {!! $about->first_content !!}
            </div>
        </div>
        <div class="content" style="border: none; padding: 0;">
        </div>

    </div>
</section>

<section class="interior-images">
    <div class="container">
        <div class="image">
            <img src="{{Voyager::image($about->first_image)}}" alt="{{ $about->first_alt_image }}">
            <p>{{ $about->first_title_image }}</p>
        </div>
        <div class="image">
            <img src="{{Voyager::image($about->second_image)}}" alt="{{ $about->second_alt_image }}">
            <p>{{ $about->second_title_image }}</p>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">

        <div class="content" style="border: none;">
        </div>
        <div class="content">
            <div class="editors">
                {!! $about->second_content !!}
            </div>
        </div>
        <div class="content" style="border: none; padding: 0;">
        </div>

    </div>
</section>

@endsection