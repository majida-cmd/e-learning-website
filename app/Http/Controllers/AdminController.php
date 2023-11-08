<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = DB::table('utilisateurs')
            ->join('admins', 'utilisateurs.id', '=', 'admins.id_utilisateur')
            ->select('utilisateurs.nom', 'utilisateurs.id', 'admins.id_utilisateur',
            'utilisateurs.prenom', 'utilisateurs.email')
            ->orderBy('utilisateurs.created_at', 'desc')
            ->get();

        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:utilisateurs', // Add unique validation for email
            'password' => 'required',
        ]);

        $existingUser = Utilisateur::where('email', $validatedData['email'])->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors(['email' => 'email deja exist.']);
        }

        $utilisateur = new Utilisateur();
        $utilisateur->nom = $validatedData['nom'];
        $utilisateur->prenom = $validatedData['prenom'];
        $utilisateur->email = $validatedData['email'];
        $utilisateur->password = Hash::make($validatedData['password']);
        $utilisateur->isadmin = 1;
        $utilisateur->save();

        $utilisateurId = $utilisateur->id;
        $admin = new Admin();
        $admin->id_utilisateur = $utilisateurId;
        $admin->save();

        return redirect()->route('admins.index')->with('success', 'admin est cree aves succes.');
    }

    public function edit(Utilisateur $utilisateur, $id)
    {
        $admin = Admin::where('id_utilisateur', $id)->firstOrFail();
        $utilisateur = $admin->utilisateur;
        return view('admins.edit', compact('admin', 'utilisateur'));
    }

    public function destroy($id)
    {
        Admin::where('id_utilisateur', $id)->delete();
        Utilisateur::where('id', $id)->delete();
        return redirect()->route('admins.index')->with('success', 'admin deleted successfully');
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email|unique:utilisateurs,email,'.$id,
        'password' => 'nullable|min:8',
    ]);

    $admin = Admin::where('id_utilisateur', $id)->firstOrFail();
    $utilisateur = $admin->utilisateur;
    $utilisateur->nom = $validatedData['nom'];
    $utilisateur->prenom = $validatedData['prenom'];
    $utilisateur->email = $validatedData['email'];

    if (!empty($validatedData['password'])) {
        $utilisateur->password = Hash::make($validatedData['password']);
    }

    $utilisateur->save();

    return redirect()->route('admins.index')->with('success', 'admin updated successfully');
}

}
