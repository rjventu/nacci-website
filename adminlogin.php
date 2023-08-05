<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal</title>
  <!-- links -->
  <?php include('links.php')?>
</head>
<body>
 <!-- Header Start -->
 <?php include('header.php') ?>
  <!-- Header End -->
</head>
<body>
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
            <h2 class="card-title text-center mb-4">Welcome back, Admin!</h2>
            <form action="adminsignindata.php" method="POST">
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
            </form>
          </div>
        </div>
      </div>
    </div>
    <span>Go to <a href="signin.php"><i>User Portal.</i></a></span>
  </div>
  <br>
  <!-- Footer Start -->
  <?php include('footer.php') ?>
  <!-- Footer End -->
</body>
</html>