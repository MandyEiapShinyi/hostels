@include('header')

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <span class="breadcrumb"><a href="/index">Home</a> / About</span>
        <h3>About Us</h3>
      </div>
    </div>
  </div>
</div>

<div class="featured section py-5">
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
          {{-- <a href="/about" class="btn btn-primary">Learn More</a> --}}
        </div>
      </div>
      <div class="col-lg-6">
        <img src="assets/images/about.jpg" alt="About Us" class="img-fluid" style="max-width: 100%; height: auto;">
      </div>
    </div>
  </div>
</div>
<!-- Mission & Vision Section Start -->
<div class="mission-vision section py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-4xz">
        <div class="mission">
          <h2>Our Mission</h2>
          <p>
            The mission of Synergy College is to provide career-focused quality education that caters to the intellectual, social, and cultural needs of learners.
          </p>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="vision">
          <h2>Our Vision</h2>
          <p>Kolej Synergy will be a world leader in the integration of:</p>
          <ul>
            <li>Teaching and Learning</li>
            <li>Leadership in service and outreach</li>
            <li>Advancement of the knowledge base through research</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Mission & Vision Section End -->

<script>
window.addEventListener('scroll', function() {
  var mission = document.querySelector('.mission');
  var vision = document.querySelector('.vision');
  
  var missionPos = mission.getBoundingClientRect().top;
  var visionPos = vision.getBoundingClientRect().top;
  var screenPos = window.innerHeight / 1.3;

  if (missionPos < screenPos) {
    mission.classList.add('fade-in-left');
  }
  if (visionPos < screenPos) {
    vision.classList.add('fade-in-right');
  }
});

</script>

@include('footer')