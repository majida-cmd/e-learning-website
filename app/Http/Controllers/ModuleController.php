<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Tarif;
use App\Models\Module;
use App\Models\Chapter;
use App\Models\Domaine;
use App\Models\Etudiant;
use App\Models\TypeContenu;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }
    public function modules(Utilisateur $utilisateur, $id)
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
                $modules = Module::all();
                return view('module', compact('utilisateur','modules','etudiant'));
            } catch (ModelNotFoundException $e) {
                abort(403, 'Unauthorized action.');
            }
        }
        abort(403, 'Unauthorized action.');
    }

    public function indexm()
    {
        $modules = Module::all();
        return view('module', compact('modules'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domaines = Domaine::all();
        $typeContenu = TypeContenu::all();
        return view('modules.create', compact('domaines', 'typeContenu'));
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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'montant' => 'required|numeric', // Corrected 'numerique' to 'numeric'
            'description' => 'required'
        ]);

        $module = new Module([
            'nom' => $request->get('nom'),
            'id_domaine' => $request->get('domaine'),
            'description' => $request->get('description'),
            'id_type_contenu' => $request->get('type_contenu'),
            'slug' => Str::slug($request->get('nom')) // Generate slug from 'nom' field
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('module'), $filename);
            $module->photo = $filename;
        }
        $module->save();

        $tarif = new Tarif([
            'montant' => $request->get('montant'),
            'id_module' => $module->id
        ]);

        $tarif->save();

        return redirect()->route('modules.index')->with('success', 'Module créé avec succès.');
    }

    // $tarif = new Tarif([
    //     'montant' => $request->montant,
    // ]);

    // $tarif->save();


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Domaine $domaine, Module $module)
    {
        $module->load('tarifs'); // Eager load the 'tarifs' relationship
        $module->slug = Str::slug($module->nom);
        return view('courseInner', compact('module'));
    }



    // public function showr(Module $module, $id)
    // {
    //     $module = Module::with(['tarifs' => function ($query) {
    //         $query->select('id', 'montant', 'id_module');
    //     }])->findOrFail($id);

    //     return view('registration', compact('module'));
    // }
    //     $module = Module::with('tarifs')->findOrFail($id);
    //     return view('registration', compact('module'));
    // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);
        $tarif = $module->tarif; // Get the associated Tarif, if it exists
        return view('modules.edit', compact('module', 'tarif'));
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
        $module = Module::where('id', $id)->update(
            [
                'nom'  => $request->nom,
                'description' => $request->description
            ]
        );
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('module'), $filename);
            $module->photo = $filename;
        }
        $tarif = Tarif::where('id_module', $id)->update(
            [

                'montant' => $request->get('montant'),
            ]
        );
        return redirect()->route('modules.index')->with('success', 'Student updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Module::where('id', $id)->delete();
        return redirect()->route('modules.index')->with('success', 'domaine deleted successfully');
    }
}
