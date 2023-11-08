<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Module;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RegisterController extends Controller
{
    public function showRegistrationForm(Module $module)
    {
        $module = Module::with(['tarifs' => function ($query) {
            $query->select('id', 'montant', 'id_module');
        }])->where('slug', $module->slug)->firstOrFail();

        return view('registration', compact('module'));
    }

    public function showRegistrationForm2(Module $module, Etudiant $etudiant, $encryptedId)
{
    $module = Module::with(['tarifs' => function ($query) {
        $query->select('id', 'montant', 'id_module');
    }])->where('slug', $module->slug)->firstOrFail();

    $hashids = new Hashids('arti_form', 15); // Adjust the salt and length as needed

    // Generate a new encrypted ID for the etudiant
    $encryptedId = $hashids->encode($etudiant->id_utilisateur);

    $utilisateur = $etudiant->utilisateur;

    return view('registration', compact('module', 'etudiant'));
}
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required',
            'genre' => 'required|in:Masculin,Feminin',
            'date_naissance' => 'required|date',
            'date_inscription' => 'required|date',
            'id_module' => 'required',
            'cin' => 'required',
            'id_tarif' => 'required',
            'telephone' => 'required',
            'whatsapp' => 'required',
            'photo' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $utilisateur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isadmin' => $request->isadmin
        ]);

        $file_name = "";

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $file_name);
        }

        Etudiant::create([
            'id_utilisateur' => $utilisateur->id,
            'cin' => $request->cin,
            'genre' => $request->genre,
            'date_naissance' => $request->date_naissance,
            'telephone' => $request->telephone,
            'whatsapp' => $request->whatsapp,
            'photo' => $file_name
        ]);
        Inscription::create([
            'id_etudiant' => $utilisateur->id,
            'date_inscription' => $request->date_inscription,
            'id_module' => $request->id_module,
            'id_tarif' => $request->id_tarif
        ]);
        try
        {
            $email = new \App\Mail\RegisterMail($utilisateur);
            \Illuminate\Support\Facades\Mail::to($utilisateur->email)->send($email);
        }
        catch (\Exception $e)
        {
            \Illuminate\Support\Facades\Log::error("Error sending email: " . $e->getMessage());
        } return redirect(route('login'))->with('success', 'User created successfully.'); }

        
}
