<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

$conn = mysqli_connect("localhost", "root", "R61HGVkAuYGGsr", "cardropdown");

if (mysqli_connect_error()) {
    echo "Failed to connect... Code: " . mysqli_connect_errno();
}

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
