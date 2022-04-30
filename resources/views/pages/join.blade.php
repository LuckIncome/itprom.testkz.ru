@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
        
@include('partials.breadcrumbs',['template' => 'notUnion','title'=> $page->title])

<section class="connection">
    <div class="container">
        <form id="reqJoin" action="{{ route('join') }}" method="POST">
            @csrf
            <p class="text">@lang('general.thankYouForYourInterest')</p>
            <div class="input">
                <label for="name">@lang('general.name')</label>
                <input type="text" name="name" id="name" placeholder="@lang('general.name')" required="required">
                <label for="email">@lang('general.email')</label>
                <input type="email" name="email" id="email" placeholder="@lang('general.email')" required="required">
                <label for="phone">@lang('general.phone')</label>
                <input type="text" name="phone" id="phone" placeholder="@lang('general.phone')">
                <label for="company">@lang('general.company')</label>
                <input type="text" name="company" id="company" placeholder="@lang('general.company')">
                <label for="message">@lang('general.message')</label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="@lang('general.message')"></textarea>   
            </div>
            {{--<div class="captcha">
                <label for="">@lang('general.securityCheck')</label>
                <img src="{{ asset('assets/images/captcha.jpg') }}" alt="captcha">
            </div>--}}
            <p class="link">@lang('general.ITPROMIsCommittedToProtecting') <a href="#">@lang('general.privacyPolicy')</a>.</p>
            <input type="hidden" name="page" value="">
            <input type="hidden" name="url" value="{{url()->current()}}">
            <button type="submit">@lang('general.send')</button>
        </form>
    </div>
</section>

@endsection