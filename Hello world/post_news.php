<?php
//connecting to db
include 'connection.php';

//post news
if(isset($_POST['save'])){
    //get admin id
    $admin_id = $_POST['admin_id'];

    //get title
    $title = $_POST['title'];

    //get description
    $description = $_POST['description'];

    //get date
    // $dat = strtotime("Y-m-d", $_POST['dat']);

    $query = "INSERT INTO news (Title, Full, Dat, Admin_id) VALUES ('$title', '$description', NOW(), '$admin_id')";
    if (mysqli_query($conn, $query)) {
        header("Location:post_news_form.php?msg=News is successfully posted!");
    }
    else {
        header("Location:post_news_form.php?msg=Failed to post news.");
    }
}





?>