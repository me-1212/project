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
$user_id = $_SESSION['student_id'];

// Get the score
$score = $_SESSION['score'];

// Insert the score into the results table
$query = "INSERT INTO result (Exam_id, Registration_no, Score) VALUES ('$exam_id', '$user_id', $score)";
$result = mysqli_query($conn, $query);

if(!$result){
    // End the session
    session_destroy();
    header('Location: final.php?msg=1');
}
else{
    // End the session
    session_destroy();
    header('Location: final.php?msg=2');
}
?>