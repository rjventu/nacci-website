<?php
session_start();
require_once "config.php";
if($_SESSION['email']){}
else{header("location:signin.php");}
$email = $_SESSION['email']; 

// fetching current user's id using email
$user_result = mysqli_query($conn,"SELECT * from `clientuser` WHERE `EmailAddress` = '$email'");
$row = mysqli_fetch_assoc($user_result);
$user_id = $row['ClientID'];
mysqli_free_result($user_result);

// Fetch data from the "volunteer" table
$sql = "SELECT * FROM volunteer where `user_id` = '$user_id'";
$result = $conn->query($sql);

$num_rows = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client | My Reservation</title>
    <!-- Header Start -->
        <?php include('panelheader.php') ?>
    <!-- Header End -->
    
      <!-- Content Area -->
        <div class="col-md-10">
            <div class="container mt-5 d-flex flex-column justify-content-center">
                <br> <br>
                <div class="row mb-3">
                    <div class="col">
                        <h2>My Reservations</h2>
                    </div>
                </div>    
                    
                <div class="row">
                    <div class="col-sm-10">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr style="background-color: black;color: white;">
                                <th>Reservation ID</th>
                                <th>Activity Name</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                            // Display the table if there is data, otherwise display a message
                            if ($num_rows > 0) {
                            ?>
                        <tbody>
                        <?php
                                while ($row = $result->fetch_assoc()) 
                                {
                                    $prog_id = $row['prog_id'];
                                    // fetching details of connected program
                                    $prog_result = mysqli_query($conn,"SELECT * from `program` WHERE `id` = '$prog_id'");
                                    $prog_row = mysqli_fetch_assoc($prog_result);
                                    $prog_name = $prog_row['name'];
                                    $prog_location = $prog_row['location'];
                                    mysqli_free_result($prog_result);

                                    $id = $row['id'];
                                    echo '<tr>';
                                    echo '<td>' . $row['id'] . '</td>';
                                    echo '<td>' . $prog_name  . '</td>';
                                    echo '<td>' . $prog_location . '</td>';
                                    echo '<td>' . $row['date'] . '</td>';
                                    echo '<td>' . $row['status'] . '</td>';
                                    echo '<td>';
                                    if($row['status'] == "CANCELLED"){
                                        echo '<em>Not Applicable</em>';
                                    }else{
                                        echo '<a href="clientreservation_edit.php?id='.$id.'"><button type="button" class="btn btn-primary">
                                        Edit</button></a>';
                                        echo '<a href="#" onclick="myFunction('.$id.')"><button type="button" class="btn btn-danger ms-2">
                                        Cancel</button></a>';
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                        </tbody>
                        <?php
                            } else {
                                echo '<tbody>';
                                echo '<tr>';
                                echo '<tr><td colspan="6" style="text-align: center;">No Details</td>';
                                echo '</tr>';
                                echo '</tbody>';
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    <!-- div to close row from panelheader.php -->
    </div>     

      <!-- end of Content Area -->
       <!-- Footer Start -->
       <?php include('panelfooter.php') ?>
  <!-- Footer End -->
<script>
    function myFunction(id)
    {
      var r=confirm("Are you sure you want to cancel this reservation?");
      if (r==true)
      {
        window.location.assign("clientcancel.php?id=" + id);
      }
    }
</script>   
  
