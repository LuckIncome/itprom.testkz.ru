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
    @if($analytic->bg_video)
        @foreach (json_decode($analytic->bg_video) as $video)
            <video style="width:100%;height:100%;object-fit:cover;position:absolute;top:0;left:0;z-index:-2;" no-controls autoplay loop playsinline muted>
                <source src="{{Voyager::image($video->download_link)}}"  type='video/mp4'>
            </video>
        @endforeach
    @else
        <img src="{{ Voyager::image($analytic->bg_image) }}" class="banner__background banner__background-dark" alt="{{ $analytic->title }}">
    @endif
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1>{{ $analytic->title }}</h1>
            <p>{{ $analytic->excerpt }}</p>
        </div>
    </div>
</section>

@if($analytic->first_content)
<section class="interior">
    <div class="container">

        @include('partials.sidebar_market_l')

        <div class="content">
            <div class="editors">
                {!! $analytic->first_content !!}
            </div>
        </div>

        @include('partials.sidebar_market_r')

    </div>
</section>
@endif

@if($analytic->second_content)
<section @if($analytic->first_image) class="interior-block" @else class="platform-dark" @endif>
    <div class="container">
        <div class="editors">
            {!! $analytic->second_content !!}
        </div>
        @if($analytic->first_image)
            <div class="image">
                <img src="{{ Voyager::image($analytic->first_image) }}" alt="{{ $analytic->first_alt_image }}">
            </div>
        @endif
    </div>
</section>
@endif

@if($analytic->third_content)
<section class="interior">
    <div class="container">

        
        <div class="content" style="border: none;">
            @if($analytic->second_image)
            <div class="interior__image">
                <img src="{{ Voyager::image($analytic->second_image) }}" alt="{{ $analytic->second_alt_image }}">
            </div>
            @endif
        </div>
        
        <div class="content">
            <div class="editors">
                {!! $analytic->third_content !!}
            </div>
        </div>
        <div class="content" style="border: none; padding: 0;">
        </div>

    </div>
</section>
@endif

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
                        {{--$new->content--}}
                    </div>
                </div>
            </a>
            @endforeach         
        </div>
    </div>
</section>

@endsection