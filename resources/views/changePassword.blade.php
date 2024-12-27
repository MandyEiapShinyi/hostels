      @if(session('success'))
      <div id="custom-alert" class="green-alert" role="alert">
          {{ session('success') }}
          <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
      </div>
      @endif
      
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            background-color: #e0f0ff;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Allows stacking items vertically */
            height: 100vh;
            margin: 0;
        }

        h2.welcome-message {
            margin-bottom: 20px;
            color: #4a5aa8;
        }

        .password-reset-container {
            background-color: #ffffff;
            width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .password-reset-container h2 {
            margin-bottom: 20px;
            color: #4a5aa8;
        }

        .password-reset-container .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .password-reset-container .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .password-reset-container .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .password-reset-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4a5aa8;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .password-reset-container button:hover {
            background-color: #3a4a8a;
            transform: translateY(4px);
            border: none;
            border-radius: 4px;
            color: white;
        }

        .buttons {
            margin: auto;
        }

        .buttons button {
            width: 48%;
        }

        /* Key icon styling */
        .icon {
            display: block;
            margin: 0 auto 20px;
        }

        .green-alert {
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            padding: 20px;
            border-radius: 5px; /* Rounded corners */
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional shadow */
            position: relative;
            text-align: center; /* Center text */
        }

        .close-alert-btn {
            background-color: transparent; /* No background */
            border: none; /* No border */
            color: white; /* White 'X' */
            font-size: 16px; /* Slightly larger 'X' */
            position: absolute; /* Position the button at the top-right */
            top: -3px;
            right: 15px;
            cursor: pointer; /* Pointer cursor for the button */
        }

        .close-alert-btn:hover {
            color: #ccc; /* Lighten the color on hover */
        }

        /* Media query for mobile responsiveness */
        @media (max-width: 768px) {
            .password-reset-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Welcome message outside the container -->
    <h2 class="welcome-message">Welcome, {{ Auth::user()->name }}</h2>

    <div class="password-reset-container">
        <!-- Key Icon -->
        <img src="https://img.icons8.com/ios-filled/50/4a5aa8/key.png" alt="key icon" class="icon"/>

        <h2>Reset Password</h2>
        <form action="{{ route('changePassword') }}" method="POST" class="password-form">
            @csrf
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>

            <div class="buttons">
                <button type="submit">Change Password</button>
            </div>
        </form>
    </div>

</body>
</html>
