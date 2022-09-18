<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityImage;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->module = 'activity';
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
            $query = Activity::all();
            return DataTables::of($query)
            ->addColumn('action', 'pages.admin.'.$this->module.'._action')
            ->rawColumns(['action'])
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
        return view('pages.admin.'.$this->module.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityRequest $request)
    {
        DB::beginTransaction();

        $post = Activity::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ]);

        foreach ($request->images as $image) {
            $data = md5($image) . '.' . $image->extension();
            $image->storeAs('public/image/'.$this->module, $data);

            ActivityImage::create([
                'activity_id' => $post->id,
                'url' => $data,
            ]);

        }

        DB::commit();

        return redirect()->route($this->module.'.index')->with('message', 'data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('pages.admin.'.$this->module.'.edit', [
            'model' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivityRequest  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        DB::beginTransaction();

        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->slug = Str::slug($request->name);
        $activity->save();

        if ($request->hasFile('images')) {
            $oldImages = ActivityImage::whereActivityId($activity->id)->get();
            foreach ($oldImages as $oldImage) {
                    unlink(public_path('storage/image/activity/'.$oldImage->url));
                    $oldImage->delete();
                }

            foreach ($request->images as $image) {
            $data = md5($image) . '.' . $image->extension();
            $image->storeAs('public/image/'.$this->module, $data);

            ActivityImage::create([
                'activity_id' => $activity->id,
                'url' => $data,
            ]);

            }
        }

        DB::commit();

        return redirect()->route($this->module.'.index')->with('message', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $images = ActivityImage::whereActivityId($activity->id)->get();
        foreach ($images as $image) {
                unlink(public_path('storage/image/activity/'.$image->url));
                $image->delete();
            }
        $activity->delete();
        return redirect()->route($this->module.'.index')->with('message', 'data berhasil dihapus');
    }
}
