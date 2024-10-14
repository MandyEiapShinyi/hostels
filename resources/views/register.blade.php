<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/adduser" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" id="name" name="name" required placeholder="Name">
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" required placeholder="Email">
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" required placeholder="Password">
            </div>
            <button type="submit" class="login-btn">Sign Up</button>
            <p class="options">
                Already have an account? <a href="/login">Login</a>
            </p>
        </form>
    </div>
</body>
</html>

<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #eaf7ff;
}

.login-container {
    width: 100%;
    max-width: 350px;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 25px;
    font-family: 'Times New Roman', Times, serif;
}

.alert {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
}

.input-group {
    margin-bottom: 15px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 90%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    outline: none;
}

input[type="text"]::placeholder,
input[type="email"]::placeholder,
input[type="password"]::placeholder {
    color: #bbb;
}

.login-btn {
    width: 90%;
    padding: 12px;
    background-color: #4a73f3;
    color: #ffffff;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-transform: uppercase;
}

.login-btn:hover {
    background-color: #2554ef;
}

.options {
    margin-top: 15px;
    font-size: 13px;
}

.options a {
    color: #4a73f3;
    text
