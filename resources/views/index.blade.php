@include('header')
      @if(session('success'))
      <div id="custom-alert" class="green-alert" role="alert">
          {{ session('success') }}
          <button type="button" class="close-alert-btn" aria-label="Close1" onclick="closeAlert()">X</button>
      </div>
      @endif


  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">SYNERGY, <em>COLLEGE</em></span>
          <h2 style="rgba(0,0,0,1.0)">Affordable, <br> Simple & Comfortable Hostel Living</h2>
          <a class="buttonx" href="/contact">Book Now</a>
        </div>
      </div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="section-heading mb-4">
            <h6>| About</h6>
            <h2>About Us</h2>
            <p>
              Established in 2001, Synergy College is a significant contributor to professional and skill education in Malaysia. We offer TVET Diploma and International Professional Qualifications to both local and international students. As an accredited International College from JPK, Malaysia, our students are eligible to apply for government study loans through the college.
            </p>
            <p>
              While delivering the government-accredited TVET Diploma program, we prepare students to sit for international professional examinations, allowing many to obtain double qualifications. Our programs are in high demand and well recognized by local and international industries. 
            </p>
            <p>
              We provide a holistic learning system, equipping students with the skills and knowledge they need to succeed in the workforce. The Malaysian Qualifications Agency (MQA), the Ministry of Education, and the Department of Skills Development (JPK), Ministry of Human Resources, collaborate to operate the TVET Diploma.
            </p>
            <a href="/about" class="buttonx">Learn More</a>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="assets/images/about.jpg" alt="About Us" class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="6" data-speed="6000"></h2>
                   <p class="count-text ">Hostel<br>Finished Now</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="22" data-speed="6000"></h2>
                  <p class="count-text ">Student<br>Stay</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="200" data-speed="6000"></h2>
                  <p class="count-text ">Hostel<br>Fees 2024</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Hostel Section -->
  <div id="hostel" class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Hostel</h6>
            <h2>We Provide The Best Hostel Room You Like</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($rooms as $room)
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <!-- Display room image -->
                    <img src="{{ asset('storage/' . $room->image) }}" class="imgsize" alt="{{ $room->room_name }}">

                    <!-- Display room name or category -->
                    <span class="category">{{ $room->room_name }}</span>
    
                    <!-- Display room fee -->
                    <h6>Rm {{ $room->room_fee }}</h6><br><br>
    
                    <div>
                        <!-- Button to open the modal -->
                        <button class="room-button" onclick="openModal('{{ $room->id }}')">Visit</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
          {{-- <div class="col-lg-4 col-md-6">
          <div class="item">
            <img src="assets/images/room6.jpeg" class="imgsize" alt=""></a>
            <span class="category">Hostel 6</span>
            <h6>Rm 200</h6><br><br>
            <div>
              <button class="room-button" onclick="openModal('room6')">Visit</button>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
  
<!-- Modal Structure -->
<div id="imageModal" class="modal" style="display:none;">
  <div class="modal-content">
    <img id="modalImage" class="modal-image" src="" alt="">
    <div class="modal-controls">
    </div>
  </div>
  <span class="close" onclick="closeModal()">&times;</span>
</div>

<!-- JavaScript -->
<script>
let currentImageIndex = 0;
let currentHostel = ''; 
let slideInterval;

const images = {
  room1: [
    'assets/images/1.jpeg',
    'assets/images/2.jpeg',
    'assets/images/3.jpeg',
    'assets/images/4.jpeg'
  ],
  room2: [
    'assets/images/5.jpeg',
    // 'assets/images/6.jpeg',
    'assets/images/7.jpeg',
    'assets/images/8.jpeg'
  ],
  room3: [
    'assets/images/9.jpeg',
    'assets/images/10.jpeg',
    'assets/images/11.jpeg',
    'assets/images/12.jpeg'
  ],
  room4: [
    'assets/images/13.jpeg',
    // 'assets/images/14.jpeg',
    'assets/images/15.jpeg',
    'assets/images/16.jpeg',
    'assets/images/17.jpeg'
  ],
  room5: [
    'assets/images/18.jpeg',
    'assets/images/19.jpeg',
    'assets/images/20.jpeg',
    'assets/images/21.jpeg',
    'assets/images/22.jpeg'
  ],
  // room6: [
  //   'assets/images/room6.jpg',
  //   'assets/images/room6_2.jpg',
  //   'assets/images/room6_3.jpg'
  // ]
};

function openModal(hostel) {
  currentHostel = hostel; 
  currentImageIndex = 0;
  const modal = document.getElementById('imageModal');
  const img = document.getElementById('modalImage');
  img.src = images[hostel][currentImageIndex];
  modal.style.display = "flex"; 
  startSlideshow();
}
function closeModal() {
  const modal = document.getElementById('imageModal');
  modal.style.display = "none";
  stopSlideshow();
}
function changeImage(direction) {
  currentImageIndex += direction;

  if (currentImageIndex < 0) {
    currentImageIndex = images[currentHostel].length - 1;
  } else if (currentImageIndex >= images[currentHostel].length) {
    currentImageIndex = 0;
  }

  const img = document.getElementById('modalImage');
  img.src = images[currentHostel][currentImageIndex];
}

function startSlideshow() {
  slideInterval = setInterval(() => {
    changeImage(1);
  }, 3000);
}

function stopSlideshow() {
  clearInterval(slideInterval);
}

document.getElementById('imageModal').onclick = function(event) {
  if (event.target === this) {
    closeModal();
  }
};
</script>

<section id="reviews-and-testimonials" style="background-color: ; margin-bottom: -50px;" class="py-5 d-flex justify-content-center align-items-start scroll-trigger">
  
  <!-- Review Section -->
  <div id="reviewForm" class="custom-border-box mr-4 scroll-trigger">
    <h2 class="text-center mb-4 text-white animate-slideup">Leave a Review</h2>
    <form action="/review" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <input type="text" name="name" class="form-control custom-input" placeholder="Your Name" required>
            </div>
            @error('name')
            {{$message}}
            @enderror
            <div class="col-md-12 mb-3">
                <input type="email" name="email" class="form-control custom-input" placeholder="Your Email" required>
            </div>
            @error('email')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <textarea name="message" class="form-control custom-input" rows="5" placeholder="Your Message" required></textarea>
        </div>
        @error('message')
            {{$message}}
            @enderror
        <div class="text-center">
           <button type="submit" class="buttonx">Send Message</button>
        </div>
    </form>
  </div>

  <!-- Testimonials Section -->
  <div id="guestsay" class="custom-review-box scroll-trigger">
    <h2 class="text-center mb-4" style="color:#fff;">What Our Guests Say</h2>
    <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
      <div class="carousel-inner">
          @foreach ($reviews as $key => $review)
              <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                  <div class="testimonial-box text-center">
                    <div id="review-{{ $key }}">
                      <i class="fas fa-quote-left fa-2x text-primary mb-3"></i>
                      <div class="testimonial-content">
                        <p class="testimonial-text">"{{ $review->message }}"</p>
                        <em class="testimonial-author">- Guest {{ $key + 1 }}</em>
                      </div>
                    </div>
                  </div>
              </div>
          @endforeach
        </div>
    </div>
    <div>
        <a class="carousel-control-prev" href="#reviewCarousel" role="button" data-bs-slide="prev"></a>
        <a class="carousel-control-next" href="#reviewCarousel" role="button" data-bs-slide="next"></a>
    </div>
</div>
</section>

<style>
        .carousel-inner {
            transform: none;
        }

        .carousel-item {
            transform: none !important;
        }

        .testimonial-content {
            transform: translateX(100%);
            transition: transform 0.5s ease-in-out;
        }

        /* Slide in both text and author when the carousel item is active */
        .carousel-item.active .testimonial-content {
            transform: translateX(0);
        }

        .green-alert {
            background-color: #b7e0b8;
            color: black;
            padding: 15px 25px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: fixed;
            top: 60;
            transform: translateY(20px);
            right: 20px;
            z-index: 999999;
            width: 350px;

        }

        .close-alert-btn {
            background-color: transparent; /* No background */
            border: none; /* No border */
            color: black; /* White 'X' */
            font-size: 16px; /* Slightly larger 'X' */
            position: absolute; /* Position the button at the top-right */
            /* top: -4px; */
            right: 15px;
            cursor: pointer; /* Pointer cursor for the button */
        }

        .close-alert-btn:hover {
            color:; /* Lighten the color on hover */
        }

        .imgsize {
          border-radius: 10px;
          width: 240px;
          height: 200px;
          transition: transform 0.3s ease-in-out;
        }
        .item:hover .imgsize {
          transform: scale(1.1);
        }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const scrollElements = document.querySelectorAll(".scroll-trigger");

    const elementInView = (el, offset = 0) => {
        const elementTop = el.getBoundingClientRect().top;
        return elementTop <= (window.innerHeight || document.documentElement.clientHeight) - offset;
    };

    const displayScrollElement = (element) => {
        element.classList.add("animate");
    };

    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 100)) {
                displayScrollElement(el);
            }
        });
    };

    setTimeout(() => {
        const reviewSection = document.getElementById('review');
        reviewSection.classList.add("animate-fade");
    }, 4000);

    window.addEventListener("scroll", () => {
        handleScrollAnimation();
    });
});
</script>
  
  @include('footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
<script>
  window.onload = function() {
  initScrollAnimations();
};
document.addEventListener('DOMContentLoaded', function() {
  initScrollAnimations();
});
function initScrollAnimations() {
  const animatedElements = document.querySelectorAll('.animate-on-scroll');

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('start-animation');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1
  });

  animatedElements.forEach(element => {
    observer.observe(element);
  });
}
</script>

<script>
  function closeAlert() {
      document.getElementById('custom-alert').style.display = 'none';
  }
</script>
<script>
  window.onload = function() {
    const alert = document.querySelector('.green-alert'); // Target the green alert element

    if (alert) {
        setTimeout(function() {
            alert.style.display = 'none'; // Hide the alert after 4 seconds
        }, 4000); // 4 seconds in milliseconds
    }
}

</script>