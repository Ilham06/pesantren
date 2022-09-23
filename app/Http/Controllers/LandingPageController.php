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
        return view('pages.landing-page.form');
    }

    public function registration(RegistrationRequest $request)
    {
        DB::beginTransaction();

        $input = $request->all();
        Registration::create($input);

        DB::commit();

        return redirect()->route('form')->with('message', 'Registrasi berhasil, silahkan tunggu respon dari kami');
    }
}
