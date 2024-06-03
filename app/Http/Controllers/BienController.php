<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Bien;


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
     // Méthode pour afficher le formulaire de mise à jour d'un post

     public function update($id)
     {
         // Récupérer l'post par son identifiant
         $bien = Bien::find($id);
 
         // Retourner la vue 'posts.update' avec l'post récupéré
         return view('biens.update', compact('bien'));
     }
 
     // Méthode pour traiter la soumission du formulaire de mise à jour d'un post
     public function updateTraitement(Request $request,$id)
     {
         // Récupérer l'post par l'identifiant dans la requête
         $bien = Bien::find($id);
 
         // Sauvegarder les modifications dans la base de données
         $bien->update($request->all());
 
         // Rediriger vers la liste des posts avec un message de succès
         return redirect('/biens')->with('status', 'Le bien a été modifié avec succès');
     }
}
