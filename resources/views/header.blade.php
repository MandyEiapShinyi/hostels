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
            <li>
              <i class="fa fa-envelope"></i>
              <a href="mailto:info@synergycollege.edu.my" style="text-decoration: none; color: inherit;">info@synergycollege.edu.my</a>
            </li>
            <li>
              <i class="fa fa-map"></i>
              <a 
                href="https://www.google.com/maps?q=32+%26+34+Jalan+Perai+Jaya+4,+Bandar+Perai+Jaya,+Perai,+Malaysia" 
                target="_blank" 
                style="text-decoration: none; color: inherit;">
                32 & 34 Jalan Perai Jaya 4, Bandar Perai Jaya, Perai, Malaysia
              </a>
            </li>
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
                  <img style= "height: 65px" src="assets/images/synergy.png" alt="">
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li><a href="/index" class="active">Home</a></li>
                  <li><a href="/about">About</a></li>
                  <li><a href="/reviewroom">Rules</a></li>
                  <li><a href="/stores">Locator</a></li>
                  <li><a href="/contact">Book Now</a></li>
                  <li><a href="#hostel"><i class="fa fa-calendar"></i>Visit a Room</a></li>
                </ul>
                <a class="menu-trigger" id="menuTrigger">
                  <span>Menu</span>
              </a>

            </div>
          </div>
        </div>
      </header>
      <!-- ***** Header Area End ***** -->


<script>
document.getElementById("menuTrigger").addEventListener("click", function() {
    const mobileMenu = document.getElementById("mobileMenu");
    mobileMenu.classList.toggle("active"); // Toggle the active class
});

</script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>