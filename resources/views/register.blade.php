<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            margin-top: 40px;
            font-family: sans-serif;
            background-color: #f8f9fa;
        }
        .box {
            width: 500px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid black;
            padding: 5px;
            font-family: sans-serif;
        }
        .space {
            margin: 10px 0;
            text-align: center;
        }
        input {
            font-size: 15px;
        }
        h1 {
            margin: 10px 0;
        }
        button {
            width: 250px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #0f153a; 
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
            margin-bottom: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        button:hover {
            background-color: #fcff61;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .clear-button {
            background-color: #dc3545;
            color: white;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .clear-button:hover {
            background-color: #c82333;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .small-grey-text {
            font-size: 0.9em;
            color: #6c757d;
            display: block;
            margin-bottom: 5px;
        }
        .options {
            text-align: center;
        }
    </style>
</head>
<body>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnBKvfIJGpqKsp0RvIiV0T1CJn4wPiu48d7g&s" alt="Logo">

    <h1>Register</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <form method="POST" action="{{ route('adduser') }}">
        @csrf
        <div class="space">
            <input class="box" type="text" name="name" id="name" placeholder="Full Name" required><br>
        </div>

        @error('name')
            {{ $message }}
        @enderror
    
        <div class="space">
            <input class="box" type="email" name="email" id="email" placeholder="Email" required><br>
        </div>

        @error('email')
            {{ $message }}
        @enderror
         
        <div class="space">
            <input class="box" type="password" name="password" id="password" placeholder="Password" required><br>
        </div>

        @error('password')
            {{ $message }}
        @enderror

        <div class="space">
            <input class="box" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required><br>
        </div>

        @error('password_confirmation')
            {{ $message }}
        @enderror

        <div class="space">
            <input class="box" type="text" name="phone_number" id="phone_number" placeholder="Phone Number" required><br>
        </div>

        @error('phone_number')
            {{ $message }}
        @enderror

        <input type="hidden" name="role" value="user">
        
        <div class="space">
            <button type="submit">Register</button>
        </div>
        <p class="options">
            Already have an account? <a href="/userlogin">Login</a>
        </p>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <span class="small-grey-text" style="margin-top: 50px;">Synergy College</span>
    <span class="small-grey-text">32 & 34, Jalan Perai Jaya 4, Bandar Perai Jaya, 13600 Perai, Pulau Pinang</span>

</body>
</html>
