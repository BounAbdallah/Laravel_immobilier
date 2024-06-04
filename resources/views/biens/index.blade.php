<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Immobilier</title>
    <!-- Inclusion de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
.row {
    width: 100%;
    margin-bottom: 5px;
}
/* CSS pour l'en-tête */
.navbar-custom {
    background: linear-gradient(45deg, #01bddf, #005f9e);
    padding: 15px 10px;
}
.navbar-custom .navbar-brand,
.navbar-custom .nav-link {
    color: #ffffff;
    font-size: 18px;
    font-weight: bold;
    transition: color 0.3s ease;
}
.navbar-custom .nav-link:hover {
    color: #d3d3d3;
}
.navbar-custom .navbar-toggler {
    border: none;
}
.navbar-custom .navbar-toggler-icon {
    background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"%3E%3Cpath stroke="rgba%28255, 255, 255, 0.7%29" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"/%3E%3C/svg%3E');
}
/* CSS pour les images du carrousel */
.carousel-item img {
    object-fit: cover;
    width: 100%;
    height: 600px; /* Ajustez la hauteur selon vos besoins */
    margin-bottom: 20px;
}
.carousel-caption {
    background: rgba(41, 8, 8, 0.5); /* Fond semi-transparent noir */
    padding: 20px;
    border-radius: 10px;
    width: 70%;
    height: 30%;
}
.carousel-caption h5,
.carousel-caption p {
    color: #fff; /* Couleur blanche pour le texte */
}
/* Animation pour le titre */
@keyframes slideIn {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
.animated-title {
    animation: slideIn 1s ease-in-out;
}
.container2 {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    margin-top: 80px;
    gap: 10px;
}
/* Alignement du texte à gauche pour les cartes */
.card-body {
    text-align: left; /* Alignement du texte à gauche */
    font-family: 'Poppins', sans-serif; /* Utilisation de la police Poppins */
}
.card-title {
    font-family: 'Montserrat', sans-serif; /* Utilisation de la police Montserrat pour les titres */
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
    <div class="row text-center">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('img/slide1.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Résidence DJENISLA</h5>
                  <p>La résidence dispose d’une réception, d’un ascenseur, d’une salle de sport et d’une piscine avec un magnifique espace de détente (salon d’extérieur, transats et bar) offrant une vue mer à 180°.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/slide2.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Résidence Fatimal</h5>
                  <p>La résidence dispose d’une réception, d’un ascenseur, d’une salle de sport et d’une piscine avec un magnifique espace de détente (salon d’extérieur, transats et bar) offrant une vue mer à 180°.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/slide3.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Villa IYA</h5>
                  <p>La résidence dispose d’une réception, d’un ascenseur, d’une salle de sport et d’une piscine avec un magnifique espace de détente (salon d’extérieur, transats et bar) offrant une vue mer à 180°.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          
        
        <!-- Grille Bootstrap pour afficher les articles -->
    <div class="row justify-content-center">
        <div class="row text-center">
            <hr>
            <h2 class="animated-title">Nos Biens Immobiliers</h2>
        </div>
        
        <div class="container container2 d-flex justify-content space-around">
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
                             {{-- <a href="{{ url('/bien/delete/'.$bien->id) }}" class="btn btn-danger">Supprimer</a> --}}
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
    </div>

    <!-- Inclusion de Bootstrap JS pour les fonctionnalités interactives -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
