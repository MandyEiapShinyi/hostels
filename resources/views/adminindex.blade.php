
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&family=Poppins:wght@600&display=swap" rel="stylesheet">
    
    <title>Admin Panel - Manage System</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            height: 110vh;
        }

        .sidebar {
            width: 30vh;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            font-size: 16px;
        }

        .sidebar h2 {
            font-size: 22px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .tab {
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #11113c;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #fff;
            font-size: 15px;
        }

        .tab:hover {
            background-color: #ea232a;
            text-decoration: none;
            color: #fff;
        }

        .tab.active {
            background-color: #ea232a;
            /* border-left: 4px solid #333; */
            text-decoration: none;
            color: #fff;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
        }

        .tab-content {
            display: none;
            
        }

        .tab-content.active {
            display: block;
        }

        button {
            padding: 10px 20px;
            margin-top: 10px;
            /* background-color: #fcff61; */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* button:hover {
            background-color: #f7e91d;
        } */

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .fontx {
            color: black;
            font-size: 16px;
        }

        .small-grey-text {
            font-size: 0.9em;
            color: #6c757d;
            display: block;
            text-align: center
        }

        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 110%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            border-radius: 30px;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            background: linear-gradient(145deg, #5b6ec4, #110f47);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            color: white;
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
        }

        .close {
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-submit {
            background-color: #00204a;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

          

        .btn-submit:hover {
            background-color: #11113c;
            color: rgb(255, 255, 255);  
            transform: scale(1.05);
        }

        .btn-action {
            background-color: #4c93ff;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            width: 70px;
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .btn-action:hover {
            color: rgb(255, 255, 255);  
            transform: scale(1.05);
            color: black;
        }

        .btn-delete {
            background-color: #ff60aa;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 0px;
            width: 70px;
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .btn-delete:hover {
            color: rgb(255, 255, 255);  
            transform: scale(1.05);
            color: black;
        }

        .title1 {
            font-weight: bold;
            font-size: 23px;
        }
        .dash-box {
            padding: 20px;
            background-color: #4f6d7a;
            text-align: center;
            flex: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        .dash-box2 {
            padding: 20px;
            background-color: #5a8e7b;
            text-align: center;
            flex: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        .dash-box3 {
            padding: 20px;
            background-color: #a3c1ad;
            text-align: center;
            flex: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        .dash-box4 {
            padding: 20px;
            background-color: #f8d49d;
            text-align: center;
            flex: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            font-size: 15px;
        }
        table, th, td {
            border: 1px solid #ddd;
         }
         th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #74a4b0;
            color: white;
        }
        .form-section, .table-section {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         }
        .form-section h2, .table-section h2 {
            color: #11113c;
            font-size: 20px;
            margin-bottom: 10px;
            font-family: 'Roboto', sans-serif;
        }
        .graph-container {
            margin-top: 30px; 
            background-color: #fff; 
            padding: 25px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);"
            width: 600px;
        }
        .admin-back {
            background-color: #fff;
            /* border-left: 8px solid #007bff; */
            /* padding: 15px 20px; */
            /* border-radius: 10px; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* margin: 20px 0; */
            text-align: center;
        }
        .admin-title-text {
            font-size: 28px;
            font-weight: 700;
            color: #000;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .modal-title {
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 24px;

        }

        .btn-add {
            background-color: #ea232a;
            color: white;
            font-weight: 300;
            padding: 14px 28px;
            border-radius: 25px;
            border: none;
            font-size: 16px;
            width: 60%;
            transition: all 0.3s ease;
            /* text-align: center; */
            margin-right: 90px;
        }
        .btn-add:hover {
            background-color: #ea232a;
            transform: translateY(-3px);
            color: white;
        }
        .input {
            font-size: 10px;
        }

        .register {
            background: linear-gradient(145deg, #5b6ec4, #110f47);
            padding: 20px;
            margin: 20px auto;
            border-radius: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 700px;
            height: 580px;
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .form-controll {
            border-radius: 12px;
            padding: 9px;
            font-size: 16px;
            width: 400px;
            border: 1px solid #dcdcdc;
            transition: all 0.3s ease;
        }

        .form-controll:focus {
            border-color: #7588f0;
            box-shadow: 0 0 10px rgba(117, 136, 240, 0.4);
        }

        .btn-register {
            background-color: #ea232a;
            color: white;
            font-weight: 500;
            padding: 14px 28px;
            border-radius: 25px;
            border: none;
            font-size: 16px;
            width: 60%;
            transition: all 0.3s ease;
        }

        .form-control {
            border-radius: 12px;
            padding: 9px;
            font-size: 16px;
            width: 430px;
            border: 1px solid #dcdcdc;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #7588f0;
            box-shadow:0 0 10px rgba(117,136,240,0.4);
        }

        .room_delete {
            background-color: #ff60aa;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 0px;
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .room_delete:hover {
            transform: scale(1.05);
            color: black;
        }

        .room_edit {
            background-color: #4c93ff;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .room_edit:hover {
            transform: scale(1.05);
        }

        .edit_a {
            color: white;
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .edit_a:hover {
            transform: scale(1.05);
            color: black;
            text-decoration: none;
        }

        .admin-back {
            background-color: #fff;
            /* border-left: 8px solid #007bff; */
            /* padding: 15px 20px; */
            /* border-radius: 10px; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* margin: 20px 0; */
            text-align: center;
        }
        .admin-title-text {
            font-size: 32px;
            font-weight: 700;
            color: #000;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .admin-header {
            background-color: #fffdfd;
            padding: 10px 20px;
            /* margin-bottom: 20px; */
            text-align: center;
            border-radius: 8px;
        }
        .admin-title-textt {
            font-size: 30px;
            font-weight: bold;
            color: #333;
            margin: 0;
            margin-top: 20px;
        }

        
        .close-alert-btn {
            background-color: transparent; /* No background */
            border: none; /* No border */
            color: white; /* White 'X' */
            font-size: 16px; /* Slightly larger 'X' */
            position: absolute; /* Position the button at the top-right */
            top: -4px;
            right: 15px;
            cursor: pointer; /* Pointer cursor for the button */
        }

        .close-alert-btn:hover {
            color:; /* Lighten the color on hover */
        }

        input["type='search'"]{
            border: 2px solid black;
        }

        .custom-modal {
            border-radius: 15px;
            background-color: #3449f8; /* Deep blue background */
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .custom-header {
            border-bottom: none;
            text-align: center;
        }

        h1.modal-title {
            color: #fff;
            font-size: 24px;
        }

        .custom-input {
            border-radius: 8px;
            padding: 10px;
            background-color: #fff; /* White input field */
        }

        .btn-close {
            background-color: #fff; /* Close button */
            border-radius: 50%;
        }

        .custom-btn-submit {
            background-color: #ff4d4d; /* Red submit button */
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            margin-right: 10px;
        }

        .custom-btn-back {
            background-color: #9984ff; /* Light blue back button */
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
        }

        .text-white {
            color: white; /* White text for labels */
        }

        input[type="checkbox"] {
            margin: 10px;
        }

        .message-box {
            font-weight: bold;
            font-size: 14px;
        }

        .green-alert {
            background-color: #b7e0b8;
            color: black;
            padding: 15px 25px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: fixed;
            top: 60px;
            right: 20px;
            z-index: 999999;
            width: 350px;

            /* Initial state */
            /* opacity: 0;
            transform: translateX(100px); */
            
            /* Transition for opacity and position */
            animation: slideIn 5s ease-out forwards;
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        /* Add a class to trigger the animation */
        .green-alert.show {
            /* Final state: full visibility */
            opacity: 1;
            transform: translateX(0);
        }

        /* Optional: Add keyframe for smoother animations */
        @keyframes slideIn {
            0% {
                opacity: 1;
                transform: translateX(0);
            }
            100% {
                opacity: 0;
                transform: translateX(100px);
            }
        }

        .green-alert.show {
            animation: slideIn 0.5s ease-out;
        }


        .close-alert-btn {
            background-color: transparent; /* No background */
            border: none; /* No border */
            color: black; /* White 'X' */
            font-size: 16px; /* Slightly larger 'X' */
            position: absolute; /* Position the button at the top-right */
            /* top: -4px; */
            right: 15px;
            cursor: pointer; /* Pointer cursor for the button */
        }

        .close-alert-btn:hover {
            color:; /* Lighten the color on hover */
        }

        .save-button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .save-button:hover {
            background-color: #4a5aa8;
        }
        .save-button {
            margin-top: 20px;
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Add transition */
        }

        .save-button:hover {
            background-color: #ea232e;
            transform: scale(1.05); /* Add a slight scaling effect on hover */
        }

        .form-controlle {
            width:100%;
            border-radius: 12px;
            padding:15px 15px 15px 0px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 1px solid #dcdcdc;
            transition: all 0.3s ease;
            color:black;
            background-color:white;
        }
        .form-controlle:focus {
            border-color: #7588f0;
            box-shadow: 0 0 10px rgba(117, 136, 240, 0.4);
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
            <img onclick="location.reload();" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnBKvfIJGpqKsp0RvIiV0T1CJn4wPiu48d7g&s" alt="Logo" style="width: 100%; margin-bottom: 20px;">
        <br>
        <span class="small-grey-text">Welcome, Administrator</span>
        <h2><i>Admin Panel</i></h2>
    
        <a class="tab active" id="tabhome" onclick="showTab('home')">
            <i class="fas fa-home"></i> Dashboard
        </a>
    
        <a class="tab" id="tabusers" onclick="showTab('users')">
            <i class="fas fa-user-graduate"></i> Student
        </a>
    
        <a class="tab" id="tabdata" onclick="showTab('data')" onclick="refreshSection('address')">
            <i class="fas fa-bed"></i> Room
        </a>
    
        <a class="tab" id="tabfurniture" onclick="showTab('furniture')">
            <i class="fa-solid fa-couch"></i> Furniture
        </a>

        <a class="tab" id="tabregisterstudent" onclick="showTab('registerstudent')">
            <i class="fa fa-registered" aria-hidden="true"></i> Register Student
        </a>
    
        <a class="tab" id="tabfeedback" onclick="showTab('feedback')">
            <i class="fas fa-comments"></i> Service Report
        </a>
    
        <a class="tab" id="tabfees" onclick="showTab('fees')">
            <i class="fa-solid fa-money-check"></i> Fees
        </a>

        <a class="tab" id="tabhistory" onclick="showTab('history')">
            <i class="fa fa-history" aria-hidden="true"></i> History
        </a>
    
        <a class="tab" id="tabsignOut" onclick="showTab('signOut')">
            <i class="fas fa-sign-out-alt"></i> Sign Out
        </a>
    </div>
    

    <!-- Main Content -->
    <div class="content admin-header">
        <h1 class="admin-title-textt">Admin Panel - Manage System</h1>

        <!-- Home Section -->
        <div id="home" class="tab-content active">
            <h2 class="fontx">Hostel Dashboard</h2>
            <p>Manage your hostel system, view room status, and student allocations efficiently.</p>

            <!-- Dashboard Overview Cards -->
            <div style="display: flex; justify-content: space-between; gap: 15px; margin-top: 20px;">
                <div class="dash-box">
                    <h3 class="title1">Total Rooms</h3>
                    <p style="font-size: 30px;">{{ $totalRooms}}</p>
                </div>
                <div class="dash-box2">
                    <h3 class="title1">Available Rooms</h3>
                    <p style="font-size: 30px;">{{ $totalPersonQuantity }}</p>
                </div>
                <div class="dash-box3">
                    <h3 class="title1">Service Report</h3>
                    <p style="font-size: 30px;">{{ $service }}</p>
                </div>
                <div class="dash-box4">
                    <h3 class="title1">Total Students</h3>
                    <p style="font-size: 30px;">{{ $totalStudents ?? 0 }}</p>
                </div>
            </div>

            <!-- Room Allocation Statistics Graph -->
            <div style="margin-top: 40px; justify-content: center; align-items: center; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <h2 class="fontx">Room Allocation Statistics</h2>
                <div>
                    <canvas id="roomAllocationChart" style="max-width: 1200px; max-height: 500px;"></canvas>
                </div>                
            </div>
        </div> 

        <!-- Manage Users Section -->
        <div id="users" class="tab-content">

            @if(session('success'))
                <div id="alertBox" class="green-alert" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
                </div>
                <!-- Forget the session after it's displayed -->
                {{ session()->forget('success') }}
            @endif


            <h2 class="fontx">Address</h2>
            <p>Choose Address To Add A New Student</p>

            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Address Name</th>
                    <th>Address</th>
                </thead>
                <tbody>
                    @foreach($addresses as $address)
                    <tr class="clickable-rowstudent" data-id="{{ $address->id }}">
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $address->address_name }}</td>
                        <td>{{ $address->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        <!-- Add Student Modal -->
        <div class="modal fade" id="addstudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('students.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="address_id" id="address_id" value="">

                            <div class="mb-3">
                                <label for="user_id" class="form-label">Student :</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    @if($users->isEmpty())
                                        <option value="">No Users Available</option>
                                    @else
                                        <option value="">Select a Student</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    @endif

                                </select>
                                <p id="checkStudents"></p>
                                @error('user_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label class="form-label" for="phone_number">Phone Number :</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="012-345-6789" required>
                                @error('phone_number')
                                    {{ $message }}
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="emails" class="form-label">Email :</label>
                                <input class="form-control" id="email" name="email" placeholder="Email" required/>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date :</label>
                                <input type="date" class="form-control" id="date" name="date" required />
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </div>                            
                        
                            <div class="mb-3">
                                <label for="room_id" class="form-label">Room :</label>
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
                                @error('room_id')
                                    {{ $message }}
                                @enderror
                            </div>

                            <!-- Image Upload Input -->
                            {{-- <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" name="image" class="form-control"  style="height: 50px;" required>
                            </div> --}}

                            <label for="image" class="form-label">Upload Image :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="customFile" style="height: 50px;width:100px;" required>
                                    <label class="custom-file-label" for="file" id="fileLabel">Choose file</label>
                                </div>
                        
                            <div class="text-right">
                                <button type="submit" class="btn btn-add">Add Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <h2 class="fontx">Manage Student</h2>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Address ID</th>
                    <th>Room Name</th>
                    <th>Student Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $student->address_id }}</td>
                    <td>{{ $student->room->room_name ?? 'N/A' }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->date }}</td>
                    <td>
                        <!-- Check if the furniture image exists -->
                        @if($student->image)
                            <a href="{{ asset('storage/' . $student->image) }}" target="_blank">View Image</a>
                        @else
                            No Image
                        @endif
                    </td>                    
                    <td>
                        <button class="room_edit"><a href="{{ route('students.edit', $student->id) }}" class="edit_a">Edit</a></button>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this student?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="room_delete">Delete</button>
                        </form>                        
                    
                    </td>
                </tr>
            @endforeach
            </table>
        </div>

        <!-- Manage Data Section -->
        <div id="data" class="tab-content">
            
            @if(session('success'))
                <div id="alertBox" class="green-alert" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
                </div>
                <!-- Forget the session after it's displayed -->
                {{ session()->forget('success') }}
            @endif


            <p>Manage The Room Address Data</p>
            <a href="/addresses/create" class="btn btn-submit" style="width: 300px;">Add Addresses</a>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Address Name</th>
                        <th>Address</th>
                        <th>Room Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($addresses as $address)
                   
                    <tr class="clickable-row"  data-id="{{ $address->id }}" data-room-count="{{ $address->rooms->count() }}" data-room-limit="{{ $address->room_quantity }}">
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $address->address_name }}</td>
                        <td>{{ $address->address }}</td>
                        <td>{{ $address->room_quantity }}</td>
                        <td> 
                            
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?');">
                                <button class="room_edit"><a href="{{ route('addresses.edit', $address->id) }}" class="edit_a">Edit</a></button>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="room_delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal for Adding Room -->
            <div class="modal fade" id="addroom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content custom-modal"> <!-- Add a custom class here -->
                        <div class="modal-header custom-header"> <!-- Custom header style -->
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Room</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
            
                        <div class="modal-body">
                            <!-- Add Room Form -->
                            <form action="{{ route('rooms.add') }}" method="POST" enctype="multipart/form-data"> <!-- Allow file upload -->
                                @csrf
                                <input type="hidden" name="address_id" id="address_id" value="">
            
                                <div class="form-group">
                                    <label for="room_name" class="form-label text-white">Room Name :</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room name" required>
                                </div>
                            
                                <div class="form-group">
                                    <label class="form-label text-white">Furniture :</label><br>
                                    @foreach($furnitures as $furniture)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="furniture_{{ $furniture->id }}" name="furniture[]" value="{{ $furniture->name }}">
                                            <label class="form-check-label text-white" for="furniture_{{ $furniture->id }}">{{ $furniture->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
            
                                <div class="form-group">
                                    <label for="room_fee" class="form-label text-white">Room Fee :</label>
                                    <input type="number" class="form-control" id="room_fee" min="1" name="room_fee" placeholder="Room Fee" required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="person_quantity" class="form-label text-white">Person Quantity :</label>
                                    <input type="number" class="form-control" id="person_quantity" min="1" name="person_quantity" placeholder="Number of persons" required>
                                </div>

                                <div class="form-group">
                                    <label for="room_image" class="form-label text-white">Room Image :</label>
                                    <input type="file" class="form-controlle" id="image" name="image" required>
                                </div>

                                {{-- <label for="room_image" class="form-label text-white">Room Image :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="customFile">
                                    <label class="custom-file-label" for="customFile" id="fileLabel">Choose file</label>
                                </div> --}}
                            
                                <div class="form-group"><br>
                                    <label for="details" class="form-label text-white">Details :</label>
                                    <textarea class="form-control" id="details" name="details" placeholder="Additional details" rows="3"></textarea>
                                </div>
                            
                                <div class="text-center">
                                    <button type="submit" class="btn custom-btn-submit" style="width: 250px;">Add Room</button>
                                    {{-- <button type="button" class="btn custom-btn-back" data-bs-dismiss="modal">Back to Index</button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            

            <br><br><br><br>

            <h2 class="fontx">Manage Room</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Address ID</th>
                            <th>Room Name</th>
                            <th>Furniture</th>
                            <th>Room Fee</th>
                            <th>Person Quantity</th>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $room->address_id }}</td>
                                <td>{{ $room->room_name }}</td>
                                <td>
                                @foreach (json_decode($room->furniture) as $newfur)
                                <i class="far fa-check-square" style="color: red;"></i> {{ "".$newfur}}<br>
                                
                                @endforeach
                                </td>
                                <td>{{ $room->room_fee }}</td>
                                <td>{{ $room->person_quantity }}</td>
                                <td>
                                    @if($room->image)
                                        <a href="{{ asset('storage/' . $room->image) }}" target="_blank">View Image</a>
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $room->details }}</td>
                                <td>
                                    <button class="room_edit"><a href="{{ route('rooms.edit', $room->id) }}" class="edit_a">Edit</a></button>
                                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        
                                        <button type="submit" class="room_delete" onclick="return confirm('Are you sure you want to delete this room?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        <!-- Furniture Section -->
        <div id="furniture" class="tab-content"> 
            
            @if(session('success'))
                <div id="alertBox" class="green-alert" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
                </div>
                <!-- Forget the session after it's displayed -->
                {{ session()->forget('success') }}
            @endif

            <p>Manage The Room Furniture</p>
            <a href="/addFurniture"  class="btn btn-submit" style="width: 300px;">Add Furniture</a>
            
            <table>
                <tr>
                    <th>ID</th>
                    <th>Furniture Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                
                @foreach($furnitures as $furniture)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $furniture->name }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $furniture->image) }}" target="_blank">View Image</a>
                    </td>
                    <td>
                        <form action="{{ route('furnitures.destroy', $furniture->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('furnitures.edit', $furniture->id) }}" class="btn btn-action">Edit</a>
                            <button type="submit" onclick="return confirm('Are you sure to delete this furniture?')" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- Register Student -->
        <div id="registerstudent" class="tab-content">
            <h5 class="fontx">Register Student</h5>
            @if(session('success'))
            <div id="alertBox" class="green-alert" role="alert">
                {{ session('success') }}
                <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
            </div>
            <!-- Forget the session after it's displayed -->
            {{ session()->forget('success') }}
        @endif

            

    <div class="register">
    <form method="POST" action="{{ route('adminregister') }}">
        @csrf
        <div class="mb-3" style="text-align: center">
            <label for="name">Student Name :</label><br>
            <input class="form-controll" type="text" name="name" id="name" placeholder="Full Name" required><br>
        </div>

        @error('name')
            {{ $message }}
        @enderror
        
        <div class="mb-3">
            <label for="email">Email :</label><br>
            <input class="form-controll" type="email" name="email" id="email" placeholder="Email" required><br>
        </div>

        @error('email')
            {{ $message }}
        @enderror
         
        <div class="mb-3">
            <label for="password">Password :</label><br>
            <input class="form-controll" type="password" name="password" id="password" placeholder="Password" required><br>
        </div>

        @error('password')
            {{ $message }}
        @enderror

        <div class="mb-3">
            <label for="confirm_password">Confirm Password :</label><br>
            <input class="form-controll" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required><br>
        </div>

        @error('password_confirmation')
            {{ $message }}
        @enderror

        <div class="mb-3">
            <label for="phone_number">Phone Number :</label><br>
            <input class="form-controll" type="text" name="phone_number" id="phone_number" placeholder="012-345-6789" required><br>
        </div>

        @error('phone_number')
            {{ $message }}
        @enderror

        <input type="hidden" name="role" value="user">
        
        <div class="space">
            <button type="submit" class="btn btn-register">Register</button>
        </div>
    </form>
</div>
    </div>

        <!-- FeedBack Section -->
        <div id="feedback" class="tab-content">
            <h2 class="fontx">Service Report</h2>
            <p>Furniture Repair</p>
            <table id="example1" class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Address</th>
                    <th>Room Name</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Result</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($serviceReports as $serviceReport)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $serviceReport->user->name }}</td>
                    <td>{{ $serviceReport->user && $serviceReport->user->student ? $serviceReport->user->student->address->address : 'No Address Assigned' }}</td>
                    <td>{{ $serviceReport->user->student->room->room_name }}</td>
                    <td>{{ $serviceReport->subject}}</td>
                    <td>{{ $serviceReport->message }}</td>
                    <td>
                        <div class="message-box" data-id="{{ $serviceReport->id }}" style="color: {{ $serviceReport->is_serviced ? 'green' : 'red' }}">
                            {{ $serviceReport->is_serviced ? 'Service Completed' : 'No Service Yet' }}
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" class="service-checkbox" data-id="{{ $serviceReport->id }}" 
                               {{ $serviceReport->is_serviced ? 'checked' : '' }} 
                               onclick="toggleServiceStatus({{ $serviceReport->id }})">
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
   

        <!-- Fees Section -->
        <div id="fees" class="tab-content">

            @if(session('success'))
                <div id="alertBox" class="green-alert" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
                </div>
                <!-- Forget the session after it's displayed -->
                {{ session()->forget('success') }}
            @endif

            <h2 class="fontx">Student Fees</h2>
            <table id="example2" class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Address</th>
                        <th>Room Name</th>
                        <th>Phone Number</th>
                        <th>Total Fee</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentFees as $student)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->address->address }} {{ $student->address->address_name }}</td>
                        <td>{{ $student->room->room_name ?? 'N/A' }}</td>
                        <td>{{ $student->phone_number }}</td>
                        <td>{{ $student->room->room_fee ?? 'N/A' }}</td>
                        <td>{{ $student->date }}</td>
                        <td>
                            @if($student->is_due)
                                <span style="color: red; font-weight: bold;">Due</span>
                            @else
                                <span style="color: green;">Not Due</span>
                            @endif
                        </td>
                        <td>
                            {{-- Show the "Pay" button only if the fee is due --}}
                            @if($student->is_due)
                                <button type="button" class="pay-button" 
                                        data-toggle="modal" data-target="#paymentModal" 
                                        data-id="{{ $student->user_id }}" value="{{$student->user_id}}">
                                    Pay
                                </button>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

        <!-- Modal for Image Upload -->
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Payment Proof</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>X
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('upload.payment') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-controlle" id="image" name="image" required>
                            </div>

                            <div class="form-group">
                                <label for="date">Payment Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <input type="hidden" id="userId" name="user_id">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- History -->
        <div id="history" class="tab-content">

            @if(session('success'))
                <div id="alertBox" class="green-alert" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
                </div>
                <!-- Forget the session after it's displayed -->
                {{ session()->forget('success') }}
            @endif

            

            <table id="example" class="table table-bordered mt-3">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Payment Receipt</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                
                <tbody>
                @foreach ($paymentReceipts as $paymentReceipt)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $paymentReceipt->user->name }}</td>
                    <td>
                        @if (Str::endsWith($paymentReceipt->image, '.pdf'))
                            <a href="{{ asset('storage/' . $paymentReceipt->image) }}" target="_blank">View PDF</a>
                        @else
                            <a href="{{ asset('storage/' . $paymentReceipt->image) }}" target="_blank">View Image</a>
                        @endif
                    </td>
                    <td>{{ $paymentReceipt->date }}</td>
                    <td>
                        <form action="{{ route('payment.destroy', $paymentReceipt->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
            </table>
            
        </div>

        <!-- Sign Out -->
        <div id="signOut" class="tab-content">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;" onsubmit="return confirmLogout()">
                @csrf
                <button type="submit" class="btn btn-light btn-block text-left">
                    <i class="bi bi-box-arrow-right"></i>
                    <a class="tab">Sign Out</a>
                </button>
            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function showTab(tabId) {

        const tabs = document.querySelectorAll('.tab-content');
        const tabLinks = document.querySelectorAll('.tab');

        tabs.forEach(tab => {
            tab.classList.remove('active');
        });

        tabLinks.forEach(link => {
            link.classList.remove('active');
        });


        document.getElementById(tabId).classList.add('active');
        document.querySelector(`.tab[onclick*="${tabId}"]`).classList.add('active');
        }

    function aftersubmitshowcurrecttab(){
        const tabs = document.querySelectorAll('.tab-content');
        const tabLinks = document.querySelectorAll('.tab');

        tabs.forEach(tab => {
            tab.classList.remove('active');
        });

        tabLinks.forEach(link => {
            link.classList.remove('active');
        });
        let page = "{{ session()->has('page') ? session('page') : 'home' }}";
        
        document.querySelector(`#tab${page}`).classList.add("active");
        document.querySelector(`#${page}`).classList.add('active');

    }

  

    

    // afterbackshowcurrecttab()
    aftersubmitshowcurrecttab()
    
