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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Admin | Manage Programs</title>
   <!-- Header Start -->
        <?php include('adminpanelheader.php') ?>
  <!-- Header End -->

      <!-- Content Area -->
   <!-- Your HTML body content here -->
<div class="col-md-10 admindetails">
    <div class="container mt-4">
        <h1>Manage Programs</h1>
        <button type="button" class="btn btn-primary" name="action" id="btnInsertnewData" value="insert" style="float: right; margin-right: 15px;">Add Programs</button><br>
        <div class="container mt-4">
            <div class="card mx-auto">
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <!-- <button type="button" class="btn btn-primary" name="action" id="btnInsertnewData" value="insert">Add Programs</button> -->
                            <table class="table" style="margin: 10px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT * FROM `program`";
                                    $result = $conn->query($sql);
                                    

                                    while ($row = $result->fetch_assoc()) {

                                        $admin_id = $row["admin_id"];
                                        //fetching initial values from program table
                                        $admin_result = mysqli_query($conn,"SELECT * from `adminuser` WHERE `ID` = '$admin_id'");
                                        $admin_row = mysqli_fetch_assoc($admin_result);
                                        //assigning initial values to variables, for display on the form
                                        $admin_name = $admin_row['Name'];
                                        mysqli_free_result($admin_result);

                                        echo "<tr>
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["location"] . "</td>
                                        <td>" . $row["start_date"] . "</td>
                                        <td>" . $row["end_date"] . "</td>
                                        <td>" . $admin_name . "</td>
                                        <td>"?>
                                            <a href='adminviewprog.php?id=<?= $row['id'] ?>'><i class='fa-solid fa-eye'></i></a>
                                            <a href='admineditprog.php?id=<?= $row['id'] ?>' id='btnEditnewData' style='margin: 4px;'><i class='fa-solid fa-pen-to-square'></i></a>
                                            <a href='adminManageProgram.php?id=<?= $row['id'] ?>'><i class='fa-solid fa-trash'></i></a>
                                        <?php "</td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['id'])) {
    $id_del = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `program` WHERE `id`= '$id_del'");

    if ($delete) {
        echo '<script>alert("Deleted Successfully!")</script>';
    }
}

?>



<div class="modal fade" id="mdlInsertData">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Programs</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <form action="adminManageProgram.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="newName">Name</label>
                        <input type="text" class="form-control" id="newName" name="newName" required>
                    </div>
                    <div class="form-group">
                        <label for="groupName">Location:</label>
                        <input type="text" class="form-control" id="newEmailAddress" name="loc" required>
                    </div>
                    <div class="form-group">
                        <label for="activityLocation">Description:</label>
                        <input type="text" class="form-control" id="newPosition" name="des" required>
                    </div>
                    <div class="form-group">
                        <label for="activityLocation">Start Date:</label>
                        <input type="date" class="form-control" id="newPosition" name="sdate" required>
                    </div>
                    <div class="form-group">
                        <label for="activityLocation">End Date:</label>
                        <input type="date" class="form-control" id="newPosition" name="edate" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" class="btn btn-info" id="saveChanges">Save Changes</button> -->
                        <input type="submit" class="btn btn-primary" name="add" value="ADD">
                    </div>
                </form>
            </div>

            <?php
            if (isset($_POST['add'])) {

                $name = $_POST['newName'];
                $loca = $_POST['loc'];
                $desc = $_POST['des'];
                $start = $_POST['sdate'];
                $end = $_POST['edate'];
                
                $sql = mysqli_query($conn, "INSERT INTO `program`(`name`, `location`, `description`, `start_date`, `end_date`, `admin_id`) VALUES ('$name','$loca','$desc','$start','$end', 1)");

                if ($sql) {
                    echo '<script>alert("Added Successfully!")</script>';
                }
            }
            ?>
           
        </div>
    </div>
</div>


<div class="modal fade" id="mdlEditData">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="newName">Name</label>
                        <input type="text" class="form-control" id="newName" name="newName">
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
        $("#mdlEditData").modal("show")
  });
</script>
