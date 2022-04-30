@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs',['template' => 'UnionRule','title'=> $policy->title])

<section class="interior interior-charter">
    <div class="container">

        @include('partials.sidebar_union')

        <div class="content">
            <div class="editors">
                {!! $policy->content !!}
            </div>
        </div>
        <div class="content" style="border: none; padding: 0;">
        </div>

    </div>
</section>

@endsection