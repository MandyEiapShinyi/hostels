@include('header')

 <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / Review</span>
          <h3>Review Room</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Header End -->
{{-- <!-- Testimonials Section -->
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
                <button type="submit" class="buttonx">Send Message</button>
            </div>
        </form>
    </div>
</section>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div>
  <img src="../assets/images/map.jpeg" alt="">
</div>



<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/counter.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html> --}}
@include('footer')