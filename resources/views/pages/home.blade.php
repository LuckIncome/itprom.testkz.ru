@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

<section class="banner">
    <img src="{{ Voyager::image($main->bg_image) }}" class="banner__background" alt="{{ $main->title }}">
    <div class="container">
        <div class="banner__info">
            <h1>{{ $main->title }}</h1>
            <p>{{ $main->excerpt }}</p>
            <a href="{{route('pages.get',$pages['join']->first()->slug)}}" class="link__arrow">{{$pages['join']->first()->title}} <i class="bi bi-arrow-right"></i></a>
            {{--<a href="{{route('pages.get',$pages['about']->first()->slug)}}" class="link__arrow">@lang('general.learnMoreAboutPlatform') <i class="bi bi-arrow-right"></i></a>--}}
            <a href="{{route('pages.get',$pages['about']->first()->slug)}}" class="link__arrow">{{$pages['about']->first()->title}} <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="banner__image">
            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_z3pdz6kv.json" background="transparent" speed="1" class="banner__image-main"  loop="" autoplay=""></lottie-player>
        </div>
    </div>
</section>

<section class="information">
    <div class="information__item">
        <div class="information__item-content">
            <div class="container">
                <div class="info">
                    <h2>{{ $main->first_title }}</h2>
                    <p>{{ $main->first_excerpt }}</p>
                    <a href="{{route('pages.get',$pages['about']->first()->slug)}}" class="link__arrow">@lang('general.more') <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="information__item-image">
            <img src="{{ Voyager::image($main->first_image) }}" alt="{{ $main->first_title }}">
        </div>
    </div>

    <div class="information__item">
        <div class="information__item-content">
            <div class="container">
                <div class="info">
                    <h2>{{ $main->second_title }}</h2>
                    <p>{{ $main->second_excerpt }}</p>
                    <a href="{{route('pages.get',$pages['platform']->first()->slug)}}" class="link__arrow">@lang('general.more') <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="information__item-image">
            <img src="{{ Voyager::image($main->second_image) }}" alt="{{ $main->second_title }}">
        </div>
    </div>
</section>

<section class="projects">
    <div class="container">
        <h2>@lang('general.ourProjects')</h2>
    </div>

    <slider inline-template>
        <div class="slider">

            <div class="slider__items" v-touch:swipe.right="arrowsLeft"
                v-touch:swipe.left="arrowsRight">
                <div class="slider__items-container" :style="`
                    width: ${carousel.container}%`">
                    <div class="slider__items-track" :style="`            
                            transition: ${carousel.speed}s;
                            transform: translateX(-${carousel.start}%)`" ref="carouselItems"
                    >
                        @foreach($projects as $p)
                            <div class="slider__items-item" :style="`min-width: ${carousel.shift}%`">
                                <a href="{{ route('project.show', ['project' => $p->slug]) }}" class="item">
                                    @if($p->image)
                                    <div class="image">
                                        <img src="{{ Voyager::image($p->image) }}" alt="{{ $p->title }}">
                                    </div>
                                    @else
                                    <h3>{{ $p->title }}</h3>
                                    @endif
                                    {!! \Illuminate\Support\Str::limit($p->content, 152,'...') !!}
                                    <div class="link__arrow">@lang('general.more') <i class="bi bi-arrow-right"></i></div>
                                </a>
                            </div>
                        @endforeach            
                    </div>
                </div>
            </div>

            <div class="slider__arrows container">
                <button :class="{'disabled': valueCarousel == 0}" @click="arrowsLeft">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button :class="{'disabled': valueCarousel == carousel.end}" @click="arrowsRight">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </slider>
</section>

<section class="news">
    <h2>@lang('general.companyNews')</h2>

    <div class="news__items">
        @foreach($news as $n)
        <a href="{{ route('news.show', ['news' => $n->slug]) }}" class="news__item">
            <div class="info">
                <p>{{date('d.m.Y H:m', strtotime($n->created_at))}}</p>
                <h3>
                    {{$n->title}}
                </h3>
            </div>
            <div class="image">
                <img src="{{ Voyager::image($n->image) }}" alt="{{$n->title}}">
            </div>
        </a>
        @endforeach        
    </div>
    <a href="{{ route('news') }}" class="link__arrow">@lang('general.allNews') <i class="bi bi-arrow-right"></i></a>
</section>

<section class="join">
    <div class="join__item">
        <div class="join__item-image">
            <img src="{{ Voyager::image($main->third_image) }}" alt="{{ $main->third_title }}">
        </div>
        <div class="join__item-content">
            <div class="container">
                <div class="info">
                    <h2>{{ $main->third_title }}</h2>
                    <p>{{ $main->third_excerpt }}</p>
                    {{--<a href="{{route('pages.get',$pages['members']->first()->slug)}}" class="link__arrow">@lang('general.advantagesMembershipUnion') <i
                            class="bi bi-arrow-right"></i></a>--}}
                    <a href="{{route('pages.get',$pages['join']->first()->slug)}}" class="link__arrow">@lang('general.applicationJoiningUnion') <i class="bi bi-arrow-right"></i></a>
                    <a href="{{route('pages.get',$pages['work']->first()->slug)}}" class="link__arrow">@lang('general.unionWorkPlans') <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
