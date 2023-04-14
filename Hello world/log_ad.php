<?php
    session_start();
    include "connection.php";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username)){
            header("Location:login_ad.php?error=Username is required");
        }
        else if(empty($password)){
            header("Location:login_ad.php?error=Password is required");
        }
        else{
            $query = "SELECT * FROM account";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            if($row["username"]== $username && $row["pass"] == $password){
                header("Location:http://www.google.com");
            }
            else{
                header("Location:login_ad.php?error=Incorrect username or password please try again");
            }
        }     
    }
?>
