<?php
require_once "config.php";

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
  <title>Donate Your Time</title>
  
  <!-- links -->
  <?php include('links.php') ?>
</head>
<body>
   <!-- Header Start -->
   <header>
    <?php include('header.php') ?>
  </header>
  <!-- Header End -->
  <!-- Carousel Start -->
  <?php include('carousel.php') ?>
  <!-- Carousel End -->
  <!-- Page Title Start -->
  <div class="container mb-5">
    <div class="row">
      <div class="col d-flex justify-content-center nacci-title-box">
        <div class="nacci-title p-4">
          <h1>Donate Your Time</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  <!-- Programs Start -->
  <div class="container mb-5">
    <div class="row mb-5">
      <div class="col d-flex flex-column align-items-center">
        <h1 class="mb-5">Volunteer Today!</h1>
        <h5>Interested in donating your time and energy to our cause?</h5>
        <h5>Reserve a slot in one of our volunteer programs below!</h5>
      </div>
    </div>
    <div class="row sr-table-wrapper px-4">
      <div class="col my-5 d-flex flex-column align-items-center">
        <!-- table start -->
        <table class="table" id="srTable">
          <thead class="">
            <tr>
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
          <tbody class="table-group-divider">
            <?php
              while ($row = $result->fetch_assoc()) 
              {
                  $id = $row['id'];
                  echo '<tr>';
                  echo '<td><b>' . $row['name'] . '</b></td>';
                  echo '<td>' . $row['location'] . '</td>';
                  echo '<td>' . $row['start_date'] . '</td>';
                  echo '<td>' . $row['end_date'] . '</td>';
                  echo '<td>';
                  echo '<a href="signin.php"><button type="button" class="btn btn-primary">
                  Reserve</button></a>
                  <a href="viewprogram.php?id='.$id.'"><button type="button" class="btn btn-secondary">
                  View</button></a>';
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
        <!-- table end -->
      </div>
    </div>
    <div class="row my-5">
      <div class="col" style="text-align:center">
        <p>Can't plant a tree yourself but still want to? No worries! Just <a href="contact.php"><em>send</em></a> us a message, and we'll happily plant one for you!</p>
      </div>
    </div>
  </div>
  <!-- Programs End -->
  <!-- Notes Start -->
  <div class="container-fluid notes">
    <div class="container mt-5 p-5">
      <div class="row mb-5">
        <div class="col mt-5 mb-3" style="text-align:center;">
          <h2>Important Notes</h2>
        </div>
      </div>
      <div class="row">
        <!-- left col -->
        <div class="col-md-6">
          <div class="row">
            <div class="col mb-4">
              <h3>Reservation</h3>
              <ul>
                <li>For date reservation, please make a 50% reservation downpayment on or before the set date.</li>
                <li>For guaranteed confirmation please settle the balance one week before the reserved date.</li>
                <li>Confirmed Trip Voucher will be issued once the deposit slip for the balance is emailed.</li>
                <li>Please call 09155101600 to check if there are still slots.</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col mb-4">
            <h3>Payment</h3>
              <ul>
                <li>After making a successful booking, please send payment at Las Pinas Home Office.</li>
                <div class="payments my-4">
                  <h5>Payment Channels</h5>
                  <div class="payment-buttons">
                    <a href="donatetreasures.php"><button type="button" class="btn btn-secondary">Banco De Oro</button></a>
                    <a href="donatetreasures.php"><button type="button" class="btn btn-secondary ms-2">Land Bank</button></a>
                  </div>
                </div>
                <li>Scan the deposit slip and email at mother_nature888@yahoo.com.</li>
                <li>Then, we will email back the Official Receipt and Certificate of Booking Confirmation, with a more detailed itinerary.</li>
                <li>Upon confirmation of logistics on your target date, we will send Statement of Account soonest.</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- right col -->
        <div class="col mb-4">
          <h3>Other Notes</h3>
          <ul>
            <li>Late Registrants will be accommodated if there are still spaces available.</li>
            <li>Unused reservation fee, services, rooms, tickets, meals are non-refundable, non-rebookable, and non-offsettable to other paid guests. BUT transferable to another new guest 3 days before the trip. Please notify the club; otherwise, the reservation will be forfeited.</li>
            <li>FOR CSR/School Field Trips/Team Buildings: Please give your target date, trip specifications, and budget EARLIEST POSSIBLE, so we can work on a customized package trip and logistics.</li>
            <li>Upon confirmation of logistics on your target date, we will send Statement of Account soonest.</li>
            <li>All costs and expenses outside the itinerary and package inclusions will be shouldered by the guest and not offsettable from other paid inclusions.</li>
            <li>Reservation is guaranteed after the full payment.</li>
            <li>Rate is subject to change without prior notice provided the reservation downpayment is already paid.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Notes End -->
  <!-- Footer Start -->
  <?php include('footer.php') ?>
  <!-- Footer End -->
</body>
</html>