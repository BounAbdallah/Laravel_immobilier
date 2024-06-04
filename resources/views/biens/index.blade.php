<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Immobilier</title>
    <!-- Inclusion de Bootstrap CSS pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Inclusion de Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* CSS personnalisé pour ajuster la taille des images dans les cartes */
        .card-img-top {
            object-fit: cover;
            height: 300px;
            width: 100%;
        }
        /* CSS pour centrer le contenu */
        .container {
            max-width: 1100px;
            margin-top: 30px;
        }
        /* CSS pour l'en-tête */
        .navbar-custom {
            background-color: #01bddf;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }
        .navbar-custom .nav-link:hover {
            color: #d3d3d3;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Immobilier</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-circle"></i> Connexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteneur principal centré -->
    <div class="container text-center">
        <!-- Titre de la page -->
        <h1 class="mb-4">La liste des biens</h1>
        <!-- Bouton pour ajouter un nouvel article -->
        <a class="btn btn-outline-secondary mb-4" href="/biens/ajouter">Ajouter</a>
        
        <!-- Grille Bootstrap pour afficher les articles -->
        <div class="row justify-content-center">
            <!-- Boucle pour parcourir et afficher chaque article -->
            @foreach($biens as $bien)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Affichage de l'image de l'article -->
                        <img src="{{ $bien->image }}" class="card-img-top" alt="{{ $bien->nom }}">
                        <div class="card-body">
                            <!-- Affichage du nom de l'article -->
                            <h5 class="card-title">{{ $bien->nom }}</h5>
                            <!-- Affichage de la catégorie du bien -->
                            <div class="card-text"><strong>Catégorie:</strong> {{ $bien->categorie }}</div>
                            <!-- Affichage de l'adresse du bien -->
                            <div class="card-text"><strong>Adresse:</strong> {{ $bien->adresse }}</div>
                            <!-- Affichage du statut du bien -->
                            <div class="card-text"><strong>Statut:</strong> {{ $bien->statut }}</div>
                            <!-- Affichage de la description avec une limite de 100 caractères -->
                            <p class="card-text">{{ Str::limit($bien->description, 100) }}</p>
                            <!-- Affichage de la date de création de l'article -->
                            <p class="card-text"><small class="text-muted">Date de création: {{ $bien->created_at }}</small></p>

                            <!-- Boutons d'actions (suppression et modification) -->
                            <a href="{{ url('/bien/delete/'.$bien->id) }}" class="btn btn-danger">Supprimer</a>
                            <a href="/update-bien/{{ $bien->id }}" class="btn btn-primary">Modifier</a>
                        </div>
                        <a class="btn btn-info btn-sm" href="{{ route('biens.show', $bien->id) }}">
                                <i class="fa-solid fa-list"></i> Voir
                            </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Inclusion de Bootstrap JS pour les fonctionnalités interactives -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
