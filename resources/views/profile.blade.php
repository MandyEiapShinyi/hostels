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
        .active {
            background-color: lightgrey;
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
        .content-container {
            width: 65%;
            margin-left: 40px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-size: 17px;
            margin-top: 30px;
        }
        .content h5 {
            font-size: 18px;
            font-weight: bold;
            color: #5b6ec4;
            margin-bottom: 10px;
            font-family: 'Times New Roman';
        }

        .content h5 span {
            font-size: 15px;
            font-weight: 400;
            color: #888;
            display: block;
            margin-top: 5px;
        }
        .content p {
            margin: 5px 0;
            font-size: 17px;
            color: #555;
        }
        .content {
            margin-left: 100px;
        }
        .save-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5b6ec4;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .save-button:hover {
            background-color: #4a5aa8;
        }
        .alert {
            background-color: #ffeeba;
            color: #856404;
            padding: 10px;
            margin-top: 15px;
            border: 1px solid #ffeeba;
            border-radius: 5px;
            font-size: 14px;
        }
        .edit-button,
        .save-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #11113c;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Add transition */
        }

        .edit-button:hover,
        .save-button:hover {
            background-color: #ea232e;
            transform: scale(1.05); /* Add a slight scaling effect on hover */
        }
        
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="a">
            {{-- <div  class="addimg">
                <img src="maidsimg/user.jpg" alt="" id="output" name="1">
                <div class="input-div">
                    <input class="input" name="img" value="{{old('img')}}" type="file" onchange="loading(this)">
                    <i class="fa fa-cloud-upload icon" aria-hidden="true"></i>
                </div>
            </div> --}}
            
            <div class="addimg">
                {{-- @if($student->image) --}}
                <img src="{{ $image = $user->student && $user->student->image 
                    ? asset('storage/' . $user->student->image) 
                    : asset('images/png-clipart-avatar-user-profile-icon-women-wear-frock-face-holidays-thumbnail.jpg');}}" alt="Image not found" id="output" name="1">
                {{-- @else --}}
                    {{-- No Image --}}
                {{-- @endif --}}
            </div>

            <h3>Name : {{ Auth::user()->name }}</h3>
            <p>Email : {{ Auth::user()->email }}</p>
            <div>
                <div class="tab active"><a href="/userProfile" onclick="reloadPage()">Profile</a></div>
                <div class="tab "><a href="/roomInformation" onclick="reloadPage()">Room Information</a></div>
                <div class="tab"><a href="/hostelFee" onclick="reloadPage()">Hostel Fee</a></div>
                <div class="tab"><a href="/rule" onclick="reloadPage()">Rules</a></div>
                <div class="tab"><a href="/serviceReport" onclick="reloadPage()">Service Report</a></div>
                <div class="tab"><a href="/historySR" onclick="reloadPage()">History Service Report</a></div>
            </div>
        </div>
                <br><br><br><br>
               <form id="logout-form" action="{{ route('signOut') }}" method="POST" style="display: inline;"  onsubmit="return confirm('Are you sure to logout??');">
                    @csrf
                    <button type="submit"  id="signOutLink" style="height:40px;margin-top:15px;">
                        <i class="fas fa-sign-out-alt"></i> Sign Out
                    </button>
                </form>             
        </div>


        <!-- Content Container -->
        <div class="content-container">
            <h1>Profile</h1>
            <div class="content">
                <h5>
                    FULL NAME {{csrf_token()}}<br>
                    <span>You should know your name before you want to change</span>
                    <input id="name" type="text" value="{{ $user->name }}" readonly>
                </h5>

                <h5>
                    EMAIL <br>
                    <span>You should know your email before you want to change</span>
                    <input id="email" type="text" value="{{ $user->email }}" readonly>
                </h5>

                <h5>
                    PHONE NUMBER <br>
                    <span>You should know your phone number before you want to change</span>
                    <input id="phone_number" type="text" value="{{ $user->phone_number }}" readonly>
                </h5>

                <h5>
                    PASSWORD <br>
                    <span>You should know your password before you want to change</span>
                    <input id="password" type="password" value="********" placeholder="Your Password" max='8' readonly>
                    {{-- <p id='charCount'>0</p> --}}
                </h5><br>

                <button class="edit-button" id="edit-button" onclick="enableEdit()">Edit</button>
                <button onclick="saveChanges()" class="save-button" id="save-button" style="display: none;">Back</button>
                <a href="{{route('sendmail')}}" class="save-button" id="change-password" style="display: none; font-family: sans-serif;">Change Password</a>
            </div>
        </div> 
    </body> 

<script>
    function enableEdit() {
        const inputs = document.querySelectorAll('input');

        

        document.getElementById('save-button').style.display = 'inline-block';
        document.getElementById('change-password').style.display = 'inline-block';

        document.getElementById('edit-button').style.display = 'none';
    }

    function saveChanges() {
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phoneNumber = document.getElementById('phone_number').value;

        console.log('Saving changes...');
        console.log({ name, email, phoneNumber });

        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => input.setAttribute('readonly', true));

        document.getElementById('edit-button').style.display = 'inline-block';
        document.getElementById('save-button').style.display = 'none';
        document.getElementById('change-password').style.display = 'none';
    }
</script>
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

<script>
    const password = document.getElementById('password');
    const charCount = document.getElementById('charCount');

    password.addEventListener('input',()=>{
        charCount.textContent = password.value.length;
    });
</script>

</html>