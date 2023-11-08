<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Tarif;
use App\Models\Module;
use App\Models\Domaine;
use App\Models\Etudiant;
use App\Models\TypeContenu;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// public function index()
// {
//     $domaines = Domaine::all();
//     $etudiant = null;

//     if (Auth::check() && Auth::user()->isEtudiant()) {
//         $etudiant = Auth::user();
//     }

//     return view('index', compact('domaines', 'etudiant'));
// }
    public function index2(Utilisateur $utilisateur, $id)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                    $domaines = Domaine::all();
                    $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                return view('index', compact('utilisateur','domaines','etudiant'));
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }
public function index(){
    $domaines = Domaine::all();
    return view('index', compact('domaines'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Domaine $domaine, $id)
    // {
    //     $domaine = Domaine::findOrFail($id);
    //     $modules = $domaine->modules;
    //     return view('course', compact('domaine', 'modules'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