</script>

<script>
    $(document).ready(function () {
        $('.clickable-row').on('click', function (event) {
            var target = $(event.target);
            var actionCells = $(this).find('td').slice(-1);
            var roomCount = $(this).data('room-count');
            var roomLimit = $(this).data('room-limit');

            if (actionCells.is(target) || actionCells.has(target).length) {
            } else {
                var addressId = $(this).data('id');
                if (roomCount >= roomLimit) {
                alert("This address is full, you cannot add more rooms.");
                return;
            }
                $("input[name='address_id']").val(addressId);
                $('#addroom').modal('show');
            }
           
        });
    });

    $(document).ready(function () {
        $('.clickable-rowroom').on('click', function (event) {
            var target = $(event.target);
            var actionCells = $(this).find('td').slice(-1);
            if (actionCells.is(target) || actionCells.has(target).length) {
                return false;
            }
            
            var addressId = $(this).data('id');
            $("#address_id").val(addressId);
        });
    });

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.rowstudent').on('click', function (event) {
            $("#address_id").val(addressId);
            $('#addstudent').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".clickable-rowroom").click(function(){
            var target = $(this).data("target");
            $(target).toggle();
        });
    });

    $(document).ready(function(){
        $(".clickable-row").click(function(){
            var target = $(this).data("target");
            $(target).toggle();
        });
    });

    $(document).ready(function () {
        $('.clickable-rowstudent').on('click', function () {
            var addressId = $(this).data('id');
            $("#address_id").val(addressId);

            $.ajax({

                type: 'GET',
                url: "{{ route('getRooms','') }}/" + addressId,
                dataType: 'json',
                success: function(response) {
                    $('#selected_room').empty();
                    
                    if (response.room.length > 0) {
                        $('#selected_room').append("<option value=''>Choose room</option>");
                        response.room.forEach(room => {
                            $('#selected_room').append("<option value='" + room.id + "'>" + room.room_name + "</option>");
                        });
                    } else {
                        $('#selected_room').append("<option value=''>No room assigned</option>");
                    }
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '<ul>';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value[0] + '</li>'; // Append the first error message
                        });
                        errorMessage += '</ul>';
                        $('#response').html('<p>Errors:</p>' + errorMessage); // Display errors on the page
                    } else {
                        console.log("An error occurred: " + xhr.statusText);
                    }
                }
            });

            $('#addstudent').modal('show');
            $('#message').html("");
        });

        $('#user_id').on('change', function () {
            let userId= $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ route('getStudents','') }}/" + userId,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $("#checkStudents").html("");
                    if(response.message=="success"){
                        $("#checkStudents").html("This Student Already Register Inside the Room");
                    }
                    
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '<ul>';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value[0] + '</li>'; // Append the first error message
                        });
                        errorMessage += '</ul>';
                        $('#response').html('<p>Errors:</p>' + errorMessage); // Display errors on the page
                    } else {
                        console.log("An error occurred: " + xhr.statusText);
                    }
                }
            });
        });

        $('#selected_room').on('change', function () {
            let roomid=$(this).val();
            
            $.ajax({
                type: 'GET',
                url: `{{ route('countroom','') }}/${roomid}`,
                dataType: 'json',
                success: function(response) {
                    
                    $("#message").html(response.message);
                    $("#message").attr("style",`color:${response.color}`);
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '<ul>';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value[0] + '</li>'; // Append the first error message
                        });
                        errorMessage += '</ul>';
                        $('#response').html('<p>Errors:</p>' + errorMessage); // Display errors on the page
                    } else {
                        console.log("An error occurred: " + xhr.statusText);
                    }
                }
            });
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('.pay-button').on('click', function() {
            // Get the student's ID from the table row
            var studentId = $(this).val();
            
            // Set the student ID in the hidden input of the modal form
            $('#userId').val(studentId);

            $("#uploadModal").modal("show");
        });
    });
