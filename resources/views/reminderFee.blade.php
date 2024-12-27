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
         .tab-content.active {
             display: block;
         }
         .form-group {
             margin-bottom: 15px;
         }
         .form-group label {
             font-weight: bold;
             padding: 20px;
         }
         .form-group input {
             font-style: italic;
             width: 100%;
             max-width: 500px;
             padding: 10px;
             border: 1px solid #ccc;
             border-radius: 4px;
             border-color: #11113c;
 
         }
         .save-button {
             background-color: #11113c;
             color: #fff;
             padding: 10px 20px;
             border: none;
             border-radius: 4px;
             cursor: pointer;
             margin-top: 20px;
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
         .delete-button {
             background-color: #11113c;
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
         .input-div {
             position: absolute;
             width: 100px;
             height: 100px;
             display: flex;
             justify-content: center;
             align-items: center;
             overflow: hidden;
             top: 0;
             left: 0;
             background: rgba(255, 255, 255, 0.5);
             opacity: 0;
             transition: 1s;
         }
         .input-div:hover{
             opacity: 10;
         }
         .icon {
             color: lightpink;
             font-size: 2rem;
             cursor: pointer;  
             font-weight: 600;
         }
         .input {
             position: absolute;
             opacity: 0;
             width: 100%;
             height: 100%;
             cursor: pointer !important;
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
             background-color: #5b6ec4;
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
                    <img src="{{ asset('storage/' . Auth::user()->student->image); }}" alt="nofound" id="output" name="1">
            </div>
            
        
        <h3>Welcome, {{ Auth::user()->name }}</h3>
        <p>Email: {{ Auth::user()->email }}</p>
            <div>
                <div class="tab"><a href="/userProfile" onclick="reloadPage()">Profile</a></div>
                <div class="tab"><a href="/roomInformation" onclick="reloadPage()">Room Information</a></div>
                <div class="tab"><a href="/hostelFee" onclick="reloadPage()">Payment Receipt</a></div>
                {{-- <div class="tab"><a href="/reminderFee" onclick="reloadPage()">Reminder Fee</a></div> --}}
                <div class="tab"><a href="/rule" onclick="reloadPage()">Rules</a></div>
                <div class="tab"><a href="/serviceReport" onclick="reloadPage()">Service Report</a></div>
                <div class="tab active"><a href="/historySR" onclick="reloadPage()">History Service Report</a></div>
            </div>
        </div>
               <br><br><br><br>
               <form id="logout-form" action="{{ route('signOut') }}" method="POST" style="display: inline;"  onsubmit="return confirm('Are you sure to logout??');">
                    @csrf
                    <button type="submit"  id="signOutLink">Sign Out</button>
                </form>             
        </div>

        <!-- Content Container -->
        <div class="content-container">
            <h2>History Service Report</h2>
              <div class="table-section">
                  <h2>History Service Report Table</h2>
                  <table id="example1" class="table table-bordered mt-3">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($serviceReports as $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $service->subject }}</td>
                            <td>{{ $service->message }}</td>
                            <td>
                                @if($service->is_serviced == 1)
                                <div class="alert alert-success" style="padding: 10px;color:green;">
                                    Service is completed successfully.
                                </div>
                                @else
                                <div class="alert alert-danger" style="padding: 10px;color:red;">
                                    Service is pending or not completed.
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
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