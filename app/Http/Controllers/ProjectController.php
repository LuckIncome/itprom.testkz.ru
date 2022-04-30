<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use App\Models\Project;
use App\Models\Contact;

class ProjectController extends Controller
{
    public function index() 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $project = Project::with(['translations'])->where('status', true)->firstOrFail();
        $project = $project->translate($locale, $fallbackLocale);

        $id = $project->id;
        $projects = Project::with(['translations'])
            ->where('status', true)
            ->where('id', '!=', $id)
            ->get()
            ->translate($locale, $fallbackLocale);

        $socials = Contact::where('type','social')
                    ->where('is_main',true)
                    ->where('status',true)
                    ->where('id', '!=', 5)
                    ->orderBy('sort_id')
                    ->get();

        $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
        $pages = $pages->translate($locale,$fallbackLocale);
        $pages = $pages->groupBy('type');

        $page = Page::with(['translations'])->where(['type' => 'projects'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.projects.index', compact('page', 'pages', 'project', 'projects', 'socials'));
    }

    public function show($project) 
    {
        $locale = session()->get('locale');
        $fallbackLocale = config('voyager.multilingual.default');

        $project = Project::with(['translations'])
            ->where('slug', $project)
            ->where('status', true)
            ->first()
            ->translate($locale, $fallbackLocale);
        $id = $project->id;

        $projects = Project::with(['translations'])
            ->where('status', true)
            ->where('id', '!=', $id)
            ->get()
            ->translate($locale, $fallbackLocale);

        $socials = Contact::where('type','social')
                    ->where('is_main',true)
                    ->where('status',true)
                    ->where('id', '!=', 5)
                    ->orderBy('sort_id')
                    ->get();

        $pages = Page::withTranslation($locale)->whereNotIn('type',['home'])->where('status',Page::STATUS_ACTIVE)->get();
        $pages = $pages->translate($locale,$fallbackLocale);
        $pages = $pages->groupBy('type');

        $page = Page::with(['translations'])->where(['type' => 'projects'])->firstOrFail();
        $page = $page->translate($locale, $fallbackLocale);
        return view('pages.projects.show', compact('page', 'pages', 'project', 'projects', 'socials'));
    }
}
