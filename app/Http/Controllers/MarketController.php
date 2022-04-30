<?php

namespace App\Http\Controllers;
use TCG\Voyager\Models\Page;
use App\Models\Market;
use App\Models\News;
use App\Models\Contact;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index() 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $news = Market::with(['translations'])
            ->with(['news'])
            ->first()
            ->news()
            ->where('status',true)
            ->orderBy('sort_id', 'desc')
            ->take(3)
            ->get()
            ->translate($locale, $fallbackLocale);

        $socials = Contact::where('type','social')
                    ->where('is_main',true)
                    ->where('status',true)
                    ->where('id', '!=', 5)
                    ->orderBy('sort_id')
                    ->get();

        $market = Market::with(['translations'])->where('status', true)->firstOrFail();
        $market = $market->translate($locale, $fallbackLocale);
        
        $id = $market->id;
        $markets = Market::with(['translations'])
            ->where('id', '!=', $id)
            ->where('status',true)          
            ->orderBy('sort_id', 'desc')
            ->get()
            ->translate($locale, $fallbackLocale);
        
        $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
        $pages = $pages->translate($locale,$fallbackLocale);
        $pages = $pages->groupBy('type');

        $page = Page::with(['translations'])->where(['type' => 'market'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.market.index', compact('page', 'pages', 'market', 'markets', 'news', 'socials'));
    }

    public function show($market) 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        
        $news = Market::with(['translations'])
            ->with(['news'])
            ->first()
            ->news()
            ->where('status',true)
            ->orderBy('sort_id', 'desc')
            ->take(3)
            ->get()
            ->translate($locale, $fallbackLocale);

        $socials = Contact::where('type','social')
                    ->where('is_main',true)
                    ->where('status',true)
                    ->where('id', '!=', 5)
                    ->orderBy('sort_id')
                    ->get();

        $market = Market::with(['translations'])->where('status', true)->where('slug', $market)->firstOrFail();
        $market = $market->translate($locale, $fallbackLocale);

        $id = $market->id;
        $markets = Market::with(['translations'])
            ->where('id', '!=', $id)
            ->where('status',true)          
            ->orderBy('sort_id', 'asc')
            ->get()
            ->translate($locale, $fallbackLocale);

        $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
        $pages = $pages->translate($locale,$fallbackLocale);
        $pages = $pages->groupBy('type');

        $page = Page::with(['translations'])->where(['type' => 'market'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.market.show', compact('page', 'pages', 'market', 'markets', 'news', 'socials'));
    }
}
