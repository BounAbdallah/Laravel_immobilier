<?php

namespace App\Http\Controllers;


use App\Models\Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class BienController extends Controller
{
    public function index()
    {
        $biens = Bien::all();
        return view('biens.index', ['biens' => $biens]);
    }
    public function ajouter()
    {
        return view('biens.ajouter');
    }
    public function traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'categorie' => 'required',
            'image' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'statut' => 'required',


        ]);

        Bien::create($request->all());
        return redirect('/biens')->with('status', 'Le bien a été ajouté avec succès');
    }
    public function dashboard()
    {
        return view('dashboard');
    }



    public function show(Bien $bien)
    {
        Log::info('Bien:', ['bien' => $bien->toArray()]);
        Log::info('Commentaires:', ['commentaires' => $bien->commentaires->toArray()]);
        return view('biens.show', compact('bien'));
     return view('biens.show', compact('bien'));
     }  
     // Méthode pour afficher le formulaire de mise à jour d'un bien

     public function update($id)
     {
         // Récupérer l'bien par son identifiant
         $bien = Bien::find($id);
 
         // Retourner la vue 'biens.update' avec l'bien récupéré
         return view('biens.update', compact('bien'));
     }
 
     // Méthode pour traiter la soumission du formulaire de mise à jour d'un bien
     public function updateTraitement(Request $request,$id)
     {
         // Récupérer l'bien par l'identifiant dans la requête
         $bien = Bien::find($id);
 
         // Sauvegarder les modifications dans la base de données
         $bien->update($request->all());
 
         // Rediriger vers la liste des biens avec un message de succès
         return redirect('/biens')->with('status', 'Le bien a été modifié avec succès');
     }
     public function delete($id)
    {
        $bien = Bien::find($id);
        $bien->delete();
        return redirect('/biens')->with('status', 'Bien supprimé avec succès!');


    }
}
    
