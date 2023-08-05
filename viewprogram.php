<?php
require_once "config.php";

$id_exists = false;

if(!empty($_GET['id']))
{
  $id = $_GET['id'];
  $_SESSION['id'] = $id;
  $id_exists = true;
}else{
  $id_exists = false;
}

//assigning session id (id of the program selected)
$id = $_SESSION['id']; 
//fetching values from database
$result = mysqli_query($conn,"SELECT * from `program` WHERE `id` = '$id'");
$row = mysqli_fetch_assoc($result);
//assigning values to variables, for display on the form
$prog_name = $row['name'];
$prog_location  = $row['location'];
$prog_description  = $row['description'];
$prog_start_date = $row['start_date'];
$prog_end_date = $row['end_date'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Program</title>

  <style>
    .prog-dates{
      color:#349f19;
      font-size: 1.1em;
      font-weight: bolder;
    }
    .prog-details-description{
      background-color:#cbe5e1;
      text-align:justify;
    }
  </style>
  
  <!-- links -->
  <?php include('links.php') ?>
</head>
<body>
   <!-- Header Start -->
   <header>
    <?php include('header.php') ?>
  </header>
  <!-- Header End -->
  <!-- Carousel Start -->
  <?php include('carousel.php') ?>
  <!-- Carousel End -->
  <!-- Page Title Start -->
  <div class="container mb-5">
    <div class="row">
      <div class="col d-flex justify-content-center nacci-title-box">
        <div class="nacci-title p-4">
          <h1>View Program</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  <!-- Program Details Start -->
  <div class="container mb-5 prog-details">
    <div class="row mb-4">
      <div class="col d-flex justify-content-between">
        <h2><?php echo $prog_name;?></h2>
        <div class="prog-details-buttons">
          <a href="signin.php"><button type="button" class="btn btn-primary">Reserve</button></a>
          <a href="donatetime.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
        </div>
      </div>  
    </div>
    <div class="row">
      <div class="col d-flex flex-column">
        <h4><i class="bi-geo-alt-fill pe-2"></i><?php echo $prog_location?></h4>
        <p class="prog-dates my-2"><?php echo $prog_start_date . ' to ' . $prog_end_date?></p>
      </div>
    </div>
    <div class="row mt-4 prog-details-description p-4">
      <div class="col">
        <p><?php echo $prog_description?></p>
      </div>
    </div>
  </div>
  <!-- Program Details End -->
  <!-- Footer Start -->
  <?php include('footer.php') ?>
  <!-- Footer End -->
</body>
</html>