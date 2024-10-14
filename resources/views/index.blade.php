<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Name</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #343a40;
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
            background: url('your-background-image.jpg') no-repeat center center;
            background-size: cover;
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
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Hostel Name</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#rooms">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#amenities">Amenities</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to Hostel Name</h1>
            <p>Your cozy place to stay</p>
            <a href="#" class="btn btn-primary">Book Now</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>Information about the hostel, what makes it unique, and why guests will love staying here.</p>
                </div>
                <div class="col-md-6">
                    <img src="about-us.jpg" class="img-fluid rounded" alt="Hostel Image">
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
                        <img src="room1.jpg" class="card-img-top" alt="Room 1">
                        <div class="card-body">
                            <h5 class="card-title">Room 1</h5>
                            <p class="card-text">A cozy room with a stunning view.</p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="room2.jpg" class="card-img-top" alt="Room 2">
                        <div class="card-body">
                            <h5 class="card-title">Room 2</h5>
                            <p class="card-text">Spacious and comfortable.</p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="room3.jpg" class="card-img-top" alt="Room 3">
                        <div class="card-body">
                            <h5 class="card-title">Room 3</h5>
                            <p class="card-text">Perfect for a peaceful getaway.</p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">What Our Guests Say</h2>
            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <p>"Amazing stay! Highly recommend this hostel."</p>
                        <em>- Guest 1</em>
                    </div>
                    <div class="carousel-item">
                        <p>"Great location and very friendly staff."</p>
                        <em>- Guest 2</em>
                    </div>
                    <div class="carousel-item">
                        <p>"Affordable and comfortable, will stay again."</p>
                        <em>- Guest 3</em>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Review</h2>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
