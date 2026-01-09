<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Pokemon</h2>
        <form action="{{ route('pokedex.update', $pokedex->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $pokedex->name }}" class="form-control" required>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Type</label>
                    <input type="text" name="type" value="{{ $pokedex->type }}" class="form-control" required>
                </div>
                <div class="col">
                    <label>Species</label>
                    <input type="text" name="species" value="{{ $pokedex->species }}" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Height</label>
                    <input type="number" name="height" value="{{ $pokedex->height }}" class="form-control">
                </div>
                <div class="col">
                    <label>Weight</label>
                    <input type="number" name="weight" value="{{ $pokedex->weight }}" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>HP</label>
                    <input type="number" step="0.01" name="hp" value="{{ $pokedex->hp }}" class="form-control">
                </div>
                <div class="col">
                    <label>Attack</label>
                    <input type="number" step="0.01" name="attack" value="{{ $pokedex->attack }}" class="form-control">
                </div>
                <div class="col">
                    <label>Defense</label>
                    <input type="number" step="0.01" name="defense" value="{{ $pokedex->defense }}" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label>Image URL</label>
                <input type="text" name="image_url" value="{{ $pokedex->image_url }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Pokemon</button>
            <a href="{{ route('pokedex.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>