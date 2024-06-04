<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    

<div class="container">
  <div class="row">
    <div class="col s12">
<h1>Modifier un bien</h1>
<hr>
@if (@session('status'))
<div class="alert alert-succes">
    {{session('status')}}
    </div>/.alert.alert-succes
    @endif
<ul>
    @foreach ($errors->all() as $error)
    <li class="alert alert_danger">{{$error}}</li>
@endforeach
</ul>
    

<form action="/update-bien/{{ $bien->id }}" method="POST" class="form-group">
    @csrf
<input type="text" name="id" style="display: none;" value="{{$bien->id}}">
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

@if (!empty($bien->image))
    <img src="{{ $bien->image }}" alt="Image">
@endif

            <br>
    <button type="submit" class="btn btn-primary">Modifier un bien</button>
    <br>  </br>
    <a href="/biens" class="btn btn-danger">Retourner</a>
  </form>
 </div>

    
 
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  </body>
</html>