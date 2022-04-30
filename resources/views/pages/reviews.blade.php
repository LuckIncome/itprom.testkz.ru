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
    <img src="{{ Voyager::image($title->image) }}" class="banner__background banner__background-dark" alt="{{ $title->title }}">
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1>{{ $title->title }}</h1>
            <p>{{ $title->excerpt }}</p>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">
    	@include('partials.sidebar_market_l')
    	<div class="content">
    		<div class="link" style="display: flex; flex-direction: column; line-height: 40px;">
	    		@foreach($markets as $m)
	    			<a href="{{ route('market.show', ['market' => $m->slug]) }}">{{ $m->title }}</a>
	    		@endforeach
    		</div>
    	</div>
    	<div class="content"></div>
	</div>
</section>

@endsection