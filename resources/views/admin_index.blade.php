<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            background-color: #fcff61;
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
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnBKvfIJGpqKsp0RvIiV0T1CJn4wPiu48d7g&s" alt="Logo" style="width: 100%; margin-bottom: 20px;">
        <span class="small-grey-text">Welcome, Administrator</span>
        <h2>Admin Panel</h2>

        <a class="tab active" onclick="showTab('home')">
            <i class="fas fa-home"></i> Home</a>

        <a class="tab" onclick="showTab('admin')">
            <i class="fas fa-user-shield"></i> Admin</a>

        <a class="tab" onclick="showTab('users')">
            <i class="fas fa-user-graduate"></i> Student</a>

        <a class="tab" onclick="showTab('data')">
            <i class="fas fa-bed"></i> Room</a>

        <a class="tab" onclick="showTab('feedback')">
            <i class="fas fa-comments"></i> Feedback</a>

        <a class="tab" onclick="showTab('settings')">
            <i class="fas fa-cog"></i> Settings</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Admin Panel - Manage System</h1>

        <!-- Home Section -->
        <div id="home" class="tab-content active">
            <h2 class="fontx">Welcome to Synergy College Hostel Admin Panel</h2>
            <p>We are excited to have you in our administration panel. Here, you can manage users, view data, and change settings effectively.</p>
        </div>

        <div id="admin" class="tab-content">
            <h2 class="fontx">Admin Management</h2>
            <p>Name: Siti</p>
            <p>Email: 0d6o6@example.com</p>
            <p>Role: Admin</p>
            <p>Status: Active</p>
            <p>Last Login: 2022-01-01</p>
            <p>Last Logout: 2022-01-01</p>
            <p>Contact Number: 0123456789</p>
        </div>

        <!-- Manage Users Section -->
        <div id="users" class="tab-content">
            <h2 class="fontx">Manage Student</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                {{-- @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->room }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin_users_delete', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
            </table>

            <button onclick="window.location='{{ route('admin_users_add') }}'">Add New User</button>
        </div>

        <!-- Manage Data Section -->
        <div id="data" class="tab-content">
            <h2 class="fontx">Manage Room</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
                {{-- @foreach ($data as $datum)
                    <tr>
                        <td>{{ $datum->id }}</td>
                        <td>{{ $datum->name }}</td>
                        <td>{{ $datum->details }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.data.delete', $datum->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
            </table>

            {{-- <button onclick="window.location='{{ route('admin.data.add') }}'">Add New Data</button> --}}
        </div>

        <!-- Settings Section -->
        <div id="settings" class="tab-content">
            <h2 class="fontx">Settings</h2>
            <p>System-wide settings can be managed here.</p>
            <!-- Settings form or content goes here -->
        </div>
    </div>

    <script>
        function showTab(tabId) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.remove('active'));

            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => tab.classList.remove('active'));

            // Show the selected tab content
            document.getElementById(tabId).classList.add('active');

            // Add active class to the selected tab
            document.querySelector(.tab[onclick="showTab('${tabId}')"]).classList.add('active');
        }
    </script>

</body>
</html>