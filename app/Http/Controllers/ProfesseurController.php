<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professeurs = DB::table('utilisateurs')
            ->join('professeurs', 'utilisateurs.id', '=', 'professeurs.id_utilisateur')
            ->select('utilisateurs.nom', 'utilisateurs.id', 'professeurs.id_utilisateur', 'utilisateurs.prenom', 'utilisateurs.email', 'professeurs.genre', 'professeurs.adresse', 'professeurs.date_naissance', 'professeurs.telephone', 'professeurs.whatsapp', 'professeurs.photo')
            ->orderBy('utilisateurs.created_at', 'desc')
            ->paginate(5);

        return view('professeurs.index', compact('professeurs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $professeur = new Professeur();
        $professeur->id_utilisateur = $utilisateurId;
        $professeur->genre = $validatedData['genre'];
        $professeur->adresse = $validatedData['adresse'];
        $professeur->date_naissance = $validatedData['date_naissance'];
        $professeur->telephone = $validatedData['telephone'];
        $professeur->whatsapp = $validatedData['whatsapp'];
        $professeur->photo =  $file_name;
        $professeur->save();
        //Utilisateur::create($request->all());
        return redirect()->route('professeurs.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $utilisateur, $id)
    {
        $professeur = Professeur::where('id_utilisateur', $id)->firstOrFail(); // Retrieve the student by ID
        $utilisateur = $professeur->utilisateur;

        return view('professeurs.show', compact('utilisateur', 'professeur'));
        //     $etudiant = $utilisateur->etudiant;
        //     return view('etudiants.show', compact('utilisateur', 'etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilisateur $utilisateur, $id)
    {
        $professeur = Professeur::where('id_utilisateur', $id)->firstOrFail(); // Retrieve the student by ID
        $utilisateur = $professeur->utilisateur;
        return view('professeurs.edit', compact('professeur', 'utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professeur  $professeur
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
        $file_name=time().'.'.request()->photo->getClientOriginalExtension();
        $request->photo->move(public_path('images'),$file_name);
        $profeseeur = Professeur::where('id_utilisateur', $id)->update(
            [

                'genre' => $request->genre,
                'adresse' => $request->adresse,
                'date_naissance' => $request->date_naissance,
                'telephone' => $request->telephone,
                'whatsapp' =>  $request->whatsapp,
                'photo'=>$file_name
            ]
        );
        return redirect()->route('professeurs.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $profeseeur=Professeur::where('id_utilisateur',$id)->delete();
       $utilisateur=Utilisateur::where('id',$id)->delete();
       return redirect()->route('professeurs.index')->with('success','Professeur has deleted successfully');
    }
}
