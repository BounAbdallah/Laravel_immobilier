<?php



namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaireai;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireaireController extends Controller
{
    public function store(Request $request, Bien $bien)
    {
        $request->validate([
            'auteur' => 'required',
            'contenu' => 'required'
        ]);

        $Commentaire = new Commentaire();
        $Commentaire->name = $request->input('auteur');
        $Commentaire->content = $request->input('contenu');
        $Commentaire->bien_id = $bien->id;
        $Commentaire->save();

        return redirect()->route('biens.show', $bien->id)->with('success', 'Commentaireaire ajouté');
    }

    public function edit(Commentaire $Commentaire)
    {
        return view('Commentaires.edit', compact('Commentaire'));
    }

    public function update(Request $request, Commentaire $Commentaire)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $Commentaire->update($request->all());

        return redirect()->route('biens.show', $Commentaire->bien_id)->with('success', 'Commentaireaire mis à jour');
    }

    public function destroy(Commentaire $Commentaire)
    {
        $Commentaire->delete();

        return redirect()->route('biens.show', $Commentaire->bien_id)->with('success', 'Commentaireaire supprimé');
    }
}

