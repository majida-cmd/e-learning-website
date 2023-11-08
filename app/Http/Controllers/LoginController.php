<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }


    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $isAdmin = Utilisateur::where('id', Auth::id())->value('isadmin');

            if ($isAdmin == 1) {
                $admin = Admin::where('id_utilisateur', Auth::id())->first();

                if ($admin) {
                    return redirect()->route('etudiants.index');
                }
            } else if ($isAdmin == NULL) {
                $etudiant = Etudiant::where('id_utilisateur', Auth::id())->first();

                if ($etudiant) {
                    $hashids = new Hashids('arti_form', 15);
                    $encryptedId = $hashids->encode($etudiant->id_utilisateur);

                    return redirect()->route('etudiant.profile', ['id' => $encryptedId]);
                }
            }
        }

        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ])->redirectTo(route('login'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
