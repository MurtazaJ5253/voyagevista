<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destination Details</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/style.css">
  
  <style>
     .card {
      border: none;
      transition: transform 0.3s ease-in-out;
      margin-top: 20px;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card img {
      height: 400px;
      object-fit: cover;
    }
    .card-body {
      text-align: center;
    }
    </style>
</head>
<body>

<?php
include 'connection.inc.php';
include 'inc/header.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $destination_id = $_GET['id'];
    $destination_query = "SELECT * FROM destination WHERE des_id = $destination_id";
    $img_query = "SELECT * FROM images WHERE desc_id = $destination_id";
    $result = mysqli_query($conn, $destination_query);
    $result1 = mysqli_query($conn, $img_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo 'No destination found.';
        exit(); 
    }
} else {
    echo '<script type="text/javascript">
      Swal.fire({
          icon: "info",
          title: "No Detail found",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK"
      });
    </script>';
    exit(); 
}
?>

<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    if ($result1 && mysqli_num_rows($result1) > 0){
      while ($img = mysqli_fetch_assoc($result1)) {
        $image = $img['img_name'];
        echo '<div class="col">
                <div class="card">
                  <img src="' . $image . '" class="card-img-top" alt="Image">
                </div>
              </div>';
      }
    } else {
      echo '<script type="text/javascript">
              Swal.fire({
                icon: "info",
                title: "No image found",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
              });
            </script>';
    }
    ?>
  </div>
  
  <div class="card mb-4">
    <div class="card-body">
      <h1 class="card-title"><?php echo $row['name']; ?></h1>
      <p class="card-text"><strong>Details:</strong> <?php echo $row['detail']; ?></p>
      <p class="card-text"><strong>Address:</strong> <?php echo $row['address']; ?></p>
      <a href="journeydetail.php?id=<?php echo $destination_id; ?>" class="btn btn-primary">Plan Your Visit</a>
    </div>
  </div>
</div>
<?php
include 'inc/footer.php';
?>
</body>
</html>
