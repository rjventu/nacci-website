<?php
session_start();

// Check if the email session variable is not set (user not signed in)
if (!isset($_SESSION['email'])) {
    // Redirect to the sign-in page
    header("Location: adminlogin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Home</title>
   <!-- Header Start -->
        <?php include('adminpanelheader.php') ?>
  <!-- Header End -->

      <!-- Content Area -->
      <div class="col-md-10  admindetails">
        <div class="container mt-4">
          <h1>Welcome to the Admin Panel</h1>
 
        </div>
      </div>
      <!-- end of Content Area -->
       <!-- Footer Start -->
       <?php include('adminpanelfooter.php') ?>
  <!-- Footer End -->