<?php
// Include the database connection file
require_once "config.php";


// Function to verify user credentials
function verifyUserCredentials($email, $password, $conn) {
    // Sanitize user input
    $email = mysqli_real_escape_string($conn, $email);

    // Fetch user data from the database based on the provided email
    $sql = "SELECT * FROM clientuser WHERE EmailAddress = '$email' limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["Password"];
        $Username  = $row["Name"];

        // Verify the hashed password
        if (password_verify($password, $hashedPassword)) {
            return true; // Passwords match, user authenticated successfully
        }
    }

    return false; // User not found or passwords don't match
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["emailaddress"];
    $password = $_POST["password"];
    $Username = "";
    // Call the verifyUserCredentials function
    if (verifyUserCredentials($email, $password, $conn)) {
        session_start();
        $_SESSION['email'] = $email; 
       

        $sql = "SELECT * FROM clientuser WHERE EmailAddress = '$email' limit 1";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $Username  = $row["Name"];
        }
        $_SESSION['username'] = $Username; 
        // Redirect the user to the dashboard or another page upon successful sign-in
        header("Location: clientuserpage.php");
        exit();
    } else {
        echo "Invalid email or password. Please try again.";
    }
}
?>
