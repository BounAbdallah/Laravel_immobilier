<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un bien</title>
    <!-- Chargement de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Styles CSS personnalisés */
        .container {
            max-width: 600px;
        }
        .form-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .mb-3 {
            margin-bottom: 1.5rem;
        }
        .gauche {
            height: 100vh;
            width: 100%;
            object-fit: cover;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="row g-0 bg-body-secondary">
        <div class="col-md-6 mb-md-0">
          <img src="{{asset('img/slide4.jpg')}}" class="gauche" alt="...">
        </div>
        <!-- Conteneur principal -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="container form-box">
                <h1 class="text-center">Modifier un bien</h1>
                <hr>
                <!-- Affichage des messages de statut -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Affichage des erreurs de validation -->
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>

                <!-- Formulaire de modification de bien -->
                <form action="/update-bien/{{ $bien->id }}" method="POST" class="form-group">
                    @csrf
                    <input type="text" name="id" style="display: none;" value="{{$bien->id}}">
                    
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{$bien->nom}}">
                    </div>
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <select class="form-control" id="categorie" name="categorie">
                            <option value="luxe" {{$bien->categorie == 'luxe' ? 'selected' : ''}}>Luxe</option>
                            <option value="moyen" {{$bien->categorie == 'moyen' ? 'selected' : ''}}>Moyen</option>
                            <option value="classique" {{$bien->categorie == 'classique' ? 'selected' : ''}}>Classique</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image (URL)</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{$bien->image}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$bien->description}}">
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{$bien->adresse}}">
                    </div>
                    <div class="mb-3">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-control" id="statut" name="statut">
                            <option value="1" {{$bien->statut == '1' ? 'selected' : ''}}>Occupé</option>
                            <option value="0" {{$bien->statut == '0' ? 'selected' : ''}}>Pas Occupé</option>
                        </select>
                    </div>

                    <!-- Affichage de l'image si elle est présente -->
                    @if (!empty($bien->image))
                        <div class="mb-3">
                            <img src="{{ $bien->image }}" alt="Image" class="img-fluid">
                        </div>
                    @endif

                    <!-- Boutons de soumission et de retour -->
                    <div class="d-flex justify-content-between mt-5">
                        <button type="submit" class="btn btn-primary me-2">Modifier un bien</button>
                        <a href="/biens" class="btn btn-danger mt-3">Retourner</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
    <!-- Chargement de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
