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
    $profile = $userData['Photoname'];
    $idd = $userData['ID'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | My Profile</title>
   <!-- Header Start -->
        <?php include('adminpanelheader.php') ?>
  <!-- Header End -->

      <!-- Content Area -->
   <!-- Your HTML body content here -->
<div class="col-md-10 admindetails">

    <?php
    $conn = mysqli_connect("localhost", "root", "", "nacci");
    if (isset($_GET['id'])) {
        $get_id = $_GET['id'];
    }

    $result = mysqli_query($conn, "SELECT * FROM `program` WHERE `id`= '$get_id'");
    $row = mysqli_fetch_array($result);
    ?>

    <div class="container mt-4">
        <h1>View Programs</h1>
        <div class="container mt-4">
            <div class="card mx-auto">
                <div class="card-body">
                    <form action="admineditprog.php" method="post">
                        <div class="form-group">
                            <label for="name">ID:</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $row['id'] ?>" readonly>
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" readonly>
                            <label for="email">Location:</label>
                            <input type="text" class="form-control" name="loc" value="<?php echo $row['location'] ?>" readonly>
                            <label for="email">Description</label>
                            <input type="text" class="form-control" name="des" value="<?php echo $row['description'] ?>" readonly>
                            <label for="email">Start Date</label>
                            <input type="text" class="form-control" name="sdate" value="<?php echo $row['start_date'] ?>" readonly>
                            <label for="email">End Date</label>
                            <input type="text" class="form-control" name="edate" value="<?php echo $row['end_date'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <a href="adminManageProgram.php"><button type="button" class="btn btn-danger" name="action" style="float: right; margin-right: 15px;">Return</button></a><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['save'])) {
    $conn = mysqli_connect("localhost", "root", "", "nacci");

    $name = $_POST['name'];
    $loca = $_POST['loc'];
    $desc = $_POST['des'];
    $start = $_POST['sdate'];
    $end = $_POST['edate'];
    $updateID = $_POST['id'];

    $sql_query = mysqli_query($conn, "UPDATE `program` SET `name`='$name',`location`='$loca',`description`='$desc',`start_date`='$start',`end_date`='$end' WHERE `id`='$updateID'");

    if ($sql_query) {
        echo '<script>alert("Updated Successfully!")</script>';
        header("Location: admineditprog.php?id= " . $row['id'] . "");
    }
}
?>


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
                        <button type="submit" class="btn btn-info" id="saveChanges">Save</button>
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
                <h4 class="modal-title">Edit Profile</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <form action="admineditdata.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="id" value="<?php echo htmlspecialchars($idd); ?>" hidden><br>
                        <label for="newName">Name</label>
                        <input type="text" class="form-control" id="newName" name="newName" value="<?php echo htmlspecialchars($name); ?>">
                    </div>
                    <div class="form-group">
                        <label for="groupName">EmailAddress:</label>
                        <input type="text" class="form-control" id="newEmailAddress" name="newEmailAddress" value="<?php echo htmlspecialchars($email); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="activityLocation">Position:</label>
                        <input type="text" class="form-control" id="newPosition" name="newPosition" value="<?php echo htmlspecialchars($Position); ?>">
                    </div>
                    <div class="form-group">
                        <label for="profileImage">Upload Profile Image:</label>
                        <input type="file" class="form-control-file" id="profileImage" name="profileImage" value="<?php echo htmlspecialchars($profile); ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" id="saveChanges">Save Changes</button>
                    </div>
                </form>
            </div>
            <?php

            ?>
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
        $("#mdlEditData").modal("show")
  });
</script>
