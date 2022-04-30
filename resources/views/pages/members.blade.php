@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
    
@include('partials.breadcrumbs',['template' => 'notUnion', 'title' => $page->title, 'bread_title' => $page->title])

<section class="union-members">
    <div class="container">

        @include('partials.sidebar_union')

        <div class="content">
        	@foreach ($partners as $partner)
        		<div class="item">
                <div class="item__image">
                    	<img src="{{Voyager::image($partner->image)}}" alt="{{ $partner->title }}">
                </div>
                <div class="item__name">
                    {{ $partner->title }}
                </div>
	                <a href="{{ $partner->link }}" class="item__link" target="blank">
	                    {{ $partner->link_text }}
	                </a>
            	</div>
        	@endforeach                 
        </div>
    </div>
</section>

@endsection