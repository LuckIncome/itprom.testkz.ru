@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image', '')
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs',['template' => 'Union', 'bread_title'=> 'Рынок смартфонов в Казахстане'])

<section class="banner banner-mini">
    <img src="{{ Voyager::image($market->bg_image) }}" class="banner__background banner__background-dark" alt="{{$market->title}}">
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1>{{$market->title}}</h1>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">

        @include('partials.sidebar_market_l')

        <div class="content">
            <div class="editors">
                {!! $market->first_content !!}
            </div>
        </div>

        @include('partials.sidebar_market_r')

    </div>
</section>

<section class="interior-info interior-info__dark">
    <div class="container">
        <div class="editors">
            {!! $market->second_content !!}
        </div>
    </div>
</section>

<section class="interior-info">
    <div class="container">
        <div class="editors">
            {!! $market->third_content !!}
        </div>
    </div>
</section>

<section class="articles">
    <div class="container">
        <div class="articles__title">@lang('general.relatedArticles')</div>
        <div class="articles__items">

            @foreach ($news as $n)
                <a href="{{ route('news.show', ['news' => $n->slug]) }}" class="article">
                    <div class="article__image">
                        <img src="{{ Voyager::image($n->image) }}" alt="{{$n->title}}">
                    </div>
                    <div class="article__info">
                        <div class="article__name">@lang('general.article')</div>
                        <div class="article__title">
                            {{ $n->title }}
                        </div>
                        <div class="article__text">
                            {!! $n->content !!}
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</section>

@endsection