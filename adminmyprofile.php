<?php
 require_once "config.php";
session_start();


function getUserDataByEmail($email, $conn) {
  // Sanitize user input
  $email = mysqli_real_escape_string($conn, $email);

  // Fetch user data from the database based on the provided email
  $sql = "SELECT * FROM adminuser WHERE EmailAddress = '$email'";
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
    $Photoname = $userData['Photoname'];
    $Position = $userData['Position'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client | My Profile</title>
   <!-- Header Start -->
        <?php include('adminpanelheader.php') ?>
  <!-- Header End -->

      <!-- Content Area -->
   <!-- Your HTML body content here -->
<div class="col-md-10 admindetails">
    <div class="container mt-4">
        <h1>My Profile</h1>
        <div class="container mt-4">
            <div class="card mx-auto">
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Position</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($Position); ?>" readonly>
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
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" name="action" id="btnInsertnewData" value="insert">Insert</button>
                            <!-- <button type="button" class="btn btn-primary" name="action" id="btnEditnewData" value="edit">Edit</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="mdlInsertData">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Register new Admin</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <form action="adminsavenewdata.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="newName">Name</label>
                        <input type="text" class="form-control" id="newName" name="newName" required>
                    </div>
                    <div class="form-group">
                        <label for="groupName">EmailAddress:</label>
                        <input type="text" class="form-control" id="newEmailAddress" name="newEmailAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="activityLocation">Position:</label>
                        <input type="text" class="form-control" id="newPosition" name="newPosition" required>
                    </div>
                    <div class="form-group">
                        <label for="activityLocation">Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="profileImage">Upload Profile Image:</label>
                        <input type="file" class="form-control-file" id="profileImage" name="profileImage" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" id="saveChanges">Save Changes</button>
                    </div>
                </form>
            </div>


           
        </div>
    </div>
</div>


<div class="modal fade" id="mdlEditData">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Register new Admin</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="newName">Name</label>
                        <input type="text" class="form-control" id="newName" name="newName" required>
                    </div>
                    <div class="form-group">
                        <label for="groupName">EmailAddress:</label>
                        <input type="text" class="form-control" id="newEmailAddress" name="newEmailAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="activityLocation">Position:</label>
                        <input type="text" class="form-control" id="newPosition" name="newPosition" required>
                    </div>
                    <div class="form-group">
                        <label for="activityLocation">Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="profileImage">Upload Profile Image:</label>
                        <input type="file" class="form-control-file" id="profileImage" name="profileImage" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" id="saveChanges">Save Changes</button>
                    </div>
                </form>
            </div>


           
        </div>
    </div>
</div>

      <!-- end of Content Area -->
       <!-- Footer Start -->
       <?php include('adminpanelfooter.php') ?>
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

  $("#btnInsertnewData").click(function (){
        $("#mdlInsertData").modal("show")
  });
  $("#btnEditnewData").click(function (){
        alert(1)
  });
</script>
