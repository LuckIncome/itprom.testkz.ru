@extends('partials.layout')
@section('page_title',(strlen($one_news->title) > 1 ? $one_news->title : ''))
@section('seo_title', (strlen($one_news->seo_title) > 1 ? $one_news->seo_title : ''))
@section('meta_keywords',(strlen($one_news->meta_keywords) > 1 ? $one_news->meta_keywords : ''))
@section('meta_description', (strlen($one_news->meta_description) > 1 ? $one_news->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

<section class="news-block-item">
    <div class="container">
        <div class="news-block-item__navigation">
            <i class="bi bi-chevron-left"></i> <a href="/news">@lang('general.backToNews')</a> 
        </div>

        <h1>
            {{$one_news->title}}
        </h1>

        {{--<div class="news-block-item__network">
        	@foreach($socials as $soc)
        		<a href="{{ $soc->link }}"><img src="{{ Voyager::image($soc->icon) }}" alt="{{ $soc->value }}"></a>
        	@endforeach
        </div>--}}

        <div class="news-block-item__network">
            <div class="ya-share2" data-curtain data-shape="round" data-services="facebook,telegram,whatsapp"></div>
        </div>

        <div class="news-block-item__image">
            <img src="{{ Voyager::image($one_news->image) }}" alt="{{$one_news->title}}">
			@if($one_news->title_photo)
				{{ $one_news->title_photo }}
			@endif
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">

        <div class="content" style="border: none;">
        </div>
        <div class="content">
            <div class="editors">
                {!! $one_news->content !!}
            </div>
        </div>
        <div class="content" style="border: none; padding: 0;">
        </div>

    </div>
</section>

<section class="articles">
    <div class="container">
        <div class="articles__title">@lang('general.relatedArticles')</div>
        <div class="articles__items">
        	@foreach ($news as $new) 
			@if($one_news->id != $new->id)
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
                        {!! \Illuminate\Support\Str::limit(strip_tags($new->content), 180,'...') !!}
                        {{--$new->content--}}
                    </div>
                </div>
            </a>
			@endif
            @endforeach
        </div>
    </div>
</section>

@endsection