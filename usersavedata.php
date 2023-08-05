<?php
 require_once "config.php";


 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["emailaddress"];
    $password = $_POST["password"];

    // Call the addUserToDatabase function
    if (addUserToDatabase($name, $email, $password, $conn)) {
        echo "User added successfully!";
    } else {
        echo "Error occurred while adding the user.";
    }
}
 function addUserToDatabase($name, $email, $password, $conn) {
    // Sanitize user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query
    $sql = "INSERT INTO clientuser (Name, EmailAddress, Password) VALUES ('$name', '$email', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        header("Location: signin.php");
        exit();
    } else {
        return false; // Error occurred while adding the user
    }
}
