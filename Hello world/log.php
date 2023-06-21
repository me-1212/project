<?php
// Establish database connection
include "connection.php";

// When user clicks login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username field is empty
    if (empty($username))
        header("Location:login.php?error=Username is required");
    // Check if password field is empty
    else if (empty($password))
        header("Location:login.php?error=Password is required");
    else {
        $query = "SELECT * FROM student WHERE Username = '$username' AND Pass = $password ";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) == 1) {
            // If username and password is correct, go to face recognition module
            $python_script = 'faces.py';
            $python_interpreter = 'C:/Users/Kal/AppData/Local/Programs/Python/Python311/python.exe';
            $command = escapeshellcmd("$python_interpreter $python_script");
            // Execute the face recognition python file
            $output = shell_exec($command);
            // Read the result form file
            $recognized_label = file_get_contents('recognized_label.txt');
            // If face is recognized properly, redirect to student home page
            if (strcmp(strtoupper($recognized_label), $username) == 0) {
                header("Location:student_home.php?username=$username");
            }// If face does not match, display error
            elseif ($recognized_label == 'Face not recognized.') {
                header("Location:login.php?error=Face does not match.");
            } 
            else {
                header("Location:login.php?error=Face not checked.");
            }
        } // If username and password is not correct, display error message
        else {
            header("Location:login.php?error=Incorrect username or password. Try again.");
        }
    }
}
?>