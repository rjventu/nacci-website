<?php
if (isset($_GET['id'])) {
    $id_del = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `program` WHERE `id`= '$id_del'");

    if ($delete) {
        echo '<script>alert("Deleted Successfully!")</script>';
    }
}

?>