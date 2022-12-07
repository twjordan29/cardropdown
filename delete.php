<?php
include('config.php');

if (isset($_GET['id'])) {
    $vehId = $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM vehicles WHERE id='$vehId'");

    if ($delete) {
        header("location: index.php");
    }
}
