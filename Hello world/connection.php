<?php

// Set host name
$HOST = "localhost";
// Set username
$USERNAME = "root";
// Set password
$PASS = "";
// Set database name
$DATABASE = "sample";

// Establish the connection
$conn = mysqli_connect($HOST, $USERNAME, $PASS, $DATABASE);

// Handle if error occurs during connecting
if (mysqli_connect_errno()) {
    echo "Connection Failed. " . mysqli_connect_errno();
    exit();
}
?>