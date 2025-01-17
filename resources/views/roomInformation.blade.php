<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #11113c;
            color: #333;
            font-family: 'Times New Roman';
        }
        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .sidebar {
            width: 20%;
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            height: 629px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 30px;
        }
        .sidebar img {
            border-radius: 50%;
            margin-bottom: 15px;
        }
         .sidebar .tab {
            display: block;
            padding: 10px;
            background-color: #11113c;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            color: #000;
            margin-bottom: 10px;
            font-size: 17px;
        }
         .tab:hover {
             background-color: #5b6ec4;
             border-left: 4px solid #333;
         }
 
         .sidebar .tab.active {
             background-color: #5b6ec4;
             border-left: 4px solid #333;
         }
         .content-container {
             width: 65%;
             margin-left: 40px;
             padding: 30px;
             background-color: #ffffff;
             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
             font-size: 17px;
             margin-top: 30px;
         }
         .tab-content {
             display: none;
         }

         .tab-content h2 {
             color: #333;
             font-size: 24px;
             margin-bottom: 15px;
         }
 
         .tab-content p {
             color: #666;
             font-size: 16px;
             margin-bottom: 20px;
         }
         .room-card {
             -lex-direction:ow;
             align-items: flex-start;
             background-color: #fff;
             padding: 20px;
             border-radius: 8px;
             margin-bottom: 15px;
         }
         .room-details {
             flex: 1;
             padding: 10px;
         }
         .room-details h3 {
             color: #11113c;
             font-size: 20px;
             margin-bottom: 10px;
         }
         .room-details p {
             color: #666;
             font-size: 16px;
             margin-bottom: 8px;
         }
         .room-details ul {
             list-style-type: disc;
             margin: 0;
             padding-left: 20px;
         }
         .room-details ul li {
             font-size: 15px;
             color: #555;
         }
         .buttons {
             display: flex;
             justify-content: space-between;
             margin-top: 20px;
         }
         .buttons button {
             padding: 10px 15px;
             border: none;
             border-radius: 4px;
             cursor: pointer;
             font-size: 16px;
             color: #fff;
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
         }
         button {
             margin-top: 15px;
             padding: 10px 15px;
             border: none;
             border-radius: 4px;
             cursor: pointer;
             background-color: #11113c;
             color: #fff;
         }
         table {
             width: 100%;
             margin-top: 20px;
             border-collapse: collapse;
         }
         table, th, td {
             border: 1px solid #ddd;
         }
         th, td {
             padding: 12px;
             text-align: left;
         }
         th {
             background-color: #11113c;
             color: white;
         }
         a {
             text-decoration: none;
             color: white;
         }
         .addimg{
             width: 100px;
             height: 100px;
             position: relative;
             border: 3px solid #11113c;
             top: 0;
             left: 0;
             margin: auto;
             z-index: 100;
             position: relative;
             background: white;
         }
         .addimg img{
             width: 100%;
             height: 100%;
             border-radius: 1px;
         }
         
 
         #signOutLink {
             color: white;
             text-decoration: none;
             font-weight: bold;
             font-size: 17px;
             padding: 10px;
             background-color: #11113c;
             border-radius: 5px;
             text-align: center;
             margin-bottom: 10px;
             width: 100%;
             font-family: 'Times New Roman';
         }
         #signOutLink:hover {
             background-color: #9bdfff;
             border-left: 4px solid #333;
         }
     </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="a">
            <div class="addimg">
                <img src="{{ $image = $user->student && $user->student->image 
                ? asset('storage/' . $user->student->image) 
                : asset('images/png-clipart-avatar-user-profile-icon-women-wear-frock-face-holidays-thumbnail.jpg');}}" alt="Image not found" id="output" name="1">
                    {{-- <img src="{{ asset('storage/' . Auth::user()->student->image); }}" alt="nofound" id="output" name="1"> --}}
            </div>
            
        
        <h3>Welcome, {{ Auth::user()->name }}</h3>
        <p>Email: {{ Auth::user()->email }}</p>
            <div>
                <div class="tab"><a href="/userProfile" onclick="reloadPage()">Profile</a></div>
                <div class="tab active"><a href="/roomInformation" onclick="reloadPage()">Room Information</a></div>
                <div class="tab"><a href="/hostelFee" onclick="reloadPage()">Payment Receipt</a></div>
                {{-- <div class="tab"><a href="/reminderFee" onclick="reloadPage()">Reminder Fee</a></div> --}}
                <div class="tab"><a href="/rule" onclick="reloadPage()">Rules</a></div>
                <div class="tab"><a href="/serviceReport" onclick="reloadPage()">Service Report</a></div>
                <div class="tab"><a href="/historySR" onclick="reloadPage()">History Service Report</a></div>
            </div>
        </div>        
               <br><br><br><br>
               <form id="logout-form" action="{{ route('signOut') }}" method="POST" style="display: inline;"  onsubmit="return confirm('Are you sure to logout??');">
                    @csrf
                    <button type="submit"  id="signOutLink" style="height:40px;">Sign Out</button>
                </form>             
        </div>

        <!-- Content Container -->
        <div class="content-container">
                <h2>Room Information</h2>
                  <div class="table-section">
                      <h2>Room Information Table</h2>
                      <table id="roomTable">
                          <thead>
                            <tr>
                                <th>Address</th>
                                <th>Room Name</th>
                                <th>Furniture</th>
                                <th>Room Fee</th>
                                {{-- <th>Roommates</th> --}}
                            </tr>
                          </thead>
                          <tbody id="roomTableBody">
                            <tr>
                                <td>{{ $students->student->address->address_name }} {{ $students->student->address->address }}</td>
                                <td>{{ $students->student->room->room_name }}</td>
                                <td>
                                    @foreach(json_decode($students->student->room->furniture) as $furniture)
                                        <i class="fas fa-check-square" style="color: #ff9999;"></i> {{ $furniture }}<br>
                                    @endforeach
                                </td>                                
                                <td>{{ $students->student->room->room_fee }}</td>
                                {{-- <td>{{ $students->student->address->address }}</td> --}}
                            </tr>
                          </tbody>
                      </table>
                  </div>
              </div>  
        </div>
    </div>
</body>

<script>
    // Confirm before sign out
    document.getElementById('signOutButton').addEventListener('click', function() {
        if (confirm('Are you sure you want to sign out?')) {
            document.getElementById('logout-form').submit(); // Submit the logout form
        }
    });
</script>

<script>
    function reloadPage() {
        location.reload();
    }
</script>
</html>