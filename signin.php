<?php
// Add this code at the top of the signin.php file to allow logout
session_start();

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: signin.php");
    exit();
}

// ... (your existing sign-in logic) ...

// If the user is already signed in, redirect to the dashboard
if (isset($_SESSION['email'])) {
    header("Location: clientuserpage.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-in</title>
  <?php include('links.php')?>
</head>
<body>
 <!-- Header Start -->
 <?php include('header.php') ?>
  <!-- Header End -->
  <br>
  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-30">
      <div class="col-md-6 d-flex justify-content-center">
        <!-- Replace 'your-photo.jpg' with the path to your photo -->
        <img src="assets/remake.png" alt="User Photo" class="img-fluid mb-4">
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Sign In</h2>
            <form action="usersignindata.php" method="POST">
          <div class="form-group">
            <label for="emailaddress">Email Address:</label>
            <input type="text" id="emailaddress" name="emailaddress" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
          </div>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
          <br>
          <span>Dont have an account?</span>  <br>
          <span>Sign-up <a href="signup.php"><i>here.</i></a></span>
        </form>
          </div>
        </div>
      </div>
    </div>
    <span>Go to <a href="adminlogin.php"><i>Admin Portal.</i></a></span>
  </div>
 
  
  <br>
  <!-- Footer Start -->
  <?php include('footer.php') ?>
  <!-- Footer End -->
</body>
</html>