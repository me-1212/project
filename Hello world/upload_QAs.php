<?php
// connect to the database
include "connection.php";

if (isset($_POST['save'])) {

    $exam_id = $_POST['exam_id'];

    $question_id = $_POST['question_id'];

    $question = $_POST['question'];

    $ch_a = $_POST['ch_a'];

    $ch_b = $_POST['ch_b'];

    $ch_c = $_POST['ch_c'];

    $ch_d = $_POST['ch_d'];

    $answer = $_POST['answer'];

    //check whether the fields are empty or not
    if (empty($question_id)) {
        header("Location:upload_QAs_form.php?msg=Question number is required&id=$exam_id");
    } else if (empty($question)) {
        header("Location:upload_QAs_form.php?msg=Question is required&id=$exam_id");
    } else if (empty($ch_a)) {
        header("Location:upload_QAs_form.php?msg=Choice A is required&id=$exam_id");
    } else if (empty($ch_b)) {
        header("Location:upload_QAs_form.php?msg=Choice B is required&id=$exam_id");
    } else if (empty($ch_c)) {
        header("Location:upload_QAs_form.php?msg=Choice C is required&id=$exam_id");
    } else if (empty($ch_d)) {
        header("Location:upload_QAs_form.php?msg=Choice D is required&id=$exam_id");
    } else if (empty($answer)) {
        header("Location:upload_QAs_form.php?msg=Answer is required&id=$exam_id");
    } else {
        //if not empty, insert the value to database
        $query = "INSERT INTO question (Exam_id, Question_id, Question, Choice_1, Choice_2, Choice_3, Choice_4, Answer) 
                        VALUES ('$exam_id', $question_id, '$question', '$ch_a','$ch_b', '$ch_c', '$ch_d', '$answer')";
        if (mysqli_query($conn, $query)) {

            //if number of question inserted reaches the limit, show all questions to review
            $sql = "SELECT No_of_ques FROM exam WHERE Exam_id = '$exam_id'";
            $result = mysqli_query($conn, $sql);
            $max = mysqli_fetch_assoc($result)['No_of_ques'];

            if ($question_id == $max) {
                header("Location:display_QAs.php?msgs=All questions are successfully inserted. Here is the preview&id=$exam_id");
            }
            // if question limit is not reached, go back to the form to insert the next question
            else {
                header("Location:upload_QAs_form.php?msgs=The question is successfully inserted. Insert the next question&id=$exam_id");
            }
        }
        //if inserting fails, displays error message
        else {
            header("Location:upload_QAs_form.php?msg=Failed to insert question.");
        }
    }
}


if (isset($_POST['update'])) {

    $exam_id = $_POST['exam_id'];

    $question_id = $_POST['question_id'];

    $question = $_POST['question'];

    $ch_a = $_POST['ch_a'];

    $ch_b = $_POST['ch_b'];

    $ch_c = $_POST['ch_c'];

    $ch_d = $_POST['ch_d'];

    $answer = $_POST['answer'];

    //check whether the fields are empty or not
    if (empty($question_id)) {
        header("Location:display_QAs.php?msg=Error! Nothing is updated&id=$exam_id");
    } else if (empty($question)) {
        header("Location:display_QAs.php?msg=Error! Nothing is updated&id=$exam_id");
    } else if (empty($ch_a)) {
        header("Location:display_QAs.php?msg=Error! Nothing is updated&id=$exam_id");
    } else if (empty($ch_b)) {
        header("Location:display_QAs.php?msg=Error! Nothing is updated&id=$exam_id");
    } else if (empty($ch_c)) {
        header("Location:display_QAs.php?msg=Error! Nothing is updated&id=$exam_id");
    } else if (empty($ch_d)) {
        header("Location:display_QAs.php?msg=Error! Nothing is updated&id=$exam_id");
    } else if (empty($answer)) {
        header("Location:display_QAs.php?msg=Error! Nothing is updated&id=$exam_id");
    } else {
        //if not empty, update the value to database
        $query = "UPDATE question SET Question = '$question', Choice_1 =  '$ch_a', Choice_2 ='$ch_b', Choice_3 = '$ch_c', 
                        Choice_4 ='$ch_d' , Answer = '$answer' WHERE Exam_id = '$exam_id' AND Question_id = $question_id";
        //if update successful, display successful message
        if (mysqli_query($conn, $query)) {
            header("Location:display_QAs.php?msgs=Update is successful.&id=$exam_id");
        }
        //if inserting fails, displays error message
        else {
            header("Location:display_QAs.php?msg=Failed to update question&id=$exam_id");
        }
    }
}
?>