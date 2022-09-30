<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\Registration;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Support\Facades\DB;

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

    public function form()
    {
        return view('pages.landing-page.form', [
            'data' => Detail::first()
        ]);
    }

    public function registration(RegistrationRequest $request)
    {
        DB::beginTransaction();

        $input = $request->all();
        Registration::create($input);

        DB::commit();

        return redirect()->route('form')->with('message', 'Registrasi berhasil, silahkan tunggu respon dari kami');
    }

    public function showActivity($slug)
    {
        return view('pages.landing-page.activity-detail', [
            'data' => Activity::whereSlug($slug)->first()
        ]);
    }

    public function showArticle($slug)
    {
        return view('pages.landing-page.article-detail', [
            'data' => Article::whereSlug($slug)->first()
        ]);
    }
}
