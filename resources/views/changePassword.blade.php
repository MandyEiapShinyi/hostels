<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
    background-color: #0A0A35;
    color: #333;
    font-family: 'Times New Roman';
    }

    .container {
        display: flex;
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
        justify-content: center;
        flex-wrap: wrap;
        color: white;
    }

    .content-container {
        width: 100%; /* Set to full width for smaller screens */
        max-width: 600px; /* Limit max width for readability */
        margin-left: auto;
        margin-right: auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        border-color: #0A0A35;
    }

    .buttons button {
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        color: #fff;
    }

    button {
        margin-top: 15px;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        background-color: #0A0A35;
        color: #fff;
    }

    /* Media query for smaller screens (phones) */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            align-items: center;
        }

        .content-container {
            width: 90%; /* Full width for small screens with some padding */
            margin: 0 auto;
            padding: 20px;
        }

        .form-group input {
            max-width: none; /* Remove max-width for mobile */
        }
    }

    </style>
</head>
<body>
    <div class="container">
        
            <h2>Welcome {{ Auth::user()->name }}</h2>
    </div>

        <!-- Content Container -->
        <div class="content-container">
            <h2>Change Password</h2>
            <form action="{{ route('changePassword') }}" method="POST" class="password-form">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password :</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>
            
                <div class="form-group">
                    <label for="new_password">New Password :</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
            
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password :</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
            
                <button type="submit" class="save-button">Update Password</button>
                {{-- <button type="button" onclick="window.location.href='/userProfile'">Back</button> --}}
            </form>
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