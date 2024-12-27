<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        function closeAlert() {
            document.getElementById('custom-alert').style.display = 'none';
        }
    </script>

    <style>
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
             align-items: center;00
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
             border-color: #11113c;
 
         }
         #contact-form textarea {
             resize: vertical;
             min-height: 100px;
             font-style: italic;
             font-family: sans-serif;
         }
         #form-submit {
            background-color: #11113c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            }

        #form-submit:hover {
            background-color: #ea232e;
            transform: scale(1.05);
        }

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

        @media (max-width: 768px) {
            #contact-form {
                padding: 15px;
            }
            #form-submit {
                width: 100%;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }
        }
     </style>
</head>
<body>

            @if(session('success'))
                <div id="alertBox" class="green-alert" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
                </div>
                <!-- Forget the session after it's displayed -->
                {{ session()->forget('success') }}
            @endif
            
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="a">
                <div class="addimg">
                    <img src="{{ $image = $user->student && $user->student->image 
                    ? asset('storage/' . $user->student->image) 
                    : asset('images/png-clipart-avatar-user-profile-icon-women-wear-frock-face-holidays-thumbnail.jpg');}}" alt="Image not found" id="output" name="1">
                    {{-- <img src="{{ asset('storage/' . Auth::user()->student->image); }}" alt="nofound" id="output" name="1"> --}}
            </div>
            <h3>Name : {{ Auth::user()->name }}</h3>
            <p>Email : {{ Auth::user()->email }}</p>
            <div>
                <div class="tab"><a href="/userProfile" onclick="reloadPage()">Profile</a></div>
                <div class="tab"><a href="/roomInformation" onclick="reloadPage()">Room Information</a></div>
                <div class="tab"><a href="/hostelFee" onclick="reloadPage()">Payment Receipt</a></div>
                {{-- <div class="tab"><a href="/reminderFee" onclick="reloadPage()">Reminder Fee</a></div> --}}
                <div class="tab"><a href="/rule" onclick="reloadPage()">Rules</a></div>
                <div class="tab active"><a href="/serviceReport" onclick="reloadPage()">Service Report</a></div>
                <div class="tab"><a href="/historySR" onclick="reloadPage()">History Service Report</a></div>
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
                <h2>Service</h2>
                <p>Your service information goes here.</p>
                <p>Drop a message here:</p>

                @if(session('success'))
                    <div id="custom-alert" class="green-alert" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close-alert-btn" aria-label="Close" onclick="closeAlert()"></button>
                    </div>
                @endif

                <div class="col-lg-6">
                  <form id="contact-form" action="/store" method="POST">
                    @csrf
                    <div class="row">
                      
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="subject">Subject</label>
                          <input type="subject" name="subject" id="subject" placeholder="Subject...">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <label for="message">Message</label>
                          <textarea id="message" name="message" placeholder="Your Message..." required></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="button">Send Message</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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

<script>
    function closeAlert() {
        document.getElementById('custom-alert').style.display = 'none';
    }
</script>

<script>
    // Set timeout to hide the alert after 8 seconds (8000 milliseconds)
    setTimeout(function() {
        var alertBox = document.getElementById("alertBox");
        alertBox.style.display = "none"; // Hide the alert box
    }, 3000); // 8 seconds
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>