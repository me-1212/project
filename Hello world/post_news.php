<?php
//connecting to db
include 'connection.php';

//post news
if (isset($_POST['save'])) {
    //get admin id
    $admin_id = $_POST['admin_id'];

    //get title
    $title = $_POST['title'];

    //get description
    $description = $_POST['description'];

    if (empty($admin_id)) {
        header("Location:post_news_form.php?msg=Admin id is required");
    } else if (empty($title)) {
        header("Location:post_news_form.php?msg=Title is required");
    } else if (empty($description)) {
        header("Location:post_news_form.php?msg=Description is required");
    } else{
        $query = "INSERT INTO news (Title, Full, Dat, Admin_id) VALUES ('$title', '$description', NOW(), '$admin_id')";
        if (mysqli_query($conn, $query)) {
            header("Location:post_news_form.php?msgs=News is successfully posted!");
        } else {
            header("Location:post_news_form.php?msg=Failed to post news.");
        }
    }
    
}

?>