<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Laravel</title>
    <!-- Chargement de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            max-width: 600px;
        }
        .form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Hauteur de la vue pour centrer verticalement */
        }
        .form-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .gauche {
            height: 100vh; /* Hauteur de la vue pour correspondre au conteneur */
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
          <img src="{{asset('img/slide2.jpg')}}" class="gauche" alt="...">
        </div>
        <!-- Conteneur principal -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="container form-box">
                <div class="text-center mb-4">
                    <h1>Ajouter un bien</h1>
                </div>
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

                <!-- Formulaire d'ajout de bien -->
                <form action="/biens/traitement" method="POST" class="form-group">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <select class="form-control" id="categorie" name="categorie">
                            <option value="luxe">Luxe</option>
                            <option value="moyen">Moyen</option>                       
                            <option value="classique">Classique</option>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="image" class="form-label">Image (URL)</label>
                        <input type="text" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-control" id="statut" name="statut">
                            <option value="1">Occupé</option>
                            <option value="0">Pas Occupé</option>
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
                        <button type="submit" class="btn btn-primary me-2">Ajouter un bien</button>
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
