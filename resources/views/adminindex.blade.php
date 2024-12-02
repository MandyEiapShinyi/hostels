
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <title>Admin Panel - Manage System</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 200px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            font-size: 16px;
        }

        .sidebar h2 {
            font-size: 22px;
            margin-bottom: 20px;
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
            overflow-y: auto;
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
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
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
            /* padding: 10px 20px; */
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-action {
            background-color: #4c93ff;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-delete {
            background-color: #ff60aa;
            color: white;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 0px;
        }

        .btn-submit:hover {
            background-color: #11113c;
            color: rgb(255, 255, 255);
        }
        .title1 {
            font-weight: bold;
            font-size: 18px;
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


        
    </style>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnBKvfIJGpqKsp0RvIiV0T1CJn4wPiu48d7g&s" alt="Logo" style="width: 100%; margin-bottom: 20px;">
        <span class="small-grey-text">Welcome, Administrator</span>
        <h2>Admin Panel</h2>
    
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
    
        <a class="tab" id="tabfeedback" onclick="showTab('feedback')">
            <i class="fas fa-comments"></i> Service Report
        </a>
    
        <a class="tab" id="tabFees" onclick="showTab('fees')">
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
    <div class="content">
        <h1>Admin Panel - Manage System</h1>

        <!-- Home Section -->
        <div id="home" class="tab-content active">
            <h2 class="fontx">Hostel Dashboard</h2>
            <p>Manage your hostel system, view room status, and student allocations efficiently.</p>

            <!-- Dashboard Overview Cards -->
            <div style="display: flex; justify-content: space-between; gap: 15px; margin-top: 20px;">
                <div class="dash-box">
                    <h3>Total Rooms</h3>
                    <p style="font-size: 30px;">{{ $totalRooms}}</p>
                </div>
                <div class="dash-box2">
                    <h3>Available Rooms</h3>
                    <p style="font-size: 30px;">{{ $totalPersonQuantity }}</p>
                </div>
                <div class="dash-box3">
                    <h3>Service Report</h3>
                    <p style="font-size: 30px;">{{ $service }}</p>
                </div>
                <div class="dash-box4">
                    <h3>Total Students</h3>
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

            {{-- <!-- Room Reports -->
            <div style="display: flex; justify-content: space-between; margin-top: 40px;">
                <div style="background-color: #f8f8f8; padding: 20px; border-radius: 10px; width: 48%; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                    <h3>Reports of this month</h3>
                    <p style="font-size: 24px; color: #FF4C4C;">50</p>
                </div>
                <div style="background-color: #f8f8f8; padding: 20px; border-radius: 10px; width: 48%; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                    <h3>Total Fees Collected</h3>
                    <p style="font-size: 24px; color: #28a745;">₹ 1,20,345</p>
                </div>
            </div>--}}
        </div> 

        <!-- Manage Users Section -->
        <div id="users" class="tab-content">
            <h2 class="fontx">Address</h2>
            <p>Choose Address To Add A New Student</p>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            @if (session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif
        
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Address Name</th>
                    <th>Address</th>
                </thead>
                <tbody>
                    @foreach($addresses as $address)
                    <tr class="clickable-rowstudent" data-id="{{ $address->id }}">
                        <td>{{ $address->id }}</td>
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
                        <form action="{{ route('students.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="address_id" id="address_id" value="">

                            <div class="mb-3">
                                <label for="user_id" class="form-label">Student</label>
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
                            </div>
                        
                            <div class="mb-3">
                                <label class="form-label" for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="012-345-6789" pattern="\d{3}-\d{3}-\d{4}" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="emails" class="form-label">Email</label>
                                <input class="form-control" id="email" name="email" placeholder="Email" required/>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required />
                            </div>                            
                        
                            <div class="mb-3">
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
                        
                            <div class="text-right">
                                <button type="submit" class="btn btn-submit">Add Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="fontx">Manage Student</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

            
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Address ID</th>
                    <th>Room Name</th>
                    <th>Student Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->address_id }}</td>
                    <td>{{ $student->room->room_name ?? 'N/A' }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->date }}</td>
                    <td>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                        @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>

        <!-- Manage Data Section -->
        <div id="data" class="tab-content">
            <a href="/addresses/create" class="btn btn-submit">Add Address</a>
            <h2 class="fontx">Manage Address</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

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
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->address_name }}</td>
                        <td>{{ $address->address }}</td>
                        <td>{{ $address->room_quantity }}</td>
                        <td> 
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal for Adding Room -->
            <div class="modal fade" id="addroom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered"> <!-- Use modal-dialog-centered to center the modal -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Room</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>

                        <div class="modal-body">
                            <!-- Add Room Form -->
                            <form action="{{ route('rooms.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="address_id" id="address_id" value="">
                                
                                <div class="mb-3">
                                    <label for="room_name" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room name" required>
                                </div>
                            
                                <div class="mb-3">
                                    <label class="form-label">Furniture</label><br>
                                    @foreach($furnitures as $furniture)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="furniture_{{ $furniture->id }}" name="furniture[]" value="{{ $furniture->name }}">
                                            <label class="form-check-label" for="furniture_{{ $furniture->id }}">{{ $furniture->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mb-3">
                                    <label for="room_fee" class="form-label">Room Fee</label>
                                    <input type="number" class="form-control" id="room_fee" min="1" name="room_fee" placeholder="Room Fee" required>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="person_quantity" class="form-label">Person Quantity</label>
                                    <input type="number" class="form-control" id="person_quantity" min="1" name="person_quantity" placeholder="Number of persons" required>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="details" class="form-label">Details</label>
                                    <textarea class="form-control" id="details" name="details" placeholder="Additional details" rows="3"></textarea>
                                </div>
                            
                                <div class="text-right">
                                    <button type="submit" class="btn btn-submit">Add Room</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            

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
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->address_id }}</td>
                                <td>{{ $room->room_name }}</td>
                                <td>
                                @foreach (json_decode($room->furniture) as $newfur)
                                <i class="far fa-check-square" style="color: red;"></i> {{ "".$newfur}}<br>
                                
                                @endforeach
                                </td>
                                <td>{{ $room->room_fee }}</td>
                                <td>{{ $room->person_quantity }}</td>
                                <td>{{ $room->details }}</td>
                                <td>

                                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?');">Delete</button>
                                    </form>
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        <!-- Furniture Section -->
        <div id="furniture" class="tab-content">
            <h2 class="fontx">Furniture</h2>
            <a href="/addFurniture">Add Furniture</a>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table>
                <tr>
                    <th>ID</th>
                    <th>Furniture Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                
                @foreach($furnitures as $furniture)
                <tr>
                    <td>{{ $furniture->id }}</td>
                    <td>{{ $furniture->name }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $furniture->image) }}" target="_blank">View Image</a>
                    </td>
                    <td>
                        <form action="{{ route('furnitures.destroy', $furniture->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('furnitures.edit', $furniture->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- FeedBack Section -->
        <div id="feedback" class="tab-content">
            <h2 class="fontx">Service Report</h2>
            <p>Furniture Repair</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Address</th>
                    <th>Room Name</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                
                @foreach ($serviceReports as $serviceReport)
                <tr>
                    <td>{{ $serviceReport->id }}</td>
                    <td>{{ $serviceReport->user->name }}</td>
                    <td>{{ $serviceReport->user && $serviceReport->user->student ? $serviceReport->user->student->address->address : 'No Address Assigned' }}</td>
                    <td>{{ $serviceReport->user->student->room->room_name }}</td>
                    <td>{{ $serviceReport->subject}}</td>
                    <td>{{ $serviceReport->message }}</td>
                </tr>
                @endforeach
            </table>

        </div>
   

        <!-- Fees Section -->
        <div id="fees" class="tab-content">
            <h2 class="fontx">Student Fees</h2>
            <table>
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
                        <td>{{ $student->id }}</td>
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
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('upload.payment') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" required>
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
            {{-- <form action="{{ route('admin.panel') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request('name') }}">
                    
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                    
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="submit">Search</button>
                    </div>
                </div>
            </form> --}}

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            

            <table id="example" class="table table-bordered mt-3">
                <thead>
                    <th>Name</th>
                    <th>Payment Receipt</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                
                <tbody>
                @forelse ($paymentReceipts as $paymentReceipt)
                <tr>
                    
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
                @empty
                <tr>
                    <td colspan="3">No payments found.</td>
                </tr>
                @endforelse
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
            labels: ['Total Rooms', 'Occupied Rooms', 'Empty Rooms'],
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
</script>

</body>
</html>