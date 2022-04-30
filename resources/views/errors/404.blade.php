@extends('errors.layout')
@section('page_title', __('general.pageNotFound'))
@section('seo_title',  __('general.pageNotFound'))
@section('meta_keywords', __('general.pageNotFound'))
@section('meta_description',  __('general.pageNotFound'))
@section('image',env('APP_URL').'/images/og.jpg')
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs',['template' => 'notUnion'])

<section class="error-404">
    <div class="container">
        <img src="{{ asset('assets/images/icons/404.svg') }}" alt="404">
        <p>@lang('general.notFoundTitle')</p>
        <a href="/">@lang('general.backToHome')</a>
    </div>
</section>

@endsection