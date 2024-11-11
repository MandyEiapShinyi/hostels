
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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 200px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .tab {
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            background-color: lightblue;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: black;
        }

        .tab:hover {
            background-color: #f7e91d;
        }

        .tab.active {
            background-color: #f9ffab;
            border-left: 4px solid #333;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: white;
            overflow-y: auto;
        }

        .tab-content {
            display: none;
            
        }

        .tab-content.active {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        button {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #fcff61;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #f7e91d;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .fontx {
            color: black;
        }

        .small-grey-text {
            font-size: 0.9em;
            color: #6c757d;
            display: block;
            text-align: center
        }

        /* Modal container */
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

        /* Modal content (remove the margin) */
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
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-submit:hover {
            background-color: yellow;
            color: black;
        }
        
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnBKvfIJGpqKsp0RvIiV0T1CJn4wPiu48d7g&s" alt="Logo" style="width: 100%; margin-bottom: 20px;">
        <span class="small-grey-text">Welcome, Administrator</span>
        <h2>Admin Panel</h2>

        <a class="tab active" onclick="showTab('home')">
            <i class="fas fa-home"></i> Dashboard</a>

        <a class="tab" onclick="showTab('users')">
            <i class="fas fa-user-graduate"></i> Student</a>

        <a class="tab" onclick="showTab('data')">
            <i class="fas fa-bed"></i> Room</a>

        <a class="tab" onclick="showTab('furniture')">
            <i class="fa-solid fa-couch"></i> Furniture</a>

        <a class="tab" onclick="showTab('feedback')">
            <i class="fas fa-comments"></i> Feedback</a>
        
        <a class="tab" onclick="showTab('settings')">
            <i class="fas fa-cog"></i> Settings</a>

        <a class="tab" onclick="showTab('signOut')">
            <i class="fas fa-sign-out-alt"></i> Sign Out</a>
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
                <div style="background-color: #fcff61; padding: 20px; border-radius: 10px; flex: 1; text-align: center;">
                    <h3>Total Rooms</h3>
                    <p style="font-size: 30px;">{{ $totalRooms}}</p>
                </div>
                <div style="background-color: #ffecb3; padding: 20px; border-radius: 10px; flex: 1; text-align: center;">
                    <h3>Available Rooms</h3>
                    <p style="font-size: 30px;">{{ $totalPersonQuantity }}</p>
                </div>
                <div style="background-color: #c3f4ff; padding: 20px; border-radius: 10px; flex: 1; text-align: center;">
                    <h3>Pending Requests</h3>
                    <p style="font-size: 30px;">15</p>
                </div>
                <div style="background-color: #ffb3b3; padding: 20px; border-radius: 10px; flex: 1; text-align: center;">
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
            

            {{-- <!-- Tasks Progress -->
            <div style="margin-top: 40px; display: flex; justify-content: space-between;">
                <div style="flex: 1; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                    <h3 class="fontx">Tasks</h3>
                    <div style="display: flex; justify-content: center; align-items: center; height: 150px;">
                        <div style="position: relative; width: 100px; height: 100px; background-color: #f4f4f4; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                            <span style="font-size: 25px;">70%</span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Manage Users Section -->
        <div id="users" class="tab-content">
            <h2 class="fontx">Address</h2>
            <p>Choose Address To Add A New Student</p>

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
                                <label for="student_name" class="form-label">Student Name</label>
                                <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Name" required>
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
            
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Address ID</th>
                    <th>Room Name</th>
                    <th>Student Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->address_id }}</td>
                    <td>{{ $student->room->room_name ?? 'N/A' }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>{{ $student->email }}</td>
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

        <!-- Settings Section -->
        <div id="settings" class="tab-content">
            <h2 class="fontx">Settings</h2>
            <p>System-wide settings can be managed here.</p>

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
                    '#FFFF99',
                    '#FF9999',
                    '#FFEB99'
                ],
                borderColor: [
                    '#F7E277',
                    '#F38C8C',
                    '#F8DC77'
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
</body>
</html>