<div class="container">
    <h1>Ajouter un Bien</h1>

    <form action="{{ route('store_bien') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="categorie" name="categorie" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select class="form-select" id="statut" name="statut" required>
                <option value="1">Occupé</option>
                <option value="0">Non Occupé</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="url" class="form-control" id="image" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>