<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
</head>
<body>

<div class="container">
    <div class="card shadow-sm custom-card">
        <div class="card-header">
            <h3 class="card-title">Add a New Student</h3>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('students.add') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="student_name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Student Name" required>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="0123455789" required >       
                </div>

                <div class="mb-3">
                    <label for="room_id" class="form-label">Room ID</label>
                    <input type="text" class="form-control" name="room_id" id="room_id" placeholder="Room" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-submit">Add Student</button>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
