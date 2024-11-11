@include('header')

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <span class="breadcrumb"><a href="/index">Home</a> / Room</span>
        <h3>Your Room Details</h3>
      </div>
    </div>
  </div>
</div>

<div class="room-details-section py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4>Room Information</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Room Number</th>
              <th>Room Type</th>
              <th>Number of Roommates</th>
              <th>Facilities</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>203</td>
              <td>Shared</td>
              <td>3</td>
              <td>Wi-Fi, Air Conditioner, Study Table</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>
    
@include('footer')