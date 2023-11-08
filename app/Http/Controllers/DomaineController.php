<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Tarif;
use App\Models\Module;
use App\Models\Domaine;
use App\Models\Etudiant;
use App\Models\TypeContenu;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domaines = Domaine::all();
        return view('domaine', compact('domaines'));
    }
    public function indexAdd()
    {
        $domaines = Domaine::all();
        return view('domaines.index', compact('domaines'));
    }
    public function indexC()
    {
        // $domaine->slug = Str::slug($domaine->nom);
        // $modules = $domaine->modules;
        $domaines = Domaine::all();
        return view('courses2', compact('domaines'));
    }
    // public function domainess(Utilisateur $utilisateur,Domaine $domaine, $id)
    // {
    //     if (Auth::check() && Auth::user()->isEtudiant()) {
    //         try {
    //             $hashids = new Hashids('arti_form', 15);
    //             $decryptedId = $hashids->decode($id);
    //             if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
    //                 abort(403, 'Unauthorized action.');
    //             }
    //             $domaine->slug = Str::slug($domaine->nom);
    //             $modules = $domaine->modules;
    //             $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
    //             return view('course', compact('utilisateur','domaine','modules','etudiant'));
    //         } catch (ModelNotFoundException $e) {
    //             abort(403, 'Unauthorized action.');
    //         }
    //     }
    //     abort(403, 'Unauthorized action.');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domaines = Domaine::all();
        return view('domaines.create', compact('domaines'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $domaine = new Domaine([
            'nom' => $request->get('nom'),
            'slug' => Str::slug($request->get('nom'))
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('module'), $filename);
            $domaine->photo = $filename;
        }
        $domaine->save();
        return redirect()->route('domaines.index')->with('success', 'domaine créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Domaine $domaine)
    {
        $domaine->slug = Str::slug($domaine->nom);
        $modules = $domaine->modules;
        return view('course', compact('domaine', 'modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domaine=Domaine::findOrFail($id);
        return view('domaines.edit', compact('domaine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $domaine = Domaine::findOrFail($id);
        $domaine->nom = $request->get('nom');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('module'), $filename);
            $domaine->photo = $filename;
        }

        $domaine->save();

        return redirect()->route('domaines.index')->with('success', 'Domaine updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Domaine::where('id', $id)->delete();
        return redirect()->route('domaines.index')->with('success', 'domaine deleted successfully');
    }
}
