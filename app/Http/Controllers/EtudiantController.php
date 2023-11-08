<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Video;
use App\Models\Module;
use App\Models\Chapter;
use App\Models\Domaine;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = DB::table('utilisateurs')
            ->join('etudiants', 'utilisateurs.id', '=', 'etudiants.id_utilisateur')
            ->select('utilisateurs.nom', 'utilisateurs.id', 'etudiants.id_utilisateur', 'utilisateurs.prenom', 'utilisateurs.email', 'etudiants.genre', 'etudiants.adresse', 'etudiants.date_naissance', 'etudiants.telephone', 'etudiants.whatsapp', 'etudiants.photo')
            ->orderBy('utilisateurs.created_at', 'desc')->get();

        return view('etudiants.index', compact('etudiants'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'genre' => 'required|in:masculin,feminin',
            'adresse' => 'required',
            'date_naissance' => 'required|date',
            'telephone' => 'required',
            'whatsapp' => 'required',
            'photo' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();

        $request->photo->move(public_path('images'), $file_name);
        $utilisateur = new Utilisateur();
        $utilisateur->nom = $validatedData['nom'];
        $utilisateur->prenom = $validatedData['prenom'];
        $utilisateur->email = $validatedData['email'];
        $utilisateur->password = Hash::make($validatedData['password']);
        $utilisateur->save();
        $utilisateurId = $utilisateur->id;
        $etudiant = new Etudiant();
        $etudiant->id_utilisateur = $utilisateurId;
        $etudiant->genre = $validatedData['genre'];
        $etudiant->adresse = $validatedData['adresse'];
        $etudiant->date_naissance = $validatedData['date_naissance'];
        $etudiant->telephone = $validatedData['telephone'];
        $etudiant->whatsapp = $validatedData['whatsapp'];
        $etudiant->photo = $file_name;
        $etudiant->save();
        return redirect()->route('etudiants.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $utilisateur, $id)
    {
        $etudiant = Etudiant::where('id_utilisateur', $id)->firstOrFail(); // Retrieve the student by ID
        $utilisateur = $etudiant->utilisateur;

        return view('etudiants.show', compact('utilisateur', 'etudiant'));
    }

    public function register2(Utilisateur $utilisateur, Request $request, $id)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $existingRegistration = Inscription::where('id_etudiant', $utilisateur->id)
                    ->where('id_module', $request->id_module)
                    ->first();

                if ($existingRegistration) {
                    return redirect()->route('etudiant.coursesleftInner')->with('info', 'You are already registered for this course.');
                } else
                    $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                $request->validate([
                    'id_module' => 'required',
                    'id_tarif' => 'required',
                ]);
                Inscription::create([
                    'id_etudiant' => $etudiant->id_utilisateur,
                    'date_inscription' => now(),
                    'id_module' => $request->id_module,
                    'id_tarif' => $request->id_tarif,
                ]);
                $modules = $etudiant->inscription()->with('modules')->get()->pluck('modules');
                return view('etmodules', compact('utilisateur', 'etudiant', 'modules'));
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }

    public function registration2(Utilisateur $utilisateur, $id, Module $module)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $module = Module::with(['tarifs' => function ($query) {
                    $query->select('id', 'montant', 'id_module');
                }])->where('slug', $module->slug)->firstOrFail();

                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                return view('registration2', compact('utilisateur', 'module', 'etudiant'));
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }

    public function showProfile(Utilisateur $utilisateur, $id)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                return view('profile', compact('utilisateur', 'etudiant'));
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }


    public function coursesleft(Utilisateur $utilisateur, $id)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();

                if ((string) $decryptedId[0] === (string) $etudiant->id_utilisateur) {
                    $enrolledModules = $etudiant->inscription()->with('modules')->get()->pluck('modules');
                    $allModules = Module::all();
                    $modules = $allModules->diff($enrolledModules);

                    return view('courses2', compact('modules', 'utilisateur', 'etudiant'));
                }
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }


    public function coursesleftInner(Utilisateur $utilisateur, $id, $module)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $module = Module::where('slug', $module)->firstOrFail();
                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                if ((string) $decryptedId[0] === (string) $etudiant->id_utilisateur) {
                    $module->load('tarifs'); // Eager load the 'tarifs' relationship
                    $module->slug = Str::slug($module->nom);
                    return view('courseInner2', compact('module', 'utilisateur', 'etudiant'));
                }
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }


    public function showChap(Utilisateur $utilisateur, $id)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                if ((string) $decryptedId[0] === (string) $etudiant->id_utilisateur) {
                    $modules = $etudiant->inscription()->with('modules')->get()->pluck('modules');
                    return view('etmodules', compact('modules', 'utilisateur', 'etudiant'));
                }
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }
    public function showPlaylist(Utilisateur $utilisateur, $id, $module)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                if ((string) $decryptedId[0] === (string) $etudiant->id_utilisateur) {
                    $modules = $etudiant->inscription()->with('modules')->get()->pluck('modules');
                    $module = Module::where('slug', $module)->firstOrFail();
                    $chapters = $module->chapitre;
                    return view('etplaylist', compact('module', 'chapters', 'etudiant'));
                }
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }

    public function showVideo(Utilisateur $utilisateur, $id, $module, $chapitreSlug)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                if ((string) $decryptedId[0] === (string) $etudiant->id_utilisateur) {
                    $modules = $etudiant->inscription()->with('modules')->get()->pluck('modules');
                    $module = Module::where('slug', $module)->firstOrFail();
                    $chapter = $module->chapitre()->where('slug', $chapitreSlug)->firstOrFail();
                    $videos = $chapter->video;
                    return view('etvideo', compact('module', 'chapter', 'etudiant', 'videos'));
                }
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilisateur $utilisateur, $id)
    {
        $etudiant = Etudiant::where('id_utilisateur', $id)->firstOrFail(); // Retrieve the student by ID
        $utilisateur = $etudiant->utilisateur;
        return view('etudiants.edit', compact('etudiant', 'utilisateur'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::where('id', $id)->update(
            [
                'nom'  => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email
            ]
        );
        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();

        $request->photo->move(public_path('images'), $file_name);
        $etudiant = Etudiant::where('id_utilisateur', $id)->update(
            [

                'genre' => $request->genre,
                'adresse' => $request->adresse,
                'date_naissance' => $request->date_naissance,
                'telephone' => $request->telephone,
                'whatsapp' =>  $request->whatsapp,
                'photo' => $file_name
            ]
        );
        return redirect()->route('etudiants.index')->with('success', 'Student updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Etudiant::where('id_utilisateur', $id)->delete();
        Utilisateur::where('id', $id)->delete();
        return redirect()->route('etudiants.index')->with('success', 'Student deleted successfully');
    }
}
