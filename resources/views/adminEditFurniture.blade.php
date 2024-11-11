<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Furniture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .custom-card {
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
            border-radius: 10px;
        }

        .card-header {
            background-color: #00204a;
            color: white;
            text-align: center;
        }

        .btn-submit {
            background-color: #00204a;
            color: white;
        }

        .btn-submit:hover {
            background-color: yellow;
            color: black;
        }

        .btn-secondary {
            background-color: #d9534f;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #c9302c;
        }

        .form-label {
            font-weight: bold;
        }

        .image-preview {
            text-align: center;
            margin-top: 10px;
        }

        img {
            border-radius: 5px;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
        <div class="card shadow-sm custom-card">
            <div class="card-header">
                <h3 class="card-title">Edit Furniture</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('furnitures.update', $furnitures->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Furniture Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Furniture Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $furnitures->name) }}" required>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Furniture Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <!-- Show current image if exists -->
                    @if($furnitures->image)
                    <div class="image-preview">
                        <label>Current Image:</label><br>
                        <img src="{{ asset('storage/' . $furnitures->image) }}" alt="Furniture Image" width="150">
                    </div>
                    @endif

                    <!-- Submit and Back Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-submit">Update Furniture</button>
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ url('/admin_show') }}';">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Synergy College</p>
        <p>32 & 34, Jalan Perai Jaya 4, Bandar Perai Jaya, 13600 Perai, Pulau Pinang</p>
    </div>
</body>

</html>
