@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image', '')
@section('url',url()->current())
@section('page_class','page')
@section('content')
      
@include('partials.breadcrumbs',[
    'template' => 'notUnion',
    'title' => $page->title,
])

<section class="interior">
    <div class="container">

        @include('partials.sidebar_union')

        <div class="content" style="min-height: 400px;">
            <div class="editors">               
                @if($project->image)
                <img src="{{ Voyager::image($project->image) }}" style="margin-bottom: 30px;" alt="{{$project->title}}">
                @else
                   <h2>{{$project->title}}</h2>
                   <br>
                @endif
                {!!$project->content!!}
            </div>
        </div>

        <div class="content">
            <div class="interior__recommendations">
                <ul class="interior__recommendations-menu">
                    @foreach ($projects as $p)
                        <li><a href="{{ route('project.show', ['project' => $p->slug]) }}" class="active">{{$p->title}}</a></li>
                    @endforeach                   
                </ul>
            </div>
        </div>

    </div>
</section>
            
@endsection