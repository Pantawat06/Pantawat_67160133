<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Pokemon</h2>
        
        <form action="{{ route('pokedex.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Ex: Miraidon" required>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Type</label>
                    <input type="text" name="type" class="form-control" placeholder="Ex: Electric/Dragon" required>
                </div>
                <div class="col">
                    <label>Species</label>
                    <input type="text" name="species" class="form-control" placeholder="Ex: Paradox Pokémon">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Height (Enter integer)</label>
                    <input type="number" name="height" class="form-control" placeholder="Ex: 11">
                </div>
                <div class="col">
                    <label>Weight (Enter integer)</label>
                    <input type="number" name="weight" class="form-control" placeholder="Ex: 529">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>HP</label>
                    <input type="number" step="0.01" name="hp" class="form-control" placeholder="100">
                </div>
                <div class="col">
                    <label>Attack</label>
                    <input type="number" step="0.01" name="attack" class="form-control" placeholder="85">
                </div>
                <div class="col">
                    <label>Defense</label>
                    <input type="number" step="0.01" name="defense" class="form-control" placeholder="100">
                </div>
            </div>

            <div class="mb-3">
                <label>Upload Image</label>
                <input type="file" name="image_url" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Save Pokemon</button>
            <a href="{{ route('pokedex.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>