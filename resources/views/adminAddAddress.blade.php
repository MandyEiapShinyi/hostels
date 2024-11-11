<!-- resources/views/addresses/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Address</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<style>
    body {
        background-color: #f8f9fa;
    }

    .custom-card {
        max-width: 600px;
        margin: auto;
        margin-top: 50px;
        border-radius: 10px;
        background-color: #ffffff;
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
    }

    .btn-secondary {
        background-color: #d9534f;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #d9534f;
    }

    .footer {
        text-align: center;
        margin-top: 20px;
        color: #6c757d;
    }
</style>
<body>

    <div class="container">
        <div class="card shadow-sm custom-card">
            <div class="card-header">
                <h3 class="card-title">Add New Address</h3>
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

        <!-- Address form -->
        <form action="{{ route('address.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="address_name">Address Name</label>
                <input type="text" class="form-control" id="address_name" name="address_name" required>
            </div>

            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="mb-3">
                <label for="room_quantity">Room Quantity</label>
                <input type="number" class="form-control" id="room_quantity" name="room_quantity" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Add Address</button>
                <a href="/admin_show" class="btn btn-secondary">Back to Index</a>
            </div>
        </form>
    </div>
</div>
        <div class="footer">
            <p>Synergy College</p>
            <p>32 & 34, Jalan Perai Jaya 4, Bandar Perai Jaya, 13600 Perai, Pulau Pinang</p>
        </div>
    </div>
</body>
</html>
