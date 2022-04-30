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
    @if($title->bg_video)
        @foreach (json_decode($title->bg_video) as $video)
            <video style="width:100%;height:100%;object-fit:cover;position:absolute;top:0;left:0;z-index:-2;" no-controls autoplay loop playsinline muted>
                <source src="{{Voyager::image($video->download_link)}}"  type='video/mp4'>
            </video>
        @endforeach
    @else
        <img src="{{ Voyager::image($title->bg_image) }}" class="banner__background banner__background-dark" alt="{{ $analytic->title }}">
    @endif
    <div class="container">
        <div class="banner__info banner__info-pages">
            <h1>{{ $title->title }}</h1>
            <p>{{ $title->excerpt }}</p>
        </div>
    </div>
</section>

<section class="interior">
    <div class="container">
        <div class="content"></div>
        <div class="content" style="min-height: 400px;">
        @foreach ($partners as $p)     
            <div class="editors">
                <img src="{{ Voyager::image($p->image) }}" style="margin-bottom: 30px;" alt="{{$p->title}}">
                {!!$p->content!!}
            </div>
        @endforeach
        </div>
        <div class="content"></div>
    </div>
</section>
       
@endsection