</script>
<script>
    function confirmLogout() {
        return confirm("Are you sure you want to sign out?");
    }
</script>
<script>
    var ctx = document.getElementById('roomAllocationChart').getContext('2d');
    var roomAllocationChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Occupied Rooms', 'Total Rooms' , 'Empty Rooms'],
            datasets: [{
                label: 'Room Allocation',
                data: [{{ $totalRooms }}, {{ $totalStudents ?? 0 }}, {{ $totalPersonQuantity }}],
                backgroundColor: [
                    '#f8d49d',
                    '#4f6d7a',
                    '#5a8e7b'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    function refreshSection(sectionId) {
    $.ajax({
        url: '/getUpdatedAddressData', // URL to fetch the data
        type: 'GET',
        success: function(data) {
            // Replace the content of the section with the new data
            $('#' + sectionId + ' tbody').html(data);
        },
        error: function() {
            alert('Failed to refresh the section.');
        }
    });
}
</script>

<script>
    function toggleDropdown() {
    var dropdown = document.getElementById("feesDropdown");
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
}

// Close dropdown if clicked outside
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-btn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
            }
        }
    }
}
</script>

<script>
    // When the "Pay" button is clicked, set the student ID in the hidden field of the modal
    $('#paymentModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var studentId = button.data('id'); // Extract student ID from data-id attribute

        var modal = $(this);
        modal.find('#student_id').val(studentId); // Set the student ID in the hidden input field
    });
