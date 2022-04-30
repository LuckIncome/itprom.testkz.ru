<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use App\Models\Trend;
use App\Models\Contact;
use App\Models\Market;

use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrendController extends Controller
{
    public function index() 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $socials = Contact::where('type','social')
                    ->where('is_main',true)
                    ->where('status',true)
                    ->where('id', '!=', 5)
                    ->orderBy('sort_id')
                    ->get();

        $trends = Trend::with(['translations'])
                    ->where('sort_id', '!=', 1)
                    ->where('status',true)          
                    ->orderBy('sort_id', 'asc')
                    ->get()
                    ->translate($locale, $fallbackLocale); 

        $trend = Trend::with(['translations'])->firstOrFail()->translate($locale, $fallbackLocale); 

        $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
        $pages = $pages->translate($locale,$fallbackLocale);
        $pages = $pages->groupBy('type');

        $page = Page::with(['translations'])->where(['type' => 'trends'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);

        return view('pages.trends.index', compact('page', 'pages', 'socials', 'trends', 'trend'));
    }

    public function show($trend) 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $socials = Contact::where('type','social')
                    ->where('is_main',true)
                    ->where('status',true)
                    ->where('id', '!=', 5)
                    ->orderBy('sort_id')
                    ->get();

        $trends = Trend::with(['translations'])
                    ->where('slug', '!=', $trend) 
                    ->where('status',true)        
                    ->orderBy('sort_id', 'asc')
                    ->get()
                    ->translate($locale, $fallbackLocale);  

        $trend = Trend::with(['translations'])->where('slug', $trend)->firstOrFail()->translate($locale, $fallbackLocale); 

        $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
        $pages = $pages->translate($locale,$fallbackLocale);
        $pages = $pages->groupBy('type');

        $page = Page::with(['translations'])->where(['type' => 'trends'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.trends.show', compact('page', 'pages', 'socials', 'trends', 'trend'));
    }
}
