<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> --}}
  {{-- <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet"> --}}

  <title>Hostel</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/fuse.js/dist/fuse.min.js"></script>

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope" href="mailto:info@synergycollege.edu.my" ></i> info@synergycollege.edu.my</li>
            <li><i class="fa fa-map"></i> 32 & 34 Jalan Perai Jaya 4, Bandar Perai Jaya, Perai, Malaysia</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="https://www.facebook.com/synergycollege.edu.my"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://synergycollege.edu.my/" target="_blank"><i class="fab fa-google"></i></a></li>
            <li><a href="https://www.tiktok.com/@synergy.college"><i class="fab fa-tiktok"></i></a></li>
            <li><a href="https://wa.me/60164456145"><i class="fab fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

      <!-- ***** Header Area Start ***** -->
      <header class="header-area header-sticky">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="/index" class="logo">
                  <img style= "width: 82px; height: 75px" src="assets/images/synergy.png" alt="">
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li><a href="/index" class="active">Home</a></li>
                  <li><a href="/about">About</a></li>
                  <li><a href="/reviewroom">Review</a></li>
                  <li><a href="/stores">Locator</a></li>
                  <li><a href="/contact">Contact Us</a></li>
                  <li><a href="/index#hostel"><i class="fa fa-calendar"></i>Visit d Room</a></li>
                </ul>
                <a class='menu-trigger'>
                  <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
      </header>
      <!-- ***** Header Area End ***** -->
      
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/index">Home</a>  /  Contact Us</span>
          <h3>Contact Us</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>| Contact Us</h6>
            <h2>Get In Touch With Our Agents</h2>
          </div>

          
          <p>If you're a college student with questions about hostel facilities, roommate arrangements, or campus amenities, feel free to reach out! Our team is here to help you settle in and make the most of your time on campus. Let us know how we can assist you or connect you with resources. We're always happy to hear from you!</p>
          <div class="row">
            <div class="col-lg-12">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 30px;">
                <h6><a href="tel:016-445 6145" style="color:#11113c;"> 016-445 6145</a><br><span>Phone Number</span></h6>
              </div>
            </div>


            <div class="col-lg-12">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 30px;">
                <h6><a href="mailto:info@synergycollege.edu.my" style="color:#11113c;"> info@synergycollege.edu.my</a><br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-6">
          <form id="contact-form" action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <fieldset>
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Your Name..." required>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="Your E-mail..." required>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" placeholder="Subject...">
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                    </fieldset>
                </div>
            </div>
        </form>
        </div>


        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.9975633731644!2d100.38678787461067!3d5.386474087413709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b15cdbd92f567b%3A0xe2b18c71b51135bc!2s32%20%26%2034%2C%20Jalan%20Perai%20Jaya%204%2C%20Bandar%20Perai%20Jaya%2C%2013600%20Perai%2C%20Pulau%20Pinang!5e0!3m2!1sen!2smy!4v1697988764909!5m2!1sen!2smy" width="100%" height="500px" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  @include('footer')