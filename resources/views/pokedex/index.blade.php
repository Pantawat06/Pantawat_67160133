<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokedex Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Pokedex List</h2>
            <a class="btn btn-success" href="{{ route('pokedex.create') }}">Add New Pokemon</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>HP</th>
                    <th>Atk / Def</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pokedexs as $poke)
                <tr>
                    <td>{{ $poke->id }}</td>
                    <td>
                        @if($poke->image_url)
                            <img src="{{ asset('storage/' . $poke->image_url) }}" width="50" style="object-fit: cover;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $poke->name }}</td>
                    <td><span class="badge bg-info text-dark">{{ $poke->type }}</span></td>
                    <td>{{ $poke->hp }}</td>
                    <td>{{ $poke->attack }} / {{ $poke->defense }}</td>
                    <td>
                        <form action="{{ route('pokedex.destroy', $poke->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('pokedex.edit', $poke->id) }}">Edit</a>
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันที่จะลบข้อมูลนี้?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>