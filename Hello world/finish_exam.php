<?php
// Start the session
session_start();

// Include the database connection file
include 'connection.php';

// Check if the user has started the exam
if (!isset($_SESSION['started'])) {
    // Redirect to the start page
    header('Location: take_exam2.php');
    exit;
}

// Get the exam ID
$exam_id = $_SESSION['exam_id']; 
// Get the user ID
$user_id =  $_SESSION['student_id']; 

// Get the score
$score = $_SESSION['score'];

// Insert the score into the results table
$query = "INSERT INTO result (Exam_id, Registration_no, Score) VALUES ('$exam_id', '$user_id', $score)";
mysqli_query($conn, $query);

// End the session
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Finish</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Exam Finished</h1>
        <h2>Your score: <?php echo $score; ?></h2>
        <a href="home.html" class="btn btn-primary">Start Over</a>
    </div>
</body>
</html>