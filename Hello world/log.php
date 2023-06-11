<?php

    include "connection.php";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username))
            header("Location:login.php?error=Username is required");
        else if(empty($password)) 
            header("Location:login.php?error=Password is required");
        else{
            $query = "SELECT * FROM student WHERE Username = '$username' AND Pass = $password ";
            $result = mysqli_query($conn, $query);
            // $row = mysqli_fetch_assoc($result);
            if($result){
                
                $python_script = 'faces.py';
                $python_interpreter = 'C:\Users\ETHIOPIA\AppData\Local\Programs\Python\Python311\python.exe'; 
                $command = escapeshellcmd("$python_interpreter $python_script");
                $output = shell_exec($command);
                $recognized_label = file_get_contents('recognized_label.txt');
                if(strcmp(strtoupper($recognized_label), $username) == 0){
                    header("Location:student_home.php?username=$username");
                }elseif($recognized_label == 'Face not recognized.'){
                    header("Location:login.php?error=Face not recognized.");
                }else{
                    header("Location:login.php?error=Face not checked.");
                }            
            }else{
                    header("Location:login.php?error=Incorrect username or password please try again");
                }
            }
        }
?>