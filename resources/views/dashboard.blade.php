<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Immobilier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .card-img-top {
            object-fit: cover;
            height: 300px;
            width: 100%;
        }
        .container {
            max-width: 1100px;
            margin-top: 30px;
        }
        .navbar-custom {
    padding: 12px;
      background: linear-gradient(45deg, #01bddf, #005f9e);
      padding: 15px 10px;
  }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }
        .navbar-custom .nav-link:hover {
            color: #d3d3d3;
        }
        .col-8{
            margin: 40px;
            margin-top: 100px;
            display: flex;
            justify-content: space-evenly;
            flex-direction: row;
            border-radius: 20px;
            padding: 20px;
            background-color:#d3d3d3;
        }
        .row{
            margin-top: 0px;
            display: flex;
            flex-direction: row;
        }
        .row-d {
            border-radius: 20px;
            background-color: #01bddf;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            margin-top: 45px;
            width:200px;
            height: auto;
        }
        .col-4{
            margin-top: 50px;
            margin-bottom: 50px;
            align-items: center;
            align-content: center;
        }
        .bouton{
            width: 150px;
            height: 50px;
        }
        .card{
            align-items: center;
            vertical-align: middle;
        }
        table img{
            width: 200px;
            height: 150px;
        }
        table{
            margin:80px;
            padding: 20px;
        }
        thead, tbody{
            margin: 10px;
        }
        .coontenaire {
            margin: 50px;
            padding: 20px;
        }
        .card-body span{
            
            text-align: center;
            font-size: 45px;
            color: burlywood;
            background-color: blanchedalmond;
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }
        .card-body p{
            font-size: 30px;
            color: black;
        }
        .card-body{
            align-items: center;
            display: flex;
            flex-direction: column;
            align-self: center;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body>
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
                            <i class="bi bi-person-circle"></i> Bonjour, {{ $user->name }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row d-flex">
        <div class="row d-flex row-d ">
            <div class="col-4">
                <a href="/create"><button type="button" class="btn btn-outline-secondary bouton">Ajouter un bien</button></a> 
            </div>
            <!-- <div class="col-4 mt-4">
                <button type="button" class="btn btn-outline-secondary bouton">Liste de biens</button>
            </div> -->
        </div>
        <div class="col-8">
            <div class="card" style="width: 18rem; height:300px;">
                <div class="card-body">
                <p>Nombre total de biens :</p><span> {{ $biensCount }}</span>
                
                
                </div>
            </div>
            <div class="card" style="width: 18rem; height:300px;">
                <div class="card-body">
                <p>Biens non occupés :</p><span>  {{ $biensNonOccupes }}</span>
                </div>
            </div>
            <div class="card" style="width: 18rem; height:300px;">
                <div class="card-body">
                <p> Biens  occupés :</p><span> {{ $biensOccupes }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="coontenaire">
        <div class="card mb-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($biens as $bien)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <img src="{{ $bien->image }}" class="img-fluid rounded" alt="{{ $bien->nom }}">
                        </td>
                        <td>{{ $bien->nom }}</td>
                        <td>{{ $bien->categorie }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <!-- <a href="#" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-list"></i> Voir
                                </a> -->
                                <a href="{{ route('edit_bien', ['id' => $bien->id]) }}" class="btn btn-primary btn-sm">
    <i class="fa-solid fa-pen-to-square"></i> Modifier</a>

<form action="{{ route('delete_bien', ['id' => $bien->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this bien?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i> Supprimer
                    </button>
                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
