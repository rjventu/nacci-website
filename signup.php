<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-up</title>
  <!-- links -->
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
          <h2 class="card-title text-center mb-4">Sign-Up</h2>
          <!-- Specify the PHP file to submit the form to -->
          <form action="usersavedata.php" method="POST">
            <div class="form-group">
              <label for="name">Name :</label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
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
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
            <br>
            <span>Already have an account?</span>  <br>
            <span><a href="signin.php"><i>Sign-in instead.</i></a></span>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

 
  <br>
  <!-- Footer Start -->
  <?php include('footer.php') ?>
  <!-- Footer End -->
</body>
</html>


