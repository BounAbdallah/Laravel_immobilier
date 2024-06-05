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
        #detail-section{
            margin-left: 10px;
            display: flex;
            flex-direction: row;

        }
        .col-4{
            padding: 20px;
            font-size: 18px;
            gap: 50px;
        }
        .col-4 h3{
            padding: 20px;
            font-size: 25px;
            gap: 50px;
        }
        h1{
            margin-left: 20px;
        }
        .entete{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .entete .btn{
            width: 120px;
            height: 40px;
        }
        .d-flex{
            margin: 50px;
        }
        .col-4-card{
            margin-left: 5px;
        }
        .col-8-card, .form-group{
            gap: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="entete">
    <a href="/biens" class="btn btn-danger mt-3">Retourner</a>
    <h1 class="mb-4">Détails du bien  : {{ $bien->nom }}</h1>
    </div>


    <div class="row" id="detail-section">
        <div class="row">
            <div class="col-8">
            <img src="{{ $bien->image }}" class="img-fluid mt-6" alt="{{ $bien->nom }}">
            </div>
                <!-- Section des détails du bien immobilier -->
                <div class="col-4 details gap-4">
                    <h3>Nom : {{ $bien->nom }}</h3>
                    <h5>Categorie : {{ $bien->categorie }}</h5>
                    <h5>Localisation :{{ $bien->adresse }}</h5>
                    <h5>Description: {{ $bien->description }}</h5>
                    <p><small class="text-muted">Date de création: {{ $bien->created_at }}</small></p>
                </div>
               
    </div>
    </div>
 <hr>
        
        <!-- Section des commentaires -->
<div class="row d-flex mr-5">
        <h2>Commentaires</h2>
        <div class="card col-8 col-8-card">
            <h5 class="card-header">Laisser un commentaire:</h5>
            <div class="card-body ">
                <form action="{{ route('commentaires.store', $bien->id) }}" method="POST">
                @csrf
                <div class="form-group">
                <input type="text" name="auteur" class="form-control @error('auteur') is-invalid @enderror" placeholder="Votre nom">
                @error('auteur')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" placeholder="Votre commentaire"></textarea>
                @error('contenu')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
        <div class="card col-3 col-4-card">
             @if($bien->commentaires && $bien->commentaires->count() > 0)
                @foreach($bien->commentaires as $commentaire)
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
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
            @else
                <p>Aucun commentaire disponible.</p>
            @endif

    <!-- Inclusion de Bootstrap JS pour les fonctionnalités interactives -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
