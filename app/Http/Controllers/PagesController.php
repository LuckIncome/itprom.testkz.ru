<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\About;
use App\Models\Rule;
use App\Models\Analytic;
use App\Models\Market;
use App\Models\News;
use App\Models\Project;
use App\Models\Main;
use App\Models\Policy;
use App\Models\Trend;
use App\Models\Member;
use App\Models\Work;
use App\Models\ImageText;
use App\Models\Platform;

use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function getPage($slug = 'home')
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');
        if (strpos(url()->current(), 'home') !== false) {            
            abort(404);
        } else {
            $page = Page::select('type', 'id', 'title', 'excerpt', 'body', 'image', 'slug', 'seo_title', 'meta_description', 'meta_keywords', 'status')
                ->where(['slug' => $slug, 'status' => Page::STATUS_ACTIVE])
                ->firstOrFail();
        }
        $page = $page->translate($locale, $fallbackLocale);

        $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
        $pages = $pages->translate($locale,$fallbackLocale);
        $pages = $pages->groupBy('type');

        $socials = Contact::where('type','social')
                    ->where('is_main',true)
                    ->where('status',true)
                    ->where('id', '!=', 5)
                    ->orderBy('sort_id')
                    ->get();

        switch ($page->type) {
            case 'home':
                $news = News::with(['translations'])
                    ->where('status',true)
                    ->orderBy('sort_id', 'desc')
                    ->take(5)
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $projects = Project::with(['translations'])
                    ->where('status', true)
                    ->orderBy('sort_id', 'asc')
                    ->get()
                    ->translate($locale, $fallbackLocale);

                $main = Main::with(['translations'])->firstOrFail()->translate($locale, $fallbackLocale);

                return view('pages.' . $page->type, compact('page', 'pages', 'news', 'projects', 'main'));
                break;
            case 'members':
                $partners = Partner::with(['translations'])
                    ->orderBy('id', 'asc')
                    ->get()
                    ->translate($locale,$fallbackLocale);

                return view('pages.' . $page->type, compact('page', 'pages', 'partners', 'socials'));
                break;
            case 'about':
                $about = About::with(['translations'])->firstOrFail()->translate($locale,$fallbackLocale);                         
                return view('pages.' . $page->type, compact('page', 'pages', 'about', 'socials'));
                break;
            case 'charter':
                $charter = Rule::with(['translations'])->firstOrFail()->translate($locale,$fallbackLocale);                      
                return view('pages.' . $page->type, compact('page', 'pages', 'charter'));
                break;
            case 'policy':
                $policy = Policy::with(['translations'])->firstOrFail()->translate($locale,$fallbackLocale);                                 
                return view('pages.' . $page->type, compact('page', 'pages', 'policy', 'socials'));
                break;        
            case 'partners':
                $title = ImageText::with(['translations'])
                    ->where('page_id', 15)
                    ->firstOrFail();
                    $title = $title->translate($locale, $fallbackLocale);

                $markets = Market::with(['translations'])
                    ->where('status',true)          
                    ->orderBy('sort_id', 'desc')
                    ->get()
                    ->translate($locale, $fallbackLocale); 

                $partners = Member::with(['translations'])->get()->translate($locale, $fallbackLocale); 
                return view('pages.' . $page->type, compact('page', 'pages', 'socials', 'markets', 'partners', 'title'));
                break;
            case 'work':
                $markets = Market::with(['translations'])
                    ->where('status',true)          
                    ->orderBy('sort_id', 'desc')
                    ->get()
                    ->translate($locale, $fallbackLocale); 

                $works = Work::with(['translations'])->get()->translate($locale, $fallbackLocale); 

                return view('pages.' . $page->type, compact('page', 'pages', 'socials', 'markets', 'works'));
                break;
            case 'reviews':
                $title = ImageText::with(['translations'])
                    ->where('page_id', 17)
                    ->firstOrFail();
                    $title = $title->translate($locale, $fallbackLocale);

                $markets = Market::with(['translations'])
                    ->where('status',true)          
                    ->orderBy('sort_id', 'desc')
                    ->get()
                    ->translate($locale, $fallbackLocale); 
                return view('pages.' . $page->type, compact('page', 'pages', 'socials', 'title', 'markets'));
                break;
            case 'platform':
                $platform = Platform::with(['translations'])->firstOrFail();
                $platform = $platform->translate($locale, $fallbackLocale);

                $news = News::with(['translations'])
                    ->where('status', true)
                    ->orderBy('sort_id', 'desc')
                    ->take(3)
                    ->get()
                    ->translate($locale, $fallbackLocale);

                return view('pages.' . $page->type, compact('page', 'pages', 'platform', 'news'));
                break;
            case 'analytics':
                $analytic = Analytic::with(['translations'])
                    ->firstOrFail()
                    ->translate($locale,$fallbackLocale); 

                $news = News::with(['translations'])
                    ->where('analytic', true)
                    ->where('status', true)
                    ->orderBy('sort_id', 'desc')
                    ->take(3)
                    ->get()
                    ->translate($locale, $fallbackLocale); 

                $markets = Market::with(['translations'])
                    ->where('status',true)          
                    ->orderBy('sort_id', 'desc')
                    ->get()
                    ->translate($locale, $fallbackLocale); 

                return view('pages.' . $page->type, compact('page', 'pages', 'analytic', 'news', 'markets', 'socials'));
                break;
            case 'simple':
                return view('pages.' . $page->type, compact('page'));
                break;
            default :
                return view('pages.' . $page->type, compact('page'));
                break;
        }
    }

    public function setLocale($locale)
    {
        if (in_array($locale, config()->get('voyager.multilingual.locales'))) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}
