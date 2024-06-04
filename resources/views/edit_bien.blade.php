<div class="container">
    <h1>Modifier le Bien</h1>

    <form action="{{ route('update_bien', ['id' => $bien->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $bien->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="categorie" name="categorie" value="{{ $bien->categorie }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $bien->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $bien->adresse }}" required>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select class="form-select" id="statut" name="statut" required>
                <option value="1" {{ $bien->statut == 1 ? 'selected' : '' }}>Occupé</option>
                <option value="0" {{ $bien->statut == 0 ? 'selected' : '' }}>Non Occupé</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="url" class="form-control" id="image" name="image" value="{{ $bien->image }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>