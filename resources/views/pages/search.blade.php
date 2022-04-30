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
    'template' => 'notUnion',
    'title' => $page->title,
])

<section class="search-block">
    <div class="container">
    	@forelse($data as $d)
    	<a href="{{ route('news.show', ['news' => $d->slug]) }}" class="article">
            <div class="article__image">
                <img src="{{ Voyager::image($d->image) }}" alt="{{$d->title}}">
            </div>
            <div class="article__info">
                <div class="article__title">
                   {{$d->title}}
                </div>
            </div>
        </a>
        @empty
        <h2>@lang('general.nothingWasFound')</h2>
    	@endforelse  	
	</div>
</section>

<section class="pagination">
    {{$data_paginate->links('partials.paginate')}}
</section>


@endsection