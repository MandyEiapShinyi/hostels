@include('header')

 <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / Rules</span>
          <h3>Rules</h3>
        </div>
      </div>
    </div>
  </div>
<div>
  <div class="policy-container">
    <h3>Policy and Notices</h3>
    <p>At the time, students are required to follow the following rules:</p>
    <ul>
      <li>1. Entering someone else's room without permission is strictly prohibited to respect their privacy.</li>
      <li>2. Keep the Room Clean</li>
      <li>3. No Going Out After 10 PM</li>
      <li>4. No Bringing Outsiders into Your Room</li>
      <li>5. Pay Hostel Fees on Time for 6 months</li>
    </ul>
    <h4>General Conduct</h4>
    <p>
      Respect fellow residents, staff, and college property.<br>
      Avoid disruptive activities that may disturb others.<br>
      Maintain cleanliness in common areas and your own room.
    </p>
    <h4>Safety and Security</h4>
    <p>
      Keep your room keys secure and report any loss immediately.<br>
      Do not allow unauthorized visitors into the hostel premises.
    </p>
    <h4>Complain and Grievance Process</h4>
    <p>Any issues or complaints can be raised with the hostel warden or management.</p>
  </div>
  
  <style>
    .policy-container {
      max-width: 800px;
      margin: 20px auto;
      padding: 30px;
      background-color: #fef9e7;       
      border: 1px solid #f5c372;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      animation: fadeInUp 1.5s ease forwards;
      opacity: 0;
    }
  
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  
    .policy-container h3 {
      font-size: 26px;
      color: #d35400;
      margin-bottom: 15px;
      text-align: center;
    }
  
    .policy-container p {
      font-size: 18px;
      color: #555;
      line-height: 1.8;
      margin-bottom: 20px;
    }
  
    .policy-container ul {
      font-size: 16px;
      color: #444;
      line-height: 1.8;
      margin-bottom: 30px;
      list-style: none;
      padding-left: 0;
    }
  
    .policy-container ul li {
      margin-bottom: 10px;
    }
  
    .policy-container h4 {
      font-size: 22px;
      color: #d35400;
      margin-bottom: 10px;
    }
  </style>
      
@include('footer')