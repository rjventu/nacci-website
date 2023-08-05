<?php
// Replace these values with your actual database credentials
require_once "config.php";
// Function to securely hash the password
function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

// Function to move the uploaded file to a specific folder
function moveUploadedFile($file)
{
    // Replace "uploads" with your desired folder path
    $targetFolder = "images/";
    $targetPath = $targetFolder . basename($file['name']);
    $filedataname = basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $filedataname;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["newName"];
    $position = $_POST["newPosition"];
    $email = $_POST["newEmailAddress"];
    $password = hashPassword($_POST["newPassword"]);

    // Handle uploaded file
    if (isset($_FILES["profileImage"]) && $_FILES["profileImage"]["error"] === UPLOAD_ERR_OK) {
        $photoName = moveUploadedFile($_FILES["profileImage"]);
    } else {
        $photoName = null; // Set to null if no file is uploaded
    }
   
    // SQL query to insert data into the adminuser table
    $sql = "INSERT INTO adminuser (Name, Position, EmailAddress, Password, Photoname) 
            VALUES ('$name', '$position', '$email', '$password', '$photoName')";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminmyprofile.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
