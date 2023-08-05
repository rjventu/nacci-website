<?php
 require_once "config.php";
session_start();


function getUserDataByEmail($email, $conn) {
  // Sanitize user input
  $email = mysqli_real_escape_string($conn, $email);

  // Fetch user data from the database based on the provided email
  $sql = "SELECT * FROM clientuser WHERE EmailAddress = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      return $row;
  } else {
      return false; // User not found
  }
}


// Get the user data using the email stored in the session
$userData = getUserDataByEmail($_SESSION['email'], $conn);

// If user data is found, extract the values
if ($userData) {
    $name = $userData['Name'];
    $email = $userData['EmailAddress'];
    $hashedPassword = $userData['Password'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client | My Profile</title>
   <!-- Header Start -->
        <?php include('panelheader.php') ?>
  <!-- Header End -->

      <!-- Content Area -->
   <!-- Your HTML body content here -->
<div class="col-md-10 admindetails">
    <div class="container mt-4">
        <h1>My Profile</h1>
        <div class="container mt-4">
            <div class="card mx-auto">
                <div class="card-body">
                    <form action="/submit_registration" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($hashedPassword); ?>" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="showHideBtn">Show</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


      <!-- end of Content Area -->
       <!-- Footer Start -->
       <?php include('panelfooter.php') ?>
  <!-- Footer End -->

  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const showHideBtn = document.getElementById("showHideBtn");

    showHideBtn.addEventListener("click", function () {
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showHideBtn.textContent = "Hide";
      } else {
        passwordInput.type = "password";
        showHideBtn.textContent = "Show";
      }
    });
  });
</script>
