<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #ffb3e8;
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
            width: 25%;
            background-color: #fed2ed;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            height: 610px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar img {
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .sidebar .tab {
            display: block;
            padding: 10px;
            background-color: #ff94d1;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            color: #fff;
            margin-bottom: 10px;
            font-size: 17px;
        }

        .tab:hover {
            background-color: #f77ac9;
            border-left: 4px solid #333;
        }

        .sidebar .tab.active {
            background-color: #f77ac9;
            border-left: 4px solid #333;
        }
        .content-container {
            width: 75%;
            margin-left: 40px;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
            border-color: #ff94d1;

        }
        .save-button {
            background-color: #fcc3ed;
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
        #contact-form {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            font-family: 'Times New Roman';
        }
        #contact-form fieldset {
            border: none;
            margin: 0;
            padding: 0;
        }
        #contact-form label {
            font-weight: bold;
            color: #333;
            font-family: sans-serif;
            font-size: 14px;
            padding: 20px;
            font-family: times new roman;
        }
        #contact-form input[type="text"],
        #contact-form input[type="name"],
        #contact-form input[type="subject"],
        #contact-form textarea {
            width: 60%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
            font-style: italic;
            border-color: #ff94d1;

        }

        #contact-form textarea {
            resize: vertical;
            min-height: 100px;
            font-style: italic;
            font-family: sans-serif;
        }
        #form-submit {
          background-color: #fcc3ed;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          margin-top: 20px;
        }
        @media (max-width: 768px) {
            #contact-form {
                padding: 15px;
            }
            #form-submit {
                width: 100%;
            }
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
          color: #ff94d1;
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
      /* .room-card label {
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
      }
      .room-card input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
      }
      .room-card button {
            margin-top: 15px;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
      } */
      .delete-button {
            background-color: #fcc3ed;
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
            color: #ff94d1;
            font-size: 20px;
            margin-bottom: 10px;
      }
      button {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #fcc3ed;
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
            background-color: #fcc3ed;
            color: white;
      }

      a {
        text-decoration: none;
        color: white;
      }

      /* a:hover {
        background-color: #f77ac9;
        border-left: 4px solid #333;
      } */

      .addimg{
        width: 100px;
        height: 100px;
        position: relative;
        border-radius: 5%;
        border: 5px solid #fb8add;
        /* transform: translateY(-35px) translateX(-35px); */
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
        display: inline-block;
        padding: 10px;
        background-color: #ff94d1;
        border-radius: 5px;
        text-align: center;
        margin-bottom: 10px;
        /* justify */
        width: 100%;
        /* height: 30px;  */
    }

    #signOutLink:hover {
        background-color: #f77ac9;
        border-left: 4px solid #333;
    }

    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="a">
            <div  class="addimg">
                <img src="maidsimg/user.jpg" alt="" id="output" name="1">
                <div class="input-div">
                    <input class="input" name="img" value="{{old('img')}}" type="file" onchange="loading(this)">
                    <i class="fa fa-cloud-upload icon" aria-hidden="true"></i>
                </div>
            
        </div>
            <h3>Name : {{ Auth::user()->name }}</h3>
            <p>Email : {{ Auth::user()->email }}</p>
            <div>
                {{-- <input type="file" id="imageUpload" accept="image/*"><br><br> --}}
                <div class="tab"><a href="/userProfile" onclick="reloadPage()">Profile</a></div>
                <div class="tab"><a href="/roomInformation" onclick="reloadPage()">Room Information</a></div>
                <div class="tab"><a href="/hostelFee" onclick="reloadPage()">Hostel Fee</a></div>
                <div class="tab"><a href="/serviceReport" onclick="reloadPage()">Service Report</a></div>
            </div>
        </div>
               <form id="logout-form" action="{{ route('signOut') }}" method="POST" style="display: inline;"  onsubmit="return confirm('Are you sure to logout??');">
                    @csrf
                    <button type="submit"  id="signOutLink">
                        <i class="fas fa-sign-out-alt"></i> Sign Out
                    </button>
                </form>             
        </div>

        <!-- Content Container -->
        <div class="content-container">
            <h2>Profile Settings</h2>
            <p>Full Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Phone Number: {{ $user->phone_number }}</p>
            <p>Password: ********</p>
            <a href="{{route('sendmail')}}" class="save-button">Change Password</a>
            
            @if(session('status'))
                <div class="alert">{{ session('status') }}</div>
            @endif
            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        </div>
    </div>
</body>

<script>
    function loading(event){
            let output=document.getElementById('output');
            console.log(event.files);
            
            const imageUrl = URL.createObjectURL(event.files[0]);
            output.src = imageUrl;
            localStorage.setItem('imageSrc', imageUrl);


        }

        window.onload = function() {
            let savedImageSrc = localStorage.getItem('imageSrc');
            console.log(savedImageSrc);
            if (savedImageSrc) {
                document.getElementById('output').src = savedImageSrc;
            }
        };
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
</html>