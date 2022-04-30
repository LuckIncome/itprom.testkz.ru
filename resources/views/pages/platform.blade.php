@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs',[
    'template' => 'Union',
    'bread_title' => $page->title,
])

<section class="banner banner-mini">
    <img src="{{ Voyager::image($platform->bg_image) }}" class="banner__background banner__background-dark" alt="{{ $platform->bg_title }}">
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1>{{ $platform->bg_title }}</h1>
            <p>{{ $platform->bg_excerpt }}</p>
        </div>
    </div>
</section>

<section class="platform-articles">
    <div class="container">
        <div class="item">
            <img src="{{ Voyager::image($platform->first_image) }}" alt="123">
            <div class="info">
                <h3>{{ $platform->first_title }}</h3>
                {!! $platform->first_excerpt !!}
                
            </div>
        </div>
        <div class="item">
            <img src="{{ Voyager::image($platform->second_image) }}" alt="{{ $platform->second_title }}">
            <div class="info">
                <h3>{{ $platform->second_title }}</h3>
                {!! $platform->second_excerpt !!}
            </div>
        </div>
    </div>
</section>

<section class="platform-block">
    <img src="{{ asset('assets/images/bg-platforma.png') }}" class="platform-block__bg" alt="bg">
    <div class="container">
        <div class="image">
            <img src="{{ Voyager::image($platform->logo_image) }}" alt="logo">
        </div>
        <div class="editors">
            <p>
                {{ $platform->logo_excerpt }}
            </p>
        </div>
    </div>
</section>

<section class="platform-img">
    <div class="container">
        <img src="{{ Voyager::image($platform->platform_image) }}" alt="platforma-1">
        <p>{{ $platform->platform_excerpt }}</p>
    </div>
</section>

<section class="platform-processes">
    <div class="container">
        <h2>{!! $platform->platform_title !!}</h2>
        <div class="items">
            <div class="item">
                <div class="head">
                    <img src="{{ Voyager::image($platform->first_processes_image) }}" alt="{{ $platform->first_processes_title }}">
                    <p>{{ $platform->first_processes_title }}</p>
                </div>
                <div class="editors">
                    {!! $platform->first_processes_content !!}
                </div>
            </div>
            <div class="item">
                <div class="head">
                    <img src="{{ Voyager::image($platform->second_processes_image) }}" alt="{{ $platform->second_processes_title }}">
                    <p>{{ $platform->second_processes_title }}</p>
                </div>
                <div class="editors">
                    {!! $platform->second_processes_content !!}
                </div>
            </div>
            <div class="item">
                <div class="head">
                    <img src="{{ Voyager::image($platform->third_processes_image) }}" alt="{{ $platform->third_processes_title }}">
                    <p>{{ $platform->third_processes_title }}</p>
                </div>
                <div class="editors">
                    {!! $platform->third_processes_content !!}
                </div>
            </div>
            <div class="item">
                <div class="head">
                    <img src="{{ Voyager::image($platform->fourth_processes_image) }}" alt="{{ $platform->fourth_processes_title }}">
                    <p>{{ $platform->fourth_processes_title }}</p>
                </div>
                <div class="editors">
                    {!! $platform->fourth_processes_content !!}
                </div>
            </div>


        </div>
    </div>
</section>

<section class="platform-dark">
    <div class="container">
        <div class="editors">
            {!! $platform->first_lower_content !!}

            <div class="item-interest item-interest-1">
                <img src="{{ Voyager::image($platform->first_icon_image) }}" alt="{{ $platform->first_icon_title }}">
                <div class="item-interest__info">
                    <h3>{{ $platform->first_icon_title }}</h3>
                    <p>{{ $platform->first_icon_excerpt }}</p>
                </div>
            </div>

            <div class="item-interest">
                <img src="{{ Voyager::image($platform->second_icon_image) }}" alt="{{ $platform->second_icon_title }}">
                <div class="item-interest__info">
                    <h3>{{ $platform->second_icon_title }}</h3>
                    <p>{{ $platform->second_icon_excerpt }}</p>
                </div>
            </div>

            <div class="item-interest">
                <img src="{{ Voyager::image($platform->third_icon_image) }}" alt="{{ $platform->third_icon_title }}">
                <div class="item-interest__info">
                    <h3>{{ $platform->third_icon_title }}</h3>
                    <p>{{ $platform->third_icon_excerpt }}</p>
                </div>
            </div>

            <div class="block">
                <h3>{{ $platform->icon_title }}</h3>
            </div>
        
        </div>

        <div class="editors">
             {!! $platform->second_lower_content !!}
        </div>

        <div class="hr"></div>

        <div class="blocks">

            <div class="block">
                <h3>{{ $platform->first_task_title }}</h3>
            </div>

            <div class="items">
                <div class="item">
                    {!! $platform->first_task_content !!}
                </div>

                <div class="item">
                    <img src="{{ Voyager::image($platform->task_image) }}" alt="{{ $platform->second_task_title }}">
                    <h3>{{ $platform->second_task_title }}</h3>
                </div>

                <div class="item">
                    {!! $platform->second_task_content !!}
                </div>
                <div class="item">
                    {!! $platform->third_task_content !!}
                </div>

            </div>

        </div>
        
        <div class="hr"></div>
        <div class="editors editors-new">
            {!! $platform->third_lower_content !!}
        </div>
    </div>
</section>

<section class="articles">
    <div class="container">
        <div class="articles__title">@lang('general.relatedArticles')</div>
        <div class="articles__items">
            @foreach ($news as $new)  
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
                        {!! \Illuminate\Support\Str::limit($new->content, 180,'...') !!}
                    </div>
                </div>
            </a>
            @endforeach

        </div>
    </div>
</section>

@endsection