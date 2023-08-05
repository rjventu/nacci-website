<?php
// Include the database configuration file
require_once "config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $programName = $_POST["programName"];
    $location = $_POST["Location"];
    $status = $_POST["Status"];

    // Validate the data if necessary

    // Insert data into the "reservation" table (replace 'reservation' with your actual table name)
    $sql = "INSERT INTO reservation (Name, Location, Status) VALUES ('$programName', '$location', '$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: clientreservation.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
