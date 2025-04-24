<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOYAGEVISTA</title>
    <link rel="icon" type="image/x-icon" href="images/sitelogo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/sitelogo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Voyagevista</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="flex-direction:row-reverse;">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Plan Journey</a>
        <a class="nav-link" href="#">Plan History</a>
        <a class="nav-link" href="#">Explore Places</a>
        <a class="nav-link" href="#">About Us</a>
        <a class="nav-link" href="#">Contect Us</a>
      </div>
    </div>
  </div>
</nav>
 <div class="slider-container">
        <div class="slider">
            <img src="images/s1.jpg" alt="Image 1">
            <img src="images/s2.jpg" alt="Image 2">
            <img src="images/s3.jpg" alt="Image 3">
            <!-- Add more images here -->
        </div>
        <button id="prevBtn" class="slider-btn prev-btn" style="width:120px;">Previous</button>
        <button id="nextBtn" class="slider-btn next-btn" style="width:120px;">Next</button>
    </div>

  <div class="card text-center">
  <div class="card-header">
    Features
  </div>
  <div class="card-body">
    <h5 class="card-title">Benifits of using voyagevista</h5>
    <p class="card-text"><ul>
  <li>Comprehensive Destination Guides: Explore our extensive library of destination guides, each packed with detailed information about top cities, countries, and regions around the world. From cultural insights to practical tips, our guides cover it all.</li>
  <li>Accommodation Booking: Find the perfect place to stay with our accommodation booking feature. Discover a wide range of options, from luxury hotels to cozy bed and breakfasts, and book your stay directly through our website.</li>
  <li>Travel Itineraries: Let us help you plan your trip with customizable travel itineraries. Whether you're a solo traveler, a couple, or a family, we offer suggested itineraries to make the most of your time in any destination.</li>
  <li>Restaurant and Dining Recommendations: Explore the culinary delights of your chosen destination with our restaurant recommendations. From local street food to fine dining, our curated list of dining options has something for every palate.</li>
  <li>Activity and Attractions Directory: Discover the best things to see and do at your destination. Our directory of activities and attractions includes museums, historical sites, adventure sports, and more.</li>
</ul>
</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-body-secondary">
    SEARCH FOR BEST PLACES IN YOUR CITY
  </div>
</div>

<div class="card-group">
  <div class="card">
    <img src="images/lal kila.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Red fort</h5>
      <p class="card-text">The fort, which is spread over 255 acres, features a mix of architectural styles such as Islamic, Hindi, Timurid, and Persian. Its massive, 2.5-km-long enclosing walls are made of red sandstone.</p>
    </div>
  </div>
  <div class="card">
    <img src="images/tajmahel.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Taj Mahal</h5>
      <p class="card-text">Taj Mahal is a most attractive and popular scenery look historical place. It is located in the Agra, Uttar Pradesh. It is situated in very large area at very beautiful place having river on back side.</p>
    </div>
  </div>
  <div class="card">
    <img src="images/sou.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Statue of Unity</h5>
      <p class="card-text">The Statue of Unity is built dedication to Iron Man Sardar Vallabhbhai Patel, who served as the first home minister of independent India. Sardar Patel credite 562 princely states in pre-independent india.</p>
    </div>
  </div>
</div>

<div class="card text-center">
  <div class="card-header">
    ABOUT US
  </div>
  <div class="card-body">
    <p class="card-text">Welcome to voyagevista,your premire destination for all your travel needs.we are a ahemdabad based travel agency dedicated to providing exceptional travel experiences to our valued clients.<br>With our extensive knownladge and expertise in the travel industry,we strive to offer personized and taiolred solution that cater to your unique prefrences .whether you are planning a relaxing beatch getway, an adventurous hiking expedition,or a cultural exploration,our team of experienced professionals is here to assist you every step of the way. </p>
  </div>
</div>
<div class="flex-container">
        <div class="contact-form">
            <h3>CONTACT FORM</h3>
            <form>
                <input type="text" id="name" name="name" placeholder="ENTER NAME">
                <input type="email" id="email" name="email" placeholder="ENTER EMAIL">
                <textarea id="message" name="message" rows="4" cols="50" placeholder="ENTER MESSAGE"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p>Address: 123 Main Street</p>
            <p>Phone: (555) 555-5555</p>
            <p>Email: info@example.com</p>
        </div>
    </div>
      
    <footer>
        <div class="copyright">
            &copy; 2023 VOYAGEVISTA. All rights reserved.
        </div>
    </footer>

<script>
const slider = document.querySelector('.slider');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
let slideIndex = 0;

function showSlide(index) {
    if (index < 0) {
        index = slider.children.length - 1;
    } else if (index >= slider.children.length) {
        index = 0;
    }

    for (let i = 0; i < slider.children.length; i++) {
        slider.children[i].style.display = 'none';
    }

    slider.children[index].style.display = 'block';
    slideIndex = index;
}

prevBtn.addEventListener('click', () => {
    showSlide(slideIndex - 1);
});

nextBtn.addEventListener('click', () => {
    showSlide(slideIndex + 1);
});

// Initial slide display
showSlide(slideIndex);

  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>