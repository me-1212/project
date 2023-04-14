<?php
    $HOST = "localhost";
    $USERNAME = "root";
    $PASS = "";
    $DATABASE = "sample";

    $conn = mysqli_connect($HOST, $USERNAME, $PASS, $DATABASE);

    if(mysqli_connect_errno())
    {
        echo "Connection Failed. ".mysqli_connect_errno();
        exit();
    }
?>