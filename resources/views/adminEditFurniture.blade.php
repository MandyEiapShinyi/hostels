<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Furniture</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Montserrat', sans-serif;
            color: #333;
        }
        .custom-card {
            max-width: 750px;
            margin: auto;
            margin-top: 80px;
            background: linear-gradient(145deg, #5b6ec4, #110f47);
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            padding: 40px 50px;
        }
        .card-header {
            background: transparent;
            color: white;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 600;
            padding-bottom: 30px;
        }
        .form-control {
            border-radius: 12px;
            padding: 15px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 1px solid #dcdcdc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #7588f0;
            box-shadow: 0 0 10px rgba(117, 136, 240, 0.4);
        }
        .btn-submit {
            background-color: #ea232a;
            color: white;
            font-weight: 500;
            padding: 14px 28px;
            border-radius: 25px;
            border: none;
            font-size: 16px;
            width: 100%;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #ea232a;
            transform: translateY(-3px);
            color: white;
        }
        .btn-secondary {
            background-color: #7588f0;
            color: white;
            font-weight: 500;
            padding: 14px 28px;
            border-radius: 25px;
            font-size: 16px;
            width: 100%;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #ff4d4d;
            transform: translateY(-3px);
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border-radius: 12px;
            padding: 15px;
            font-size: 16px;
            margin-bottom: 25px;
        }
        .d-flex {
            gap: 15px;
        }
        img {
            border-radius: 5px;
            margin-top: 10px;
        }
        .form-label {
            color: white;
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
                        <label class="form-label">Current Image:</label><br>
                        <img src="{{ asset('storage/' . $furnitures->image) }}" alt="Furniture Image" width="150">
                    </div>
                    @endif

                    <!-- Submit and Back Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-submit">Update Furniture</button>
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('adminBack', 'furniture')}}';">Back To Index</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>