<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier le Commentaire</title>
    <!-- Inclusion de Bootstrap CSS pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <h2 class="card-header">Modifier le commentaire</h2>
            <div class="card-body">
                <form action="{{ route('commentaires.update', $commentaire->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="auteur"><strong>Nom:</strong></label>
                        <input type="text" name="auteur" value="{{ $commentaire->auteur }}" class="form-control @error('auteur') is-invalid @enderror" placeholder="Votre nom">
                        @error('auteur')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="contenu"><strong>Commentaire:</strong></label>
                        <textarea class="form-control @error('contenu') is-invalid @enderror" name="contenu" rows="3">{{ $commentaire->contenu }}</textarea>
                        @error('contenu')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Mettre à jour</button>
                    <a href="{{ route('biens.show', $commentaire->bien_id) }}" class="btn btn-secondary mt-3">Annuler</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Inclusion de Bootstrap JS pour les fonctionnalités interactives -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
