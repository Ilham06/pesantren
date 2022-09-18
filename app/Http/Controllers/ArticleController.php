<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->module = 'article';
        View::share(['module' => $this->module]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Article::all();
            return DataTables::of($query)
            ->addColumn('action', 'pages.admin.'.$this->module.'._action')
            ->addColumn('excerp', function ($data) {
                return $data->excerp();
            })
            ->editColumn('thumbnail', function ($data) {
                return '<img style="width: 100%;" src="storage/image/article/'. $data->thumbnail .'" alt="">';
            })
            ->rawColumns(['action', 'thumbnail', 'excerp'])
            ->addIndexColumn()
            ->make(true);
        }
       
       return view('pages.admin.'.$this->module . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.'.$this->module . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        DB::beginTransaction();
        
        $thumbnail = md5($request->thumbnail) . '.' . $request->thumbnail->extension();
        $request->thumbnail->storeAs('public/image/'.$this->module, $thumbnail);

        $post = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'thumbnail' => $thumbnail
        ]);

        DB::commit();

        return redirect()->route($this->module.'.index')->with('message', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('pages.admin.'.$this->module.'.show', [
            'model' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('pages.admin.'.$this->module.'.edit', [
            'model' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        DB::beginTransaction();

        $article->title = $request->title;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);
        
        if ($request->hasFile('thumbnail')) {
            
            unlink(public_path('storage/image/'.$this->module.'/'.$article->thumbnail));
            
            $thumbnail = md5($request->thumbnail) . '.' . $request->thumbnail->extension();
            $request->thumbnail->storeAs('public/image/'.$this->module, $thumbnail);
            $article->thumbnail = $thumbnail;
        }

        $article->save();

        DB::commit();

        return redirect()->route($this->module.'.index')->with('message', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        unlink(public_path('storage/image/'.$this->module.'/'.$article->thumbnail));
        $article->delete();
        return redirect()->route($this->module.'.index')->with('message', 'data berhasil dihapus');
    }
}
