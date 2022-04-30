<?php

namespace App\Http\Controllers;
use TCG\Voyager\Models\Page;
use App\Models\News;
use App\Models\ImageText;
use App\Models\Contact;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $paginate = 6;

    public function index() 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $title = ImageText::with(['translations'])
        ->where('page_id', 9)
        ->firstOrFail();
        $title = $title->translate($locale, $fallbackLocale);

        $news = News::with(['translations'])
        ->where('status',true)
        ->orderBy('sort_id', 'desc')
        ->paginate($this->paginate)
        ->translate($locale, $fallbackLocale);

        $news_paginate = News::where('status',true)->orderBy('sort_id', 'desc')->paginate($this->paginate);

        $page = Page::with(['translations'])->where(['type' => 'news'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.news.index', compact('page', 'news', 'news_paginate', 'title'));
    }

    public function show($news) 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $one_news = News::with(['translations'])
            ->where('slug', $news)
            ->where('status', true)
            ->orderBy('sort_id', 'desc')
            ->first()
            ->translate($locale, $fallbackLocale);

        $socials = Contact::where('type','social')
                    ->where('is_main',true)
                    ->where('status',true)
                    ->where('id', '!=', 5)
                    ->orderBy('sort_id')
                    ->get();

        $news = News::with(['translations'])
            ->where('status',true)
            ->orderBy('sort_id', 'desc')
            ->take(3)
            ->get()
            ->translate($locale, $fallbackLocale);

        $page = Page::with(['translations'])->where(['type' => 'news'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);    
        return view('pages.news.show', compact('page', 'one_news', 'socials', 'news'));
    }
}
