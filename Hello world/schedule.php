<?php
    
    // connect to the database
    include "connection.php";

    if(isset($_POST['save'])){

        $schedule_id = $_POST['schedule_id'];

        $admin_id = $_POST['admin_id'];

        $exam_name = $_POST['exam_name'];

        $day = $_POST['day'];

        $start_time = $_POST['start_time'];

        $end_time = $_POST['end_time'];

        $stream = $_POST['stream'];


        //check whether the fields are empty or not
        if(empty($schedule_id)){
            header("Location:create_schedule.php?msg=Schedule id is required");
        }else if(empty($admin_id)){
            header("Location:crate_schedule.php?msg=Admin id is required");
        }else if(empty($exam_name)){
            header("Location:create_schedule.php?msg=Exam name is required");
        }else if(empty($day)){
            header("Location:create_schedule.php?msg=Date is required");
        }else if(empty($start_time)){
            header("Location:create_schedule.php?msg=Start time is required");
        }else if(empty($end_time)){
            header("Location:create_schedule.php?msg=End time is required");
        }else if(empty($stream)){
                header("Location:create_schedule.php?msg=Stream is required");
        }else{
            //if not empty, insert the value to database
            $query = "INSERT INTO schedule (Schedule_id, Admin_id, Exam_name, Stream, Dat, Start_time, End_time) 
                        VALUES ('$schedule_id', '$admin_id', '$exam_name', '$stream', '$day','$start_time', '$end_time')";
            
            if (mysqli_query($conn, $query)) {

                header("Location:create_schedule.php?msg=Successfully inserted. Insert the next.");
                //if for all subject is inserted, show schedule to review
                // $sql ="SELECT COUNT(*) FROM exam";
                // $result = mysqli_query($conn, $sql);
                // $exam = mysqli_fetch_assoc($result)['COUNT(*)'];

                // $sql ="SELECT COUNT(*) FROM schedule";
                // $result = mysqli_query($conn, $sql);
                // $max = mysqli_fetch_assoc($result)['COUNT(*)'];

                // if($question_id == $max){
                //         header("Location:display_schedule.php?msg=Schedule is successfully created");
                //     }
                //     // if not, go back to the form to insert the next 
                //     else{
                //         header("Location:create_schedule.php?msg=Successfully inserted. Insert the next.");
                //     }
            }
            //if inserting fails, displays error message
            else {
                header("Location:create_schedule.php?msg=Failed to insert.");
            }
        }
    }

    if(isset($_POST['display'])){
        header("Location:display_schedule.php");
    }

?>