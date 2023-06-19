<?php

// Start the connection to database
include "connection.php";

// When the user clicks login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username field is empty
    if (empty($username)) {
        header("Location:login_ad.php?error=Username is required.");
    } 
    // Check if password field is empty
    else if (empty($password)) {
        header("Location:login_ad.php?error=Password is required.");
    }
    else {
        $query = "SELECT * FROM account";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if ($row["username"] == $username && $row["pass"] == $password) {
            header("Location:admin_home.php");      // If correct username and password, redirect to admin home page
        } else {
            header("Location:login_ad.php?error=Incorrect username or password.");
        }
    }
}
?>