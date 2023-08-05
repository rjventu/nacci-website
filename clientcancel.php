<?php
  session_start(); 
  require_once("config.php");

  //authenticating session
  if($_SESSION['email']){}
  else{header("location:login.php");} 

  if($_SERVER['REQUEST_METHOD'] == "GET")
  {
    $id = $_GET['id'];
    mysqli_query($conn, "UPDATE `volunteer` SET `status`='CANCELLED' WHERE `id`='$id'");
    header("location: clientreservation.php");
  }
?>