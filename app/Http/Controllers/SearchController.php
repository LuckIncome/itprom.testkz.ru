<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use App\Models\News;

use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public $paginate = 6;

    public function index(Request $request) 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        
        \DB::statement("SET SQL_MODE=''"); //this is the trick use it just before your query
        $request_search = $request->get('header_search'); 

        $data = News::with(['translations'])
            ->search($request_search, null, true)
            ->where('status',true)
            ->orderBy('sort_id', 'desc')
            ->paginate($this->paginate)
            ->translate($locale, $fallbackLocale); 

        $data_paginate = News::search($request_search, null, true)
            ->where('status',true)
            ->orderBy('sort_id', 'desc')
            ->paginate($this->paginate); 

        $page = Page::with(['translations'])->where(['type' => 'search'])->firstOrFail();
        $page = $page->translate($locale,$fallbackLocale);
        return view('pages.search', compact('page', 'data', 'data_paginate'));
    }
}
