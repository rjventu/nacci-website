<?php
session_start();
require_once "config.php";

if($_SESSION['email']){}
else{header("location:login.php");}
$email = $_SESSION['email'];
$id_exists = false;

if(!empty($_GET['id']))
{
  $id = $_GET['id'];
  $_SESSION['id'] = $id;
  $id_exists = true;
}else{
  $id_exists = false;
}

//assigning session id (id of the program selected)
$id = $_SESSION['id']; 
//fetching initial values from table
$result = mysqli_query($conn,"SELECT * from `program` WHERE `id` = '$id'");
$row = mysqli_fetch_assoc($result);
//assigning initial values to variables, for display on the form
$prog_name = $row['name'];
$prog_location  = $row['location'];
$prog_start_date = $row['start_date'];
$prog_end_date = $row['end_date'];

$name = $date = $participants = $person = $contact_num = null;
$name_err = $date_err = $participants_err = $person_err = $contact_num_err = null;

if($_SERVER['REQUEST_METHOD'] == "POST") 
{ 
  $input_name = trim($_POST['name']);
  $input_date = trim($_POST['date']);
  $input_participants = trim($_POST['participants']);
  $input_person = trim($_POST['person']);
  $input_contact_num  = trim($_POST['contact_num']);

  // Validate Name
  if(empty($input_name)){
    $name_err = "Please enter a company or group name.";
  }else{
    $name = $input_name;
  }

  // Validate Date
  if(empty($input_date)){
    $date_err = "Please enter a date.";
  }else if($input_date > $prog_end_date || $input_date < $prog_start_date){
    $date_err = "Please enter a date within the program's scheduled dates.";
  }else{
    $date = $input_date;
  }

  // Validate No. of Participants
  if(empty($input_participants)){
    $participants_err = "Please enter the number of participants.";
  }else{
    $participants = $input_participants;
  }

  // Validate Point Person
  if(empty($input_person)){
    $person_err = "Please enter a name for your point person.";
  }else{
    $person = $input_person;
  }

  // Validate Contact Number
  if(empty($input_contact_num)){
    $contact_num_err = "Please enter the point person's contact number.";
  }else{
    $contact_num = $input_contact_num;
  }

  //if there are no errors, continue with program
  if(empty($name_err) && empty($date_err) && empty($participants_err) && empty($person_err) && empty($contact_num_err))
  {
    // fetching current user's id using email
    $user_result = mysqli_query($conn,"SELECT * from `clientuser` WHERE `EmailAddress` = '$email'");
    $row = mysqli_fetch_assoc($user_result);
    $user_id = $row['ClientID'];
    mysqli_free_result($user_result);

    // inserting inputs into volunteer table 
    $result = mysqli_query($conn,"INSERT INTO volunteer (name, location, date, participants, person, contact_num, user_id, prog_id) VALUES ('$name','$prog_location','$date','$participants','$person','$contact_num','$user_id','$id')");
    if($result)
    {
      Print '<html><body><script>alert("Successfully reserved a slot!");</script></body></html>';
      Print '<script>window.location.assign("clientvolunteer.php");</script>'; 
    }else{
      Print '<html><body><script>alert("Oops, something went wrong. Try again later.");</script></body></html>';
      Print '<script>window.location.assign("clientvolunteer.php");</script>';
    }
    mysqli_free_result($result);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client | Reserve a Slot</title>
  <style>
    .form-group{
      margin-bottom:20px;
    }
  </style>
   <!-- Header Start -->
        <?php include("panelheader.php")?>
  <!-- Header End -->
        <div class="col-md-10">
            <div class="container mt-5 d-flex flex-column justify-content-center">
                <br> <br>
                <div class="row mb-3">
                    <div class="col">
                        <h2>Reserve a Slot</h2>
                    </div>
                </div>    
                    
                <div class="row">
                    <div class="col-sm-10">
                    <!-- Content Start -->
                    <div class="edit-form-container">
                      <form action="clientreserve.php" method="post">
                        <!-- container start -->
                        <div class="container">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="progName">Activity Name</label>
                                <input type="text" class="form-control" id="progName" name="prog_name" value="<?php echo $prog_name?>" disabled>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="progLocation">Location of Activity</label>
                                <input type="text" class="form-control" id="progLocation" name="prog_location" value="<?php echo $prog_location?>" disabled>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-4">
                                <div class="form-group">
                                  <label for="name">Company or Group Name</label>
                                  <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo $name; ?>" >
                                  <span class="invalid-feedback"><?php echo $name_err;?></span>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="form-group">
                                  <label for="date">Date of Activity</label>
                                  <input type="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" id="date" name="date" value="<?php echo $date; ?>" >
                                  <span class="invalid-feedback"><?php echo $date_err;?></span>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="form-group">
                                  <label for="participants">Number of Participants</label>
                                  <input type="number" class="form-control <?php echo (!empty($participants_err)) ? 'is-invalid' : ''; ?>" id="participants" name="participants" value="<?php echo $participants; ?>" >
                                  <span class="invalid-feedback"><?php echo $participants_err;?></span>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label for="person">Point Person</label>
                                  <input type="text" class="form-control <?php echo (!empty($person_err)) ? 'is-invalid' : ''; ?>" id="person" name="person" value="<?php echo $person; ?>" >
                                  <span class="invalid-feedback"><?php echo $person_err;?></span>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label for="contactNum">Contact Number</label>
                                  <input type="text" class="form-control <?php echo (!empty($contact_num_err)) ? 'is-invalid' : ''; ?>" id="contactNum" name="contact_num" value="<?php echo $contact_num; ?>" >
                                  <span class="invalid-feedback"><?php echo $contact_num_err;?></span>
                                </div> 
                              </div>
                            </div>
                          </div> 
                          <div class="form-group-submit mt-3 d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary" name="submit" value="Done">
                            <a href="clientvolunteer.php"><button type="button" class="btn btn-secondary ms-2">Cancel</button></a>
                          </div>
                        </div>
                        <!-- container end -->
                      </form>
                    </div>
                    <!-- Content End -->
                    </div>
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