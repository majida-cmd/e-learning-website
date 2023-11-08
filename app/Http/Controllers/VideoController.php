<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Module;
use App\Models\Chapter;
use App\Models\Domaine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {
        $module = Module::all();
        return view('chapterInsc', compact('module'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        $module->slug = Str::slug($module->nom);
        $chapter = $module->chapitre;

        return view('playlist', compact('module', 'chapter'));
    }
    public function showd($moduleSlug, $chapitreSlug)
    {
        $module = Module::where('slug', $moduleSlug)->firstOrFail();
        $chapitre = $module->chapitre()->where('slug', $chapitreSlug)->firstOrFail();
        $videos = $chapitre->video;
        return view('watch_vid', compact('module', 'chapitre', 'videos'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
