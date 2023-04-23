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


        //check whether the fields are empty or not
        if(empty($schedule_id)){
            header("Location:upload_QAs_form.php?msg=Schedule id is required");
        }else if(empty($admin_id)){
            header("Location:upload_QAs_form.php?msg=Admin id is required");
        }else if(empty($exam_name)){
            header("Location:upload_QAs_form.php?msg=Exam name is required");
        }else if(empty($day)){
            header("Location:upload_QAs_form.php?msg=Date is required");
        }else if(empty($start_time)){
            header("Location:upload_QAs_form.php?msg=Start time is required");
        }else if(empty($end_time)){
            header("Location:upload_QAs_form.php?msg=End time is required");
        }else{
            //if not empty, insert the value to database
            $query = "INSERT INTO schedule (Schedule_id, Admin_id, Exam_name, Dat, Start_time, End_time) 
                        VALUES ('$schedule_id', '$admin_id', '$exam_name', '$day','$start_time', '$end_time')";
            
            if (mysqli_query($conn, $query)) {

                //if for all subject is inserted, show schedule to review
                $sql ="SELECT COUNT(*) FROM exam";
                $result = mysqli_query($conn, $sql);
                $exam = mysqli_fetch_assoc($result)['COUNT(*)'];

                $sql ="SELECT COUNT(*) FROM schedule";
                $result = mysqli_query($conn, $sql);
                $max = mysqli_fetch_assoc($result)['COUNT(*)'];

                if($question_id == $max){
                        header("Location:display_schedule.php?msg=Schedule is successfully created");
                    }
                    // if not, go back to the form to insert the next 
                    else{
                        header("Location:create_schedule.php?msg=Successfully inserted. Insert the next.");
                    }
            }
            //if inserting fails, displays error message
            else {
                header("Location:upload_QAs_form.php?msg=Failed to insert.");
            }
        }
    }

?>