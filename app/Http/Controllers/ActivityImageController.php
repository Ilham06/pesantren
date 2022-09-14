<?php

namespace App\Http\Controllers;

use App\Models\ActivityImage;
use App\Http\Requests\StoreActivityImageRequest;
use App\Http\Requests\UpdateActivityImageRequest;

class ActivityImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActivityImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityImage  $activityImage
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityImage $activityImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityImage  $activityImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityImage $activityImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivityImageRequest  $request
     * @param  \App\Models\ActivityImage  $activityImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityImageRequest $request, ActivityImage $activityImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityImage  $activityImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityImage $activityImage)
    {
        //
    }
}
