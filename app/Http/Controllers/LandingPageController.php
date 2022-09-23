<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Detail;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('pages.landing-page.home', [
            'data' => Detail::first(),
            'activities' => Activity::with('images')->orderBy('created_at', 'desc')->get(),
            'articles' => Article::orderBy('created_at', 'desc')->get()
        ]);
    }
}
