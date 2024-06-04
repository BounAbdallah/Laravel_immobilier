<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail du Bien Immobilier</title>
    <!-- Inclusion de Bootstrap CSS pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            max-width: 900px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1 class="mb-4">Détails du Bien Immobilier</h1>
        {{-- <a class="btn btn-outline-secondary mb-4" href="/biens/ajouter">Ajouter</a> --}}
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Section des détails du bien immobilier -->
                <div class="details mb-4">
                    <!-- Affichage de l'image de la villa -->
        <img src="{{ $bien->image }}" class="img-fluid mt-6" alt="{{ $bien->nom }}">

                    <h5>{{ $bien->nom }}</h5>
                    <div>{{ $bien->categorie }}</div>
                    <div>{{ $bien->adresse }}</div>
                    <div>{{ $bien->statut }}</div>
                    <p>{{ $bien->description }}</p>
                    <p><small class="text-muted">Date de création: {{ $bien->created_at }}</small></p>
                </div>
                <hr>
            </div>
        </div>

        
        <!-- Section des commentaires -->
        <div class="comments mt-5">
            <h2>Commentaires</h2>
            <!-- Formualire de commentaire -->
            <div class="card my-4">
                <h5 class="card-header">Laisser un commentaire:</h5>
                <div class="card-body">
                    <form action="{{ route('commentaires.store', $bien->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="auteur" class="form-control @error('auteur') is-invalid @enderror" placeholder="Votre nom">
                            @error('auteur')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <textarea class="form-control @error('contenu') is-invalid @enderror" name="contenu" rows="3" placeholder="Votre commentaire..."></textarea>
                            @error('contenu')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Poster</button>
                    </form>
                </div>
            </div>

            <!-- Affichage des commentaires -->
            @if($bien->commentaires && $bien->commentaires->count() > 0)
                @foreach($bien->commentaires as $commentaire)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $commentaire->auteur }}</h5>
                            <p class="card-text">{{ $commentaire->contenu }}</p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('commentaires.edit', $commentaire->id) }}" class="btn text-info btn-sm mr-2">Modifier</a>
                                <form action="{{ route('commentaires.destroy', $commentaire->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Aucun commentaire disponible.</p>
            @endif
        </div>
    </div>

    <!-- Inclusion de Bootstrap JS pour les fonctionnalités interactives -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
