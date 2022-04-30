@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
    
@include('partials.breadcrumbs',['template' => 'notUnion', 'bread_title' => $page->title, 'title' => $page->title])

<section class="union-members">
    <div class="container">

        @include('partials.sidebar_work')

        <div class="content">

            <div class="work-plan">
            	
            	@foreach ($works as $w)
                <div class="work-plan__item">
                    <div class="work-plan__info">
                        <div class="line"><span></span></div>
                        <h3>{{$w->title}}</h3>
                        @if($w->sort_id == 5)
                        	<div class="work-plan__wrapper"></div>
                        @endif
                        <p>{{$w->content}}</p>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</section>


@endsection