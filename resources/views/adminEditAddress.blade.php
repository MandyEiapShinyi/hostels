<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Address</title>
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
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
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
            background-color: #c9302c;
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
                        <a href="/admin_show" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>