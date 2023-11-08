<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Domaine;
use App\Models\Module;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domaines = Domaine::all();
        $videos = Video::all();
        return view('chapter', compact('domaines', 'videos'));
    }


    public function getModule($id)
    {
        echo json_encode(DB::table('modules')->where('id_domaine', $id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domaines = Domaine::all();
        return view('chapters.create', compact('domaines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $chapitre = new Chapter();
        $chapitre->nom = $request->input('nom');
        $chapitre->description = $request->input('description');
        $chapitre->id_module = $request->input('module');



        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('chapitre'), $filename);
            $chapitre->photo = $filename;
        }
        $chapitre->save();

        $url_video = new Video([
            'id_chapitre' => $chapitre->id
        ]);

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $video->storeAs('public/videos', $filename);
            $publicPath = public_path();
            $videosPath = $publicPath . DIRECTORY_SEPARATOR . 'videos';
            $video->move($videosPath, $filename);
            $url_video->url_video = $filename;
        }
        $url_video->save();

        return redirect()->route('chapters.index')
            ->with('success', 'Chapitre créé avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    // public function show(Module $module, $id)
    // {
    //     $modules = Module::findOrFail($id);
    //     $chapitres = $modules->videos;
    //     return view('chapters.index', compact('modules', 'chapitres'));
    // }
    // public function show(Module $module, $id)
    // {
    //     $module = Module::findOrFail($id);
    //     $chapters = $module->chapters;
    //     return view('chapters', compact('module', 'chapters'));
    // }
    public function show(Module $module, $id)
    {
        $module = Module::findOrFail($id);
        $chapters = $module->chapitres()->get();
        return view('chapters.index', compact('module', 'chapters'));
    }
    // if ($module = Module::with('tarifs')->findOrFail($id)) {
    //     return view('courseInner', compact('module'));
    // } else if ($module = Module::with('chapitres')->findOrFail($id)) {

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapters)
    {
        //
    }
}