</script>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
new DataTable('#example');
new DataTable('#example1');
new DataTable('#example2');
</script>

<script>
    function closeAlert() {
        document.getElementById('custom-alert').style.display = 'none';
    }
</script>

<script>
    function closeAlert1() {
        document.getElementById('custom-alert1').style.display = 'none';
    }
</script>

<script>
    function closeAlert2() {
        document.getElementById('custom-alert2').style.display = 'none';
    }
</script>

<script>
    function closeAlert3() {
        document.getElementById('custom-alert3').style.display = 'none';
    }
</script>

<script>
    function closeAlert4() {
        document.getElementById('custom-alert4').style.display = 'none';
    }
</script>

<script>
    function closeAlert5() {
        document.getElementById('custom-alert5').style.display = 'none';
    }
</script>

<script>
    // Get the input and the label elements
    var fileInput = document.getElementById('customFile');
    var fileLabel = document.getElementById('fileLabel');

    // Listen for a change event on the file input
    fileInput.addEventListener('change', function(event) {
        // Get the name of the selected file
        var fileName = event.target.files[0].name;
        
        // Update the label text with the file name
        fileLabel.textContent = fileName;
    });
</script>
<script>
    function toggleServiceStatus(studentId) {
        var checkbox = document.querySelector(`input[data-id='${studentId}']`);
        var messageBox = document.querySelector(`.message-box[data-id='${studentId}']`);

        $.ajax({
            url: '{{ route('updateServiceStatus')}}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                student_id: studentId,
                is_serviced: checkbox.checked ? 1 : 0
            },
            success: function(response) {
                if (checkbox.checked) {
                    messageBox.style.color = 'green';
                    messageBox.textContent = 'Service Completed';
                    alert('Service completed successfully!');
                } else {
                    messageBox.style.color = 'red';
                    messageBox.textContent = 'No Service Yet';
                }
            },
            error: function() {
                alert('Error while updating the service status');
            }
        });
    }
</script>

<script>
    window.onload = function() {
      const alert = document.querySelector('.green-alert'); // Target the green alert element
  
      if (alert) {
          setTimeout(function() {
              alert.style.display = 'none'; // Hide the alert after 4 seconds
          }, 4000); // 4 seconds in milliseconds
      }
  }
  
  </script>

</body>
</html>