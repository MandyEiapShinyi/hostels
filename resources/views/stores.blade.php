@include('header')

<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="/index">Home</a> / Locator</span>
          <h3>Near You</h3>
        </div>
      </div>
    </div>
  </div>

<!-- Nearest Stores Section -->
<section id="nearest-stores" class="py-5" style="background-color: #f0f9ff;">
    <div class="container">
      <h2 class="text-center mb-4">Nearest Stores</h2>
      
      <!-- Search Bar Row -->
      <div class="row mb-4">
        <div class="col-lg-6">
          <input type="text" id="store-search" class="form-control" placeholder="Search for stores..." onkeyup="filterStores()" style="background-color: #e1f5fe; border: 2px solid #2196F3;">
        </div>
        <div class="col-lg-6">
          <input type="text" id="food-search" class="form-control" placeholder="Search for food..." onkeyup="filterFood()" style="background-color: #ffe0b2; border: 2px solid #FF6347;">
        </div>
      </div>
  
      <div class="row">
        <!-- Stores Column (Left Side) -->
        <div class="col-lg-6">
          <h4 class="mb-3" style="color: #2196F3;">Stores</h4>
          <ul id="store-list" class="list-group">
            <li class="list-group-item" style="background-color: #BBDEFB;">
              <a href="https://www.google.com/maps/search/7-Eleven+near+Perai,+Penang" target="_blank">
                <strong>7-Eleven</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #BBDEFB;">
              <a href="https://www.google.com/maps/search/Happy+Mart+near+Perai,+Penang" target="_blank">
                <strong>Happy Mart</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #BBDEFB;">
              <a href="https://www.google.com/maps/search/99+Speedmart+near+Synergy+College+Bandar+Perai+Jaya" target="_blank">
                <strong>99 Speedmart</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #90CAF9;">
              <a href="https://www.google.com/maps/search/FamilyMart+near+Perai,+Penang" target="_blank">
                <strong>FamilyMart</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #90CAF9;">
              <a href="https://www.google.com/maps/search/Megamall+Perai" target="_blank">
                <strong>Megamal</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #64B5F6;">
              <a href="https://www.google.com/maps/search/Watsons+near+Perai,+Penang" target="_blank">
                <strong>Watsons</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #42A5F5;">
              <a href="https://www.google.com/maps/search/Sunshine+Square+near+Perai,+Penang" target="_blank">
                <strong>Sunshine Square</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #42A5F5;">
              <a href="https://www.google.com/maps/search/Guardian+Pharmacy+near+Perai,+Penang" target="_blank">
                <strong>Guardian Pharmacy</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #2196F3;">
              <a href="https://www.google.com/maps/search/Caring+Pharmacy+near+Perai,+Penang" target="_blank">
                <strong>Caring Pharmacy</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #2196F3;">
              <a href="https://www.google.com/maps/search/MR+DIY+near+Perai,+Penang" target="_blank">
                <strong>MR DIY</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #2196F3;">
              <a href="https://www.google.com/maps/search/Lotus+Store+near+Perai,+Penang" target="_blank">
                <strong>Lotus Store</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #1976D2;">
              <a href="https://www.google.com/maps/search/Eco-Shop+near+Perai,+Penang" target="_blank">
                <strong>Eco-Shop</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #1976D2;">
              <a href="https://www.google.com/maps/search/MyNews+near+Perai,+Penang" target="_blank">
                <strong>MyNews</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #1565C0;">
              <a href="https://www.google.com/maps/search/Public+Bank+ATM+near+Perai,+Penang" target="_blank">
                <strong>Public Bank ATM</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #1565C0;">
              <a href="https://www.google.com/maps/search/Star+Grocery+near+Perai,+Penang" target="_blank">
                <strong>Star Grocery</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #0D47A1;">
              <a href="https://www.google.com/maps/search/Shell+Petrol+Station+near+Perai,+Penang" target="_blank">
                <strong>Shell Petrol Station</strong>
              </a>
            </li>
            <li class="list-group-item" style="background-color: #0D47A1;">
              <a href="https://www.google.com/maps/search/Petronas+Petrol+Station+near+Perai,+Penang" target="_blank">
                <strong>Petronas Petrol Station</strong>
              </a>
            </li>
          </ul>
        </div>
  
        <!-- Food and Dining Column (Right Side) -->
        <div class="col-lg-6">
          <h4 class="mb-3" style="color: #FF6347;">Food & Dining</h4>
          <ul id="food-list" class="list-group">
            <li class="list-group-item" style="background-color: #FFEBEE;">
              <a href="https://www.google.com/maps/search/McDonald's+near+Perai,+Penang" target="_blank">
                <strong>McDonald's</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #FFEBEE;">
              <a href="https://www.google.com/maps/search/KFC+near+Perai,+Penang" target="_blank">
                <strong>KFC</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #FFCDD2;">
              <a href="https://www.google.com/maps/search/Starbucks+near+Perai,+Penang" target="_blank">
                <strong>Starbucks</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #FFCDD2;">
              <a href="https://www.google.com/maps/search/Domino's+Pizza+near+Perai,+Penang" target="_blank">
                <strong>Domino's Pizza</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #EF9A9A;">
              <a href="https://www.google.com/maps/search/Old+Town+White+Coffee+near+Perai,+Penang" target="_blank">
                <strong>Old Town White Coffee</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #EF9A9A;">
              <a href="https://www.google.com/maps/search/Secret+Recipe+near+Perai,+Penang" target="_blank">
                <strong>Secret Recipe</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #E57373; color: #fff;">
              <a href="https://www.google.com/maps/search/Tealive+near+Perai,+Penang" target="_blank">
                <strong>Tealive</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #E57373;">
              <a href="https://www.google.com/maps/search/Perai+Food+Court" target="_blank">
                <strong>Perai Food Court</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #EF5350;">
              <a href="https://www.google.com/maps/search/Pizza+Hut+near+Perai,+Penang" target="_blank">
                <strong>Pizza Hut</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #EF5350;">
              <a href="https://www.google.com/maps/search/Burger+King+near+Perai,+Penang" target="_blank">
                <strong>Burger King</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #FF5252;">
              <a href="https://www.google.com/maps/search/Big+Apple+Donuts+%26+Coffee+near+Perai,+Penang" target="_blank">
                <strong>Big Apple Donuts & Coffee</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #FF5252;">
              <a href="https://www.google.com/maps/search/Subway+near+Perai,+Penang" target="_blank">
                <strong>Subway</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #e80b0b;">
              <a href="https://www.google.com/maps/search/A&W+near+Perai,+Penang" target="_blank">
                <strong>A&W</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #e80b0b;">
              <a href="https://www.google.com/maps/search/PappaRich+near+Perai,+Penang" target="_blank">
                <strong>PappaRich</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #D32F2F; color: #fff;">
              <a href="https://www.google.com/maps/search/Sushi+King+near+Perai,+Penang" target="_blank">
                <strong>Sushi King</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #D32F2F;">
              <a href="https://www.google.com/maps/search/Nando's+near+Perai,+Penang" target="_blank">
                <strong>Nando's</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #aa1818; color: #fff;">
              <a href="https://www.google.com/maps/search/Santai+Cafe+near+Perai,+Penang" target="_blank">
                <strong>Santai Cafe</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #aa1818;">
              <a href="https://www.google.com/maps/search/Chatime+near+Perai,+Penang" target="_blank">
                <strong>Chatime</strong>
              </a><br>
            </li>
            <li class="list-group-item" style="background-color: #8a0202;">
              <a href="https://www.google.com/maps/search/Seoul+Garden+near+Perai,+Penang" target="_blank">
                <strong>Seoul Garden</strong>
              </a><br>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  
  <!-- JavaScript to Filter Stores -->
  <script>
    function filterStores() {
      let input = document.getElementById('store-search');
      let filter = input.value.toLowerCase();
      let ul = document.getElementById('store-list');
      let li = ul.getElementsByTagName('li');
      
      for (let i = 0; i < li.length; i++) {
        let storeName = li[i].getElementsByTagName('strong')[0].innerHTML.toLowerCase();
        
        if (storeName.indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
  
    function filterFood() {
      let input = document.getElementById('food-search');
      let filter = input.value.toLowerCase();
      let ul = document.getElementById('food-list');
      let li = ul.getElementsByTagName('li');
      
      for (let i = 0; i < li.length; i++) {
        let foodName = li[i].getElementsByTagName('strong')[0].innerHTML.toLowerCase();
        
        if (foodName.indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
  </script>
  
  <style>
    .list-group-item {
      color: #11113c;
    }
    strong {
      color: #11113c;
    }
  </style>

@include('footer')