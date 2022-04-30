@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs',['template' => 'Union', 'bread_title'=> $page->title])

<section class="banner banner-mini">
    <img src="{{ Voyager::image($title->image) }}" class="banner__background banner__background-dark" alt="{{$title->title}}">
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1>{{$title->title}}</h1>
            <p>{{$title->excerpt}}</p>
        </div>
    </div>
</section>

<section class="news-block">
    <div class="container">
        @foreach($news as $new)        
        <a href="{{ route('news.show', ['news' => $new->slug]) }}" class="article">
            <div class="article__image">
                <img src="{{ Voyager::image($new->image) }}" alt="{{$new->title}}">
            </div>
            <div class="article__info">
                <div class="article__name">@lang('general.article')</div>
                <div class="article__title">
                    {{$new->title}}
                </div>
                <div class="article__text">
                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($new->content), 180,'...') !!}</p>
                    {{-- {!!$new->content!!} --}}
                </div>
            </div>
        </a>
        @endforeach 
    </div>
</section>

<section class="pagination">
    {{$news_paginate->links('partials.paginate')}}
</section>

@endsection