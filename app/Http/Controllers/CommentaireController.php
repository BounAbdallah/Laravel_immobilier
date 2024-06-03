<?php

// App\Http\Controllers\CommentaireController.php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request, Bien $bien)
    {
        $request->validate([
            'auteur' => 'required',
            'contenu' => 'required'
        ]);

        $commentaire = new Commentaire();
        $commentaire->auteur = $request->input('auteur');
        $commentaire->contenu = $request->input('contenu');
        $commentaire->bien_id = $bien->id;
        $commentaire->save();

        return redirect()->route('biens.show', $bien->id)->with('success', 'Commentaire ajouté');
    }

    public function edit(Commentaire $commentaire)
    {
        return view('commentaires.edit', compact('commentaire'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'auteur' => 'required',
            'contenu' => 'required'
        ]);

        $commentaire->update($request->all());

        return redirect()->route('biens.show', $commentaire->bien_id)->with('success', 'Commentaire mis à jour');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect()->route('biens.show', $commentaire->bien_id)->with('success', 'Commentaire supprimé');
    }
}
