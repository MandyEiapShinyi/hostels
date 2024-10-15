<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
    </style>
</head>
<body>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnBKvfIJGpqKsp0RvIiV0T1CJn4wPiu48d7g&s" alt="Logo">

    <h1>Admin Panel</h1>
    <h1>Login</h1>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('showLoginForm') }}">
        @csrf
        <div class="space">
            <input class="box" type="text" name="username" id="user" placeholder="Username" required><br>
        </div>

        <div class="space">
            <input class="box" type="password" name="password" id="password" placeholder="Password" required><br>
        </div>

        <div class="space">
            <button type="submit">Login</button>
            <button type="reset" class="clear-button">Clear</button>
        </div>
    </form>
    
    <span class="small-grey-text" style="margin-top: 50px;">Synergy College</span>
    <span class="small-grey-text">32 & 34, Jalan Perai Jaya 4, Bandar Perai Jaya, 13600 Perai, Pulau Pinang</span>
</body>
</html>
