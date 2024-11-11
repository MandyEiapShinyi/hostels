<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Furniture</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
        }

        .custom-card {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow */
        }

        .card-header {
            text-align: center;
            background-color: #00204a;
            color: white;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }

        .btn-primary {
            background-color: #00204a;
            color: white;
            width: 100%;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: yellow;
            color: black;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .alert {
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }

        .btn-submit {
        background-color: #00204a;
        color: white;
    }

    .btn-submit:hover {
        background-color: yellow;
    }

    .btn-secondary {
        background-color: #d9534f;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #d9534f;
    }
    </style>
</head>
<body>

    <div class="custom-card">
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
                    <label for="name">Furniture Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Furniture Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-submit">Add Furniture</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ url('/admin_show') }}';">Back to Index</button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>Synergy College</p>
        <p>32 & 34, Jalan Perai Jaya 4, Bandar Perai Jaya, 13600 Perai, Pulau Pinang</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
