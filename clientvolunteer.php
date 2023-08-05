<?php
session_start();
require_once "config.php";
if($_SESSION['email']){}
else{header("location:signin.php");}
$email = $_SESSION['email']; 

// Fetch data from the "program" table
$sql = "SELECT * FROM program";
$result = $conn->query($sql);

$num_rows = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client | Volunteer Opportunities</title>
   <!-- Header Start -->
        <?php include("panelheader.php")?>
  <!-- Header End -->
        <div class="col-md-10">
            <div class="container mt-5 d-flex flex-column justify-content-center">
                <br> <br>
                <div class="row mb-3">
                    <div class="col">
                        <h2>Volunteer Opportunities</h2>
                    </div>
                </div>    
                    
                <div class="row">
                    <div class="col-sm-10">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr style="background-color: black;color: white;">
                                <th>Name</th>
                                <th>Location</th>
                                <th>Start Date</th>
                                <th>End Date</th>
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
                                    $id = $row['id'];
                                    echo '<tr>';
                                    echo '<td>' . $row['name'] . '</td>';
                                    echo '<td>' . $row['location'] . '</td>';
                                    echo '<td>' . $row['start_date'] . '</td>';
                                    echo '<td>' . $row['end_date'] . '</td>';
                                    echo '<td>';
                                    echo '<a href="clientreserve.php?id='.$id.'"><button type="button" class="btn btn-primary">
                                    Reserve</button></a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                        </tbody>
                        <?php
                            } else {
                                echo '<tbody>';
                                echo '<tr>';
                                echo '<tr><td colspan="5" style="text-align: center;">No Details</td>';
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

  
  <?php
// Close the database connection
$conn->close();
?>