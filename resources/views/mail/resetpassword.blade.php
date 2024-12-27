<style>
    .green-alert {
            background-color: #a4daa6; /* Green background */
            color: white; /* White text */
            padding: 20px;
            border-radius: 5px; /* Rounded corners */
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional shadow */
            position: absolute ;
            right: 0;
            text-align: center; /* Center text */
            width: 300px;
            height: 13px;
            color: #000;
            margin-top: 10px;
            margin-right: 5px;
            
        }

        .close-alert-btn {
            background-color: transparent; /* No background */
            border: none; /* No border */
            color: white; /* White 'X' */
            font-size: 16px; /* Slightly larger 'X' */
            position: absolute; /* Position the button at the top-right */
            top: px;
            right: 15px;
            cursor: pointer; /* Pointer cursor for the button */
            color: #000;
        }

        .close-alert-btn:hover {
            color: #ccc; /* Lighten the color on hover */
        }
</style>

@if(session('success'))
    <div id="alertBox" class="green-alert" role="alert">
        {{ session('success') }}
        <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
    </div>
    <!-- Forget the session after it's displayed -->
    {{ session()->forget('success') }}
@endif

<div>
    <p>click the following link to reset password</p>
    <a href="{{ route('showChangePasswordForm', ['token' => csrf_token()]) }}">Go to Change Password Page</a>
</div>

<script>
    // Set timeout to hide the alert after 8 seconds (8000 milliseconds)
    setTimeout(function() {
        var alertBox = document.getElementById("alertBox");
        alertBox.style.display = "none"; // Hide the alert box
    }, 3000); // 8 seconds
</script>

<script>
    function closeAlert() {
        document.getElementById('custom-alert').style.display = 'none';
    }
</script>
