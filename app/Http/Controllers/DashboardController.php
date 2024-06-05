<?php
namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $biens = Bien::all();
        $biensCount = Bien::count();
        $biensOccupes = Bien::where('statut', 1)->count();
        $biensNonOccupes = Bien::where('statut', 0)->count();

        return view('dashboard', [
            'biens' => $biens,
            'biensCount' => $biensCount,
            'biensOccupes' => $biensOccupes,
            'biensNonOccupes' => $biensNonOccupes,
            'user' => Auth::user()
        ]);
    }

    public function create()
    {
        return view('create_bien');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'description' => 'required',
            'statut' => 'required|boolean',
            'adresse' => 'required',
            'image' => 'required|url',
        ]);

        $bien = new Bien;
        $bien->nom = $request->input('nom');
        $bien->categorie = $request->input('categorie');
        $bien->statut = $request->input('statut');
        $bien->description = $request->input('description');
        $bien->adresse = $request->input('adresse');
        $bien->image = $request->input('image');
        $bien->save();

        return redirect('/dashboard')->with('status', 'Bien ajouté avec succès!');
    }

    public function edit($id)
    {
        $bien = Bien::findOrFail($id);
        return view('edit_bien', compact('bien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'description' => 'required',
            'statut' => 'required|boolean',
            'adresse' => 'required',
            'image' => 'required|url',
        ]);

        $bien = Bien::findOrFail($id);
        $bien->nom = $request->input('nom');
        $bien->categorie = $request->input('categorie');
        $bien->description = $request->input('description');
        $bien->adresse = $request->input('adresse');
        $bien->statut = $request->input('statut');
        $bien->image = $request->input('image');
        $bien->save();

        return redirect('/dashboard')->with('status', 'Bien modifié avec succès!');
    }

    public function delete($id)
    {
        $bien = Bien::findOrFail($id);
        $bien->delete();
        return redirect()->route('dashboard')->with('status', 'Bien supprimé avec succès!');
    }
}
