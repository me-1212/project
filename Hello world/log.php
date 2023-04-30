<?php
    session_start();
    include "connection.php";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

    if(empty($username))
        header("Location:login.php?error=Username is required");
    else if(empty($password)) 
        header("Location:login.php?error=Password is requied");
    else{
        $query = "SELECT * FROM student";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if($row["Username"]== $username && $row["Pass"] == $password){
            header("Location:student_home.php?username=$username");
        }
        else{
            header("Location:login.php?error=Incorrect username or password please try again");
        }
    }
    }
?>
