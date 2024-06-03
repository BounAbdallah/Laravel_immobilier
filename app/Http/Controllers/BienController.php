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



    public function show(Bien $bien)
    {
        Log::info('Bien:', ['bien' => $bien->toArray()]);
        Log::info('Commentaires:', ['commentaires' => $bien->commentaires->toArray()]);
        return view('biens.show', compact('bien'));
     return view('biens.show', compact('bien'));
     }  
}
    
