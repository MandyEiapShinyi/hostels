<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        a {
            text-decoration: none;
            color: white;
        }
        .addimg{
            width: 100px;
            height: 100px;
            position: relative;
            /* border-radius: 5%; */
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
            /* border-radius: 50%; */
            /* border: 5px solid black; */
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
                <img src="{{ $image = $user->student && $user->student->image 
                ? asset('storage/' . $user->student->image) 
                : asset('images/png-clipart-avatar-user-profile-icon-women-wear-frock-face-holidays-thumbnail.jpg');}}" alt="Image not found" id="output" name="1">
                    {{-- <img src="{{ asset('storage/' . $user->student->image); }}" alt="nofound" id="output" name="1"> --}}
            </div>

            <h3>Name : {{ Auth::user()->name }}</h3>
            <p>Email : {{ Auth::user()->email }}</p>
            <div>
                {{-- <input type="file" id="imageUpload" accept="image/*"><br><br> --}}
                <div class="tab"><a href="/userProfile" onclick="reloadPage()">Profile</a></div>
                <div class="tab"><a href="/roomInformation" onclick="reloadPage()">Room Information</a></div>
                <div class="tab"><a href="/hostelFee" onclick="reloadPage()">Payment Receipt</a></div>
                {{-- <div class="tab"><a href="/reminderFee" onclick="reloadPage()">Reminder Fee</a></div> --}}
                <div class="tab active"><a href="/rule" onclick="reloadPage()">Rules</a></div>
                <div class="tab"><a href="/serviceReport" onclick="reloadPage()">Service Report</a></div>
                <div class="tab"><a href="/historySR" onclick="reloadPage()">History Service Report</a></div>
            </div>
        </div>        
               <br><br><br><br>
               <form id="logout-form" action="{{ route('signOut') }}" method="POST" style="display: inline;"  onsubmit="return confirm('Are you sure to logout??');">
                    @csrf
                    <button type="submit"  id="signOutLink" style="margin-top:15px;height:40px;">
                        <i class="fas fa-sign-out-alt"></i> Sign Out
                    </button>
                </form>             
        </div>

        <!-- Content Container -->
        <div class="content-container">
            <div style="max-width: 600px; padding: 20px;">
                <h3 style="font-size: 20px; color: #5b6ec4;  text-align: center;">
                  Policy and Notices
                </h3>
                
                <p style="font-size: 15px; color: #555; line-height: 1.5;">
                  At the time, students are required to follow the following rules:
                </p>
                
                <p style="font-size: 15px; color: #444; line-height: 1.5; padding-left: 40px; margin-bottom: 30px;">
                 1. Entering someone else’s room without permission is strictly prohibited to respect their privacy. <br>
                 2. Keep the Room Clean <br>
                 3. No Going Out After 10 PM <br>
                 4. No Bringing Outsiders into Your Room <br>
                 5. Pay Hostel Fees on Time for 6 months<br>
                </p>
              
                <h4 style="font-size: 18px; color: #5b6ec4; margin-bottom: 10px;">General Conduct</h4>
                <p style="font-size: 15px; color: #555; line-height: 1.5; margin-bottom: 20px;">
                  - Respect fellow residents, staff, and college property.<br>
                  - Avoid disruptive activities that may disturb others.<br>
                  - Maintain cleanliness in common areas and your own room.
                </p>
                
                <h4 style="font-size: 18px; color: #5b6ec4; margin-bottom: 5px;">Safety and Security</h4>
                <p style="font-size: 15px; color: #555; line-height: 1.5;">
                  - Keep your room keys secure and report any loss immediately.<br>
                  - Do not allow unauthorized visitors into the hostel premises.
                </p>
                <h4 style="font-size: 18px; color: #5b6ec4; margin-bottom: 5px;">Complain and Grievance Process</h4>
                <p style="font-size: 15px; color: #555; line-height: 1.5;">
                  Any issues or complaints can be raised with the hostel warden or management.<br>
                </p>
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