<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
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

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('POST')
            
            <div class="form-group">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" class="form-control" value="{{ $student->student_name }}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{{ $student->phone_number }}" required>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" value="{{ $student->date }}" required>
            </div>

            {{-- <div class="form-group">
                <label for="room_id">Room ID</label>
                <input type="text" name="room_id" class="form-control" value="{{ $student->room }}" required>
            </div> --}}

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
                <p id="message"></p>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
</body>
</html>
