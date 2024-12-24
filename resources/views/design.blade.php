@include('header')

<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/index">Home</a> / Images</span>
          <h3>Hostel Images</h3>
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
        {{-- <h3>{{ $room->address->address_name }}</h3> --}}
            {{-- <div class="col-lg-4 col-md-6">
                <div class="item">
                    <!-- Display room image -->
                    <img src="{{ asset('storage/' . $room->image) }}" class="imgsize" alt="{{ $room->room_name }}">
                                  
                    <!-- Display room name or category -->
                    <span>{{ $room->room_name }}</span>

                    <!-- Display room fee -->
                    <h6>Rm {{ $room->room_fee }}</h6>

                    <!-- Back of the card -->
                    <div class="text-behind">
                        <p>{{ $room->details }}</p>
                    </div>
                  </div>      
              </div> --}}
              <div class='col-lg-4 col-md-6'>
                <div class="imgdisplay" style="width: 18rem;">
                  <div class='flip-card'>
                    <div class='flip-card-inner'>
                      <div class='flip-card-front'>
                        <img src="{{ asset('storage/' . $room->image) }}" style="height: 250px;width: 360px" class="imgsize" alt="{{ $room->room_name }}">
                        {{-- <img src="assets/images/room11.jpg" class="imgsize" alt=""><br><br> --}}
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        </div>
                      </div>
                      <div class='flip-card-back' style="position: relative; overflow: hidden;">
                        <!-- Background Div -->
                        <div style="
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background: lightgrey;
                            filter: blur(8px);
                            background-size: cover;
                            background-position: center;
                            z-index: -1; /* Ensure the background stays behind the content */
                        "></div>
                    
                        <!-- Content Div (kept clear) -->
                        <div style="position: relative; padding: 20px;">
                            <p><b>Room Details :</b> {{ $room->details }}</p>
                            <p><b>Room Address :</b> {{ $room->address->address_name }} {{ $room->address->address }}</p>
                        </div>
                    </div>
                    
                      </div>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px;">
                    {{-- <span class="ftx">Hostel 1</span> --}}
                    <span>{{ $room->room_name }}</span>
                    <h6 style="margin-right: -65px; color: #ea232a;">Rm {{ $room->room_fee }}</h6>
                    {{-- <h6 style="margin-right: -65px; color: #ea232a;">RM 200</h6> --}}
                  </div>
              </div>
            </div>
        @endforeach
          
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>
<script>
    let currentImageIndex = 0;
    let currentHostel = ''; 
    let slideInterval;
</script>

<style>
    .ftx {
      background-color: #ffe9ea; 
      border-radius: 6px; 
      padding: 5px; 
      font-size: 16px;
    }
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
      background-color: transparent;
      border: none;
      color: black;
      font-size: 16px;
      position: absolute;
      /* top: -4px; */
      right: 15px;
      cursor: pointer;
    }
    .close-alert-btn:hover {
      color:;
    }
    .imgsize {
      width: 250px;
      width: 360px;
      height: auto;
      cursor: pointer;
      transition: 2s;
      /* z-index: 1; */
      /* margin-left: 1px; */
      margin-top: 25px;
    }
    .item:hover .imgsize {
      transform: rotateY(180deg);
      /* color: white; */
    }
    .imgsize .text-behind {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 40px;
      color: rgba(255, 255, 255, 0.5);
      z-index: -1;
      pointer-events: none;
      font-family: 'Arial', sans-serif;
    }
    .flip-card {
      perspective: 1500px;
      
    }
    .flip-card-inner {
      position: relative;
      width: 400px;
      height: 300px;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
      background-color: whitesmoke;

    }
    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }
    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 400px;
      height: 300px;
      backface-visibility: hidden;
      border-radius: 10px;
    }
    .flip-card-front {
      background-size: cover;
      background-position: center;
    }
    .flip-card-back {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      transform: rotateY(180deg);
    }
</style>

@include('footer')