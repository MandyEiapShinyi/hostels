<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Name</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
        .navbar {
            background-color: #343a40;
        }
        .footer-section .icon i {
            margin-right: 20px;
        } 
        .footer-section .icon a {
            /* white-space: nowrap; */
        }
        .footer-section .bi {
            margin-right: 20px;
        }
        .navbar .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .navbar .nav-link {
            color: rgba(255, 255, 255, 0.7);
        }
        .navbar .nav-link:hover {
            color: white;
        }
        .hero {
            height: 100vh;
            background: url('img/img2.png') no-repeat center center;
            background-size: cover;
            /* filter: brightness(50%); */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            color: rgba(255, 255, 255, 0.8);
        }
        .hero .btn {
            font-size: 1.2rem;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
        }
        .hero .btn:hover {
            background-color: #0056b3;
        }
        .footer {
            background-color: #000;
            color: #fff;
            padding: 40px 0;
            font-family: Arial, sans-serif;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section {
            flex: 1;
            margin: 0 20px;
        }

        .footer-section h2,
        .footer-section h3 {
            color: #fff;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .footer-section p {
            color: #ccc;
            line-height: 1.5;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #fff;
        }

        /* Footer Bottom */
        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            padding: 20px 0;
            border-top: 1px solid #333;
        }

        .footer-bottom-links {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .footer-bottom-links li {
            margin: 0 15px;
        }

        .footer-bottom-links li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom-links li a:hover {
            color: #fff;
        }

        .footer-bottom p {
            color: #ccc;
            margin-bottom: 10px;
        }

        /* Social Icons */
        .social-icons a {
            color: #ccc;
            margin: 0 10px;
            font-size: 1.2em;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #fff;
        }
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
            }

            .footer-section {
                margin: 20px 0;
            }
            .footer-section .icon i  {
                margin-right: 20px;
            }

            .footer-bottom-links {
                flex-direction: column;
            }

            .footer-bottom-links li {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Synergy College</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#rooms">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#guestssay"> What Our Guests Say</a></li>
                    <li class="nav-item"><a class="nav-link" href="#review">Review</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to Hostel Synergy College</h1>
            <p>Your Room</p>
            <a href="/contect" class="btn btn-primary">Your Room</a>
        </div>
    </section>

    <br><br><br><br>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>Information about the hostel, what makes it unique, and why guests will love staying here.</p>
                </div>
                <div class="col-md-6">
                    <img src="" class="img-fluid rounded" alt="Hostel Image">
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms Section -->
    <section id="rooms" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Our Rooms</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://thishotel.com/wp-content/uploads/2019/06/hostel-angelina-dubrovnik.jpg" class="card-img-top" alt="Room 1">
                        <div class="card-body">
                            <h5 class="card-title">Room 1</h5>
                            <p class="card-text">A cozy room with a stunning view.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://t3.ftcdn.net/jpg/05/84/99/30/360_F_584993061_riAhYq4qnZWJkTTjbVRGi6rXO3t2TUYn.jpg" class="card-img-top" alt="Room 2">
                        <div class="card-body">
                            <h5 class="card-title">Room 2</h5>
                            <p class="card-text">Spacious and comfortable.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://t4.ftcdn.net/jpg/05/84/99/29/360_F_584992943_cUAhSPwvRbMZadxy3F5Wd4CF0LA4OocT.jpg" class="card-img-top" alt="Room 3">
                        <div class="card-body">
                            <h5 class="card-title">Room 3</h5>
                            <p class="card-text">Perfect for a peaceful getaway.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="guestssay" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">What Our Guests Say</h2>
            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($reviews as $key => $review)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <p>"{{ $review->message }}"</p>
                            <em>- Guest {{ $key + 1 }}</em> <!-- You can customize this line as needed -->
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
    
            <!-- Display success message if it exists -->
            @if(session('success'))
                <div class="alert alert-success mt-4">{{ session('success') }}</div>
            @endif
        </div>
    </section>

    <!-- Review Section -->
    <section id="review" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Review</h2>
            <form action="/review" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </section>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Address</h3>
            <ul>
                <li class="icon"><i class="bi bi-geo-alt-fill"></i><a href="https://www.google.com/search?q=32+%26+34%2C+Jalan+Perai+Jaya+4%2C+Bandar+Perai+Jaya%2C+13600+Perai%2C+Pulau+Pinang&sca_esv=33073fab614d76a8&sxsrf=ADLYWILVcIKAaBHbDtiPNNuUAP9cxkwy_A%3A1728887767569&ei=17sMZ4y1Io6vseMP1abSkAw&ved=0ahUKEwjM_PfpoI2JAxWOV2wGHVWTFMIQ4dUDCA8&uact=5&oq=32+%26+34%2C+Jalan+Perai+Jaya+4%2C+Bandar+Perai+Jaya%2C+13600+Perai%2C+Pulau+Pinang&gs_lp=Egxnd3Mtd2l6LXNlcnAiSTMyICYgMzQsIEphbGFuIFBlcmFpIEpheWEgNCwgQmFuZGFyIFBlcmFpIEpheWEsIDEzNjAwIFBlcmFpLCBQdWxhdSBQaW5hbmdI0Q1QjAdYjAdwA3gBkAEAmAGtAqABrQKqAQMzLTG4AQPIAQD4AQL4AQGYAgOgAiTCAgoQABiwAxjWBBhHwgINEAAYgAQYsAMYQxiKBcICDhAAGIAEGLADGJIDGIoFwgIOEAAYsAMY5AIY1gTYAQHCAhkQLhiABBiwAxhDGMcBGMgDGIoFGK8B2AEBwgIcEC4YgAQYsAMY0QMYQxjHARjIAxjJAxiKBdgBAcICExAuGIAEGLADGEMYyAMYigXYAQGYAwCIBgGQBhK6BgYIARABGAmSBwEzoAeCAQ&sclient=gws-wiz-serp"> 32 & 34, Jalan Perai Jaya 4, Bandar Perai Jaya, 13600 Perai, Pulau Pinang</a></li>
                <li class="icon"><i class="bi bi-phone"></i> 012-4081851</li>
                <li class="icon"><i class="bi bi-telephone-fill"></i> 04-398 4787</li>
                <li class="icon"><i class="bi bi-envelope"></i><a href="https://synergycollege.edu.my/"> support@synergycollege.edu.my</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#rooms">Rooms</a></li>
                <li><a href="#guestssay">Guests Say</a></li>
                <li><a href="#review">Review</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <br><br>
            <ul>
                <li><a href="https://www.tiktok.com/"><i class="bi bi-tiktok"></i>TikTok</a></li>
                <li><a href="https://synergycollege.edu.my/"><i class="bi bi-google"></i>Goggle</a></li>
                <li><a href="https://web.facebook.com/"><i class="bi bi-facebook"></i>FaceBook</a></li>
                {{-- <li><a href="#">Career</a></li>
                <li><a href="#">Contacts</a></li> --}}
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <ul class="footer-bottom-links">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Code of Conduct</a></li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        {{-- <div class="social-icons">
            <a href="https://www.tiktok.com/"><i class="bi bi-tiktok"></i></a>
            <a href="https://synergycollege.edu.my/"><i class="bi bi-google"></i></a>
            <a href="https://web.facebook.com/"><i class="bi bi-facebook"></i></a>
        </div> --}}
    </div>
</footer>
</html>
