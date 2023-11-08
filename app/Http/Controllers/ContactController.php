<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Contact;
use App\Models\Etudiant;
use App\Mail\ContactMail;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactController extends Controller
{
    public function index()
    {
        return view('contactForm');
    }
    public function showContactForm(Utilisateur $utilisateur, $id)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                return view('contactafterInsc', compact('utilisateur', 'etudiant'));
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }

    public function storeCF(Request $request , $id)
    {
        if (Auth::check() && Auth::user()->isEtudiant()) {
            try {
                $hashids = new Hashids('arti_form', 15);
                $decryptedId = $hashids->decode($id);
                if (empty($decryptedId) || !is_numeric($decryptedId[0])) {
                    abort(403, 'Unauthorized action.');
                }
                $etudiant = Etudiant::where('id_utilisateur', $decryptedId[0])->firstOrFail();
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required|digits:10|numeric',
                    'subject' => 'required',
                    'message' => 'required'
                ]);
                Contact::create($request->all());
                Mail::to("ma.alaabouch23@gmail.com")->send(new ContactMail($request->all()));

                return redirect()->back()
                ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());
        Mail::to("ma.alaabouch23@gmail.com")->send(new ContactMail($request->all()));

        return redirect()->back()
            ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }

}

