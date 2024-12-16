<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Furniture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            height: 750px;
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

<div class="container mt-5">
    <div class="card shadow-sm custom-card">
        <div class="card-header">
            <h3 class="card-title">Edit Room</h3>
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

        <!-- Form for editing furniture -->
        
            <form action="{{ route('rooms.update', $rooms->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <!-- Furniture Name -->
                <div class="mb-3">
                    <label for="room_name" class="form-label">Room Name :</label>
                    <input type="text" class="form-control" id="room_name" name="room_name" value="{{ $rooms->room_name }}" required>
                </div>

                <!-- Furniture -->
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label">Furniture :</label><br>
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
                    <label for="room_fee" class="form-label">Room Fee :</label>
                    <input type="number" class="form-control" id="room_fee" name="room_fee" value="{{ $rooms->room_fee }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="person_quantity" class="form-label">Person Quantity :</label>
                    <input type="number" class="form-control" id="person_quantity" name="person_quantity" value="{{ $rooms->person_quantity }}" required>
                </div>
    
                <div class="mb-3">
                    <label for="details" class="form-label">Details :</label>
                    <textarea class="form-control" id="details" name="details" rows="3" value="{{ $rooms->details }}" required>{{ $rooms->details }}</textarea>
                </div>

                <!-- Action buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-submit">Update Room</button>
                    <a href="/admin_show" class="btn btn-secondary">Back To Index</a>
                </div>
            </form>
    </div>
</body>

</html>
