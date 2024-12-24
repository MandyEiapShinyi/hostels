<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Furniture</title>
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
            /* height: 550px; */
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
            background-color: #7588f0;
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
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-radius: 12px;
            padding: 15px;
            font-size: 16px;
            margin-bottom: 25px;
        }
        .d-flex {
            gap: 15px;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="card shadow-sm custom-card">
            <div class="card-header">
                <h3>Add Furniture</h3>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('furnitures.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label text-white">Furniture Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label text-white">Furniture Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-submit">Add Furniture</button>
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('adminBack','furniture')}}';">Back to Index</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>