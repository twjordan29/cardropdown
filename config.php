<?php

session_start();

$conn = mysqli_connect("localhost", "root", "jordan88", "vehicles");

function login()
{
    global $conn;

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $statement = mysqli_query($conn, "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'");
    if (mysqli_num_rows($statement) == 1) {
        $_SESSION['username'] = $username;
        header("location: index.php");
    }
}

function isLoggedIn()
{
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}
