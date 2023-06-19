<?php

// connect to the database
include "connection.php";

// When create button is clicked
if (isset($_POST['save'])) {
    $schedule_id = $_POST['schedule_id'];
    $admin_id = $_POST['admin_id'];
    $exam_name = $_POST['exam_name'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $stream = $_POST['stream'];

    //check whether the fields are empty or not
    if (empty($schedule_id)) {
        header("Location:create_schedule.php?msg=Schedule id is required");
    } else if (empty($admin_id)) {
        header("Location:create_schedule.php?msg=Admin id is required");
    } else if (empty($exam_name)) {
        header("Location:create_schedule.php?msg=Exam name is required");
    } else if (empty($day)) {
        header("Location:create_schedule.php?msg=Date is required");
    } else if (empty($start_time)) {
        header("Location:create_schedule.php?msg=Start time is required");
    } else if (empty($end_time)) {
        header("Location:create_schedule.php?msg=End time is required");
    } else if (empty($stream)) {
        header("Location:create_schedule.php?msg=Stream is required");
    } else {
        //if not empty, insert the value to database
        $query = "INSERT INTO schedule (Schedule_id, Admin_id, Exam_name, Stream, Dat, Start_time, End_time) 
                        VALUES ('$schedule_id', '$admin_id', '$exam_name', '$stream', '$day','$start_time', '$end_time')";
        if (mysqli_query($conn, $query)) {
            header("Location:create_schedule.php?msgs=Successfully inserted. Insert the next.");
        }
        //if inserting fails, displays error message
        else {
            header("Location:create_schedule.php?msg=Failed to insert.");
        }
    }
}

// if display button s clicked
if (isset($_POST['display'])) {
    header("Location:display_schedule.php");
}

// if update button is clicked
if(isset($_POST['update'])){
    $schedule_id = $_POST['schedule_id'];
    $admin_id = $_POST['admin_id'];
    $exam_name = $_POST['exam_name'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $stream = $_POST['stream'];

    // Update the value to database
    $query = "UPDATE schedule SET Admin_id = '$admin_id', Exam_name = '$exam_name', Stream = '$stream', Dat ='$day', 
        Start_time = '$start_time', End_time ='$end_time' ) WHERE Schedule_id = '$schedule_id'";
    if (mysqli_query($conn, $query)) {
        header("Location:display_schedule.php");
    }
    else {
        header("Location:display.php");
    }
}
?>