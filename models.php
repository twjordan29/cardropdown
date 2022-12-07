<?php
$conn = mysqli_connect("localhost", "root", "jordan88", "vehicles");

$vehicleMake = $_POST['vehicleMake'];

$models = mysqli_query($conn, "SELECT * FROM vehicles WHERE make = '$vehicleMake'");
while ($getModels = mysqli_fetch_assoc($models)) {
    echo "<option value='" . $getModels['meg'] . "'>" . $getModels['meg'] . "</option>";
}
