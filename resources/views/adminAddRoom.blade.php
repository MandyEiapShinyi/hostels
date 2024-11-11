<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
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

<div class="container">
    <div class="card shadow-sm custom-card">
        <div class="card-header">
            <h3 class="card-title">Add New Room</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('rooms.add') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>

                <div class="mb-3">
                    <label for="room_quantity" class="form-label">Room Quantity</label>
                    <input type="number" class="form-control" id="room_quantity" name="room_quantity" placeholder="Room quantity" required>
                </div>

                <div class="mb-3">
                    <label for="room_name" class="form-label">Room Name</label>
                    <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room name" required>
                </div>

                <div class="mb-3">
                    {{-- <label class="form-label">Furniture</label><br> --}}
                    <div class="mb-3">
                        <label class="form-label">Furniture</label><br>
                        
                        @foreach($furnitures as $furniture)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="furniture_{{ $furniture->id }}" name="furniture[]" value="{{ $furniture->name }}">
                                <label class="form-check-label" for="furniture_{{ $furniture->id }}">{{ $furniture->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="person_quantity" class="form-label">Person Quantity</label>
                    <input type="number" class="form-control" id="person_quantity" name="person_quantity" placeholder="Number of persons" required>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea class="form-control" id="details" name="details" placeholder="Additional details" rows="3"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-submit">Add Room</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ url('/admin_show') }}';">Back to Index</button>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Synergy College</p>
        <p>32 & 34, Jalan Perai Jaya 4, Bandar Perai Jaya, 13600 Perai, Pulau Pinang</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>