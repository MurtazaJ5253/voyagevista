<?php
session_start();

if (isset($_SESSION['Adminlogin'])) {

  header("location:admin/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VoyageVista - Your journey, our plans!</title>
  <!-- links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- end links -->
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand me-2" href="Homepage.php">
        <h1>VoyageVista</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
        <ul class="navbar-nav ms-auto links">

          <li class="nav-item">
            <a class="nav-link me-2" aria-current="page" href="Homepage.php"><b>Home</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="explorePlace.php"><b>ExplorePlaces</b></a>
          </li>
          <?php
          if (isset($_SESSION['userlogin'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link me-2" href="#"><b>PlanHistory</b></a>
            </li>

            <li class="nav-item">
              <a class="nav-link me-2" href="#" data-bs-toggle="modal" data-bs-target="#testimonialModal"><b>AddTestimonial</b></a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a type="button me-2" class="nav-link" data-bs-toggle="modal" data-bs-target="#contactUsModal">
              <b>ContactUs</b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#aboutUs"><b>AboutUs</b></a>
          </li>

          <li class="nav-item">
            <?php

            if (isset($_SESSION['userlogin'])) {
              ?>

              <a class="btn btn-outline-dark shadow-none" href="logout.php">Logout</a>
            <?php } else { ?>
              <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                data-bs-target="#loginModal">Login</button>
              <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                data-bs-target="#registerModal">Register</button>
            <?php }
            ?>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- login modaal -->

  <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="login.php">
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center ">
              <i class="bi bi-person-circle fs-3 me-2"></i>User Login
            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control shadow-none">
            </div>
            <div class="mb-4">
              <label class="form-label">Password</label>
              <input type="password" name="pass" class="form-control shadow-none">
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <button type='submit' class="btn btn-dark shadow-none">Login</button>
            </div>

          </div>

        </form>

      </div>
    </div>
  </div>

  <!-- register modal -->

  <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <form action="registration.php" id="register_form" method="post">
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center ">
              <i class="bi bi-person-lines-fill fs-3 me-2"></i>User Registration

            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span class="badge rounded-pill bg-light text-dark nb-3 text-wrap lh-bash"> </span>
            <div class="container-fluid">
              <dv class="row">
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Number</label>
                  <input type="number" name="number" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">picture</label>
                  <input type="file" name="pic" accept=".jpg, .jpeg .png , .webp" class="form-control shadow-none"
                    required>
                </div>

                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="pass" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" name="cpass" class="form-control shadow-none" required>
                </div>
              </dv>
            </div>
            <div class="text-center my-1">
              <button type='submit' name="submit" class="btn btn-dark shadow-none">Register</button>
            </div>




          </div>

        </form>

      </div>
    </div>
  </div>


  <!-- home page img -->

  <div class="background-image">
    <img src="img/home4.jpg" alt="Image" class="img-fluid">
    <div class="overlay">
      <h2 class="mt-3">Your journey our plans!</h2>
      <a href="explorePlace.php" class="btn btn-primary btn-lg mt-3">Get Started</a>
    </div>
  </div>

  <!-- slider -->


  <section class="featured-destinations">
  <div class="container">
    <h2 class="text-center mb-4">Featured Destinations</h2>
    <div id="destination-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        include 'connection.inc.php';
        $query = "SELECT * FROM destination";
        $result = mysqli_query($conn, $query);
        $active = true;
        $counter = 0;

        while ($city_row = mysqli_fetch_assoc($result)) {
          $activeClass = $active ? 'active' : '';

          if ($counter % 3 == 0) {
            echo '<div class="carousel-item ' . $activeClass . '">
                    <div class="row">';
          }

          echo '<div class="col-md-4">
                  <a href="destination.php?id=' . $city_row['des_id'] . '" class="des_name">
                    <div class="destination-card">
                      <img src="' . $city_row['desimg'] . '" class="card-img-top" alt="Destination Image">
                      <div class="card-body" style="height: 100px;">
                        <h5 class="card-title">' . $city_row['name'] . '</h5>
                      </div>
                    </div>
                  </a>
                </div>';

          if (($counter + 1) % 3 == 0 || $counter + 1 == mysqli_num_rows($result)) {
            echo '</div>
                  </div>';
          }

          $active = false;
          $counter++;
        }
        ?>
      </div>

      <!-- Carousel navigation buttons -->
      <a class="carousel-control-prev" href="#destination-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#destination-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" ariahidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </div>
</section>






  <!-- end slider -->

  <!-- testimonial -->

  <?php
  if (isset($_SESSION['userlogin'])) {
  include 'connection.inc.php';
  $user_email = $_SESSION['userlogin'];

  $query = "SELECT name FROM user_cred WHERE email = '$user_email'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['name'];
  } else {
    $username = "Unknown";
  }}
  ?>


  <!-- Testimonial Modal -->

  <div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testimonialModalLabel">Add Testimonial</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="testimonialForm" method="post" action="testimonial.php">
            <div class="mb-3">
              <label for="username" class="form-label">Your Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>"
                readonly>
            </div>
            <div class="mb-3">
              <label for="testimonial" class="form-label">Testimonial</label>
              <textarea class="form-control" id="testimonial" name="testimonial" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>





  <!-- review -->

  <section class="testimonials">
    <div class="container">
        <h2 class="text-center mb-4">What Our Customers Say</h2>
        <div id="testimonial-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                include 'connection.inc.php';

                $testimonial_query = "SELECT * FROM testimonial";
                $testimonial_result = mysqli_query($conn, $testimonial_query);
                $testimonial_count = mysqli_num_rows($testimonial_result);

                $active = true;
                $testimonial_index = 0;

                echo '<div class="carousel-item active"><div class="d-flex flex-row">';

                while ($testimonial_row = mysqli_fetch_assoc($testimonial_result)) {
                    if ($testimonial_index > 0 && $testimonial_index % 3 == 0) {
                        echo '</div></div>';
                        $active = false;
                    }

                    if (!$active) {
                        echo '<div class="carousel-item"><div class="d-flex flex-row">';
                        $active = true;
                    }

                    echo '<div class="col-md-4">
                            <div class="testimonial-card">
                                <p>"' . $testimonial_row['testimonial'] . '"</p>
                                <p><strong>- ' . $testimonial_row['username'] .'</strong></p>
                            </div>
                        </div>';

                    $testimonial_index++;
                }

                // Close the last carousel item if needed
                if ($testimonial_index % 3 !== 0) {
                    echo '</div></div>';
                }
                ?>
            </div>

            <!-- Show controls only if there are more than 3 testimonials -->
            <?php if ($testimonial_count > 3): ?>
                <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>




  <!-- about us -->
  <section id="aboutUs" class="about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>About Us</h2>
          <p>Welcome to VoyageVista, your trusted travel companion on a journey to discover new places</p>
          <p>Our mission is to make travel accessible, memorable, and seamless for everyone. We believe in creating
            experiences that enrich lives and foster a deeper connection with the world around us.</p>
          <p>At VoyageVista, we are passionate about curating personalized travel plans that match your preferences and
            desires. Whether you're a thrill-seeker, a culture enthusiast, or someone seeking tranquility, we've got the
            perfect journey for you.</p>
          <p>We're here to ensure your travel dreams become a reality. We work tirelessly to bring you the best
            experiences, tips, and support throughout your journey.</p>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h5>MANAGE AND CREATED BY<br>
                <h4>Taha Daudi & Murtuza Daudi<h5></h5>
            </div>
          </div>
        </div>
  </section>

  <!-- about us end -->





  <!-- contact us modal -->
  <div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="contactUsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="contactUsModalLabel">ContactUs</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-mailbox"
              viewBox="0 0 16 16">
              <path
                d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
              <path
                d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />
            </svg>&nbsp;&nbsp;&nbsp;Mailing address:- VoyageVista ,Railway starion road ,Limbdi-363421,Gujarat
            <br><br><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
              class="bi bi-telephone-outbound" viewBox="0 0 16 16">
              <path
                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
            </svg>&nbsp;&nbsp;&nbsp;General contact number:- +91 0123456789
            <br><br><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
              class="bi bi-envelope-at" viewBox="0 0 16 16">
              <path
                d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
              <path
                d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
            </svg>&nbsp;&nbsp;&nbsp;Email:-VoyageVista21@gmail.com
          </p>
          <br>
          <h6 class="con_mes">SHARE YOUR THOUGHTS</h6>
          <div class="contact-container">
            <form action="contact.php" method="post" id="contactForm">
              <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
              </div>
             
              <a href="past-response.php" class="btn btn-primary"><b>View Past Response</b></a>
              <center><button type="submit" class="btn btn-primary">Submit</button></center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- contact us end -->

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Bootstrap 5 JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>



  <!-- contactus -->
  <script>
    $(document).ready(function () {
      $("#contactForm").on("submit", function (event) {
        event.preventDefault();
        const data = {
          name: $("#name").val(),
          email: $("#email").val(),
          message: $("#message").val()
        };
        $.ajax({
          url: 'contact.php',
          method: 'POST',
          data: data,
          success: function (data, textStatus, jqXHR) {
            Swal.fire({
              title: "Success",
              text: data,
              icon: "success",
              customClass: {
                confirmButton: 'btn btn-primary'
              }
            }).then(() => {
              $('#contactForm')[0].reset();
              $('#contactUsModal').modal('hide');
            });
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error during contact form submission:", errorThrown);
            alert("An error occurred during form submission. Please try again later.");
          }
        });
      });
    });
  </script>
  <!-- testimonial -->
  <script>
    $(document).ready(function () {
      $("#testimonialForm").on("submit", function (event) {
        event.preventDefault();
        const data = {
          username: $("#username").val(),
          testimonial: $("#testimonial").val()
        };
        $.ajax({
          url: 'testimonial.php',
          method: 'POST',
          data: data,
          success: function (data, textStatus, jqXHR) {
            Swal.fire({
              title: "Success",
              text: data,
              icon: "success",
              customClass: {
                confirmButton: 'btn btn-primary'
              }
            }).then(() => {
              $('#testimonialForm')[0].reset();
              $('#testimonialModal').modal('hide');
            });
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error during testimonial submission:", errorThrown);
            alert("An error occurred during testimonial submission. Please try again later.");
          }
        });
      });
    });
  </script>







  <!-- navbar -->
  <script>
    $(document).ready(function () {
      $(".navbar-nav a").on('click', function () {
        if ($(window).width() < 992) {
          $('.navbar-toggler').click();
        }
      });

      $(".navbar-nav .nav-link").on('click', function () {
        if ($(window).width() < 992) {
          $('.navbar-toggler').click();
        }
      });
    });
  </script>
  <!-- navbar end -->
  <?php
  include 'inc/footer.php';
  ?>
</body>

</html>