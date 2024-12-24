<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Address</title>
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
        .form-label {
            color: white;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm custom-card">
            <div class="card-header">
                <h2 class="card-title">Edit Address</h2>
            </div>
            
            <div class="card-body">

                <!-- Error Handling -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('addresses.update', $address->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Address Name -->
                    <div class="mb-3">
                        <label for="address_name" class="form-label">Address Name</label>
                        <input type="text" class="form-control" id="address_name" name="address_name" value="{{ old('address_name', $address->address_name) }}" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $address->address) }}" required>
                    </div>

                    <!-- Room Quantity -->
                    <div class="mb-3">
                        <label for="room_quantity" class="form-label">Room Quantity</label>
                        <input type="number" class="form-control" id="room_quantity" name="room_quantity" value="{{ old('room_quantity', $address->room_quantity) }}" required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-submit">Update Address</button>
                        <a href="{{ route('adminBack', 'data')}}" class="btn btn-secondary">Back To Index</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>