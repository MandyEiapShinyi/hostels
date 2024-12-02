<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Furniture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    }

    .btn-secondary {
        background-color: #d9534f;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #d9534f;
    }
    
    .form-label {
        font-weight: bold;
    }

    .form-check-label {
        margin-left: 5px;
    }

    .form-check-input {
        margin-top: 0.2rem;
        vertical-align: middle;
    }

    textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .footer {
        text-align: center;
        margin-top: 20px;
        color: #6c757d;
    }
    </style>
</head>

<div class="container">
    <div class="card shadow-sm custom-card">
        <div class="card-header">
            <h3 class="card-title">Edit Room</h3>
        </div>

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

        <!-- Form for editing furniture -->
        <div class="card-body">
            <form action="{{ route('rooms.update', $rooms->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <!-- Furniture Name -->
                <div class="mb-3">
                    <label for="room_name" class="form-label">Room Name</label>
                    <input type="text" class="form-control" id="room_name" name="room_name" value="{{ $rooms->room_name }}" required>
                </div>

                <!-- Furniture -->
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label">Furniture</label><br>
                            @foreach($furnitures as $furniture)
                                <div class="form-check form-check-inline">
                                    @if(in_array($furniture->name,json_decode($rooms->furniture)))
                                        <input class="form-check-input" type="checkbox" id="furniture_{{ $furniture->id }}"  checked name="furniture[]" value="{{ $furniture->name }}">
                                        <label class="form-check-label" for="furniture_{{ $furniture->id }}">{{ $furniture->name }}</label>
                                    @else()
                                    @endif
                                </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="room_fee" class="form-label">Room Fee</label>
                    <input type="number" class="form-control" id="room_fee" name="room_fee" value="{{ $rooms->room_fee }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="person_quantity" class="form-label">Person Quantity</label>
                    <input type="number" class="form-control" id="person_quantity" name="person_quantity" value="{{ $rooms->person_quantity }}" required>
                </div>
    
                <div class="mb-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea class="form-control" id="details" name="details" rows="3" value="{{ $rooms->details }}" required>{{ $rooms->details }}</textarea>
                </div>

                <!-- Action buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-submit">Update Room</button>
                    <a href="/admin_show" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
    </div>
</body>

</html>
