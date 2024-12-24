<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: white;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #2f3e75;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            margin-top: 50px;
            color: white;
        }

        h2 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 30px;
        }

        .form-group label {
            color: #ffffff;
        }

        .btn-primary {
            background-color: #f14668;
            border: none;
            padding: 10px 30px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #d13558;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 30px;
            font-size: 16px;
        }

        .btn-secondary:hover {
            background-color: #565e64;
        }

        .form-control {
            background-color: #ffffff;
            color: #000;
        }

        .form-group select {
            color: #000;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Student</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- <div class="form-group">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" class="form-control" value="{{ $student->student_name }}" required>
            </div> --}}

            <div class="form-group">
                <label for="user_id" class="form-label">Student Name</label>
                <select class="form-control" id="selected_student" name="user_id">
                    @if($users->isEmpty())
                        <option value="">No Student Assigned</option>
                    @else
                        <option value="room_id">Select a Student</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{{ $student->phone_number }}" required>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" value="{{ $student->date }}" required>
            </div>

            <div class="form-group">
                <label for="room_id" class="form-label">Room</label>
                <select class="form-control" id="selected_room" name="room_id">
                    @if($rooms->isEmpty())
                        <option value="">No Room Assigned</option>
                    @else
                        <option value="room_id">Select a Room</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Room Image :</label>
            
                <!-- Display the current room image if available -->
                <div class="mb-3">
                    @if($student->image)
                        <img src="{{ asset('storage/' . $student->image) }}" alt="Current Room Image" class="img-thumbnail" style="max-width: 150px;margin:auto;">
                    @else
                        <img src="https://via.placeholder.com/150" alt="No Image Available" class="img-thumbnail" style="max-width: 150px;">
                    @endif
                </div>
            
                <!-- File input for uploading a new image -->
                <input class="form-control" type="file" id="image" name="image" style="height: 60px;" required>
            </div>        

            <div class="buttons">
                <button type="submit" class="btn btn-primary">Update Student</button>
                <a href="{{ route('adminBack', 'users')}}" class="btn btn-secondary">Back to Index</a>
            </div>
        </form>
    </div>
</body>
</html>
