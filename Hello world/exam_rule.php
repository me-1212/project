<?php

// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// connect to database
include 'connection.php';

$user = $_GET['user'];
$id = $_GET['id'];
$query = "SELECT * FROM exam WHERE Exam_id = '$id'";
$result = mysqli_query($conn, $query);
$exam = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Examination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/exam.css" rel="stylesheet">
</head>
<body style="background-color: #454868;">
    <section>
        <div class="container">
            <div class="row gx-0">
                <div class="rule">
                    <h4> MINISTRY OF EDUCATION <br> ETHIOPIAN UNIVERSITY ENTRANCE EXAMINATION </h4>
                    <h5> TIME ALLOWED:
                        <?php echo ($exam['Time']) / 60; ?> HOURS
                    </h5>
                    <h6> GENERAL DIRECTIONS </h6>
                    <p> THIS IS <span>
                            <?php echo strtoupper($exam['Exam_name']); ?>
                        </span> THE EXAMINATION CONTAINS <span>
                            <?php echo $exam['No_of_ques']; ?>
                        </span> QUESTIONS.
                        ATTEMPT ALL THE ITEMS.
                        THERE IS ONLY ONE BEST ANSWER FOR EACH ITEM.
                        CHOOSE THE BEST ANSWER FROM THE SUGGESTED OPTIONS AND SELECT
                        THE LETTER OF YOUR CHOICE. </p>
                    <p> YOU WILL BE ALLOWED TO WORK FOR <span>
                            <?php echo ($exam['Time']) / 60; ?>
                        </span> HOURS.
                        IF YOU FINISH BEFORE TIME IS CALLED,
                        YOU CAN REVIEW WHAT YOU HAVE DONE. IF TIME IS UP, THE SYSTEM WILL STOP DISPLAYING QUESTIONS.
                        THUS, TRY TO USE YOUR TIME PROPERLY.
                        ANY FORM OF CHEATING OR AN ATTEMPT TO CHEAT IN THE EXAMINATION HALL
                        WILL RESULT IN AN AUTOMATIC DISMISSAL FROM THE EXAMINATION HALL AND
                        CANCELLATION OF YOUR SCORE(S).</p>
                    <h5 style="font-weight:bold; margin-left:300px;"> GOOD LUCK!!!</h5>
                    <p style="font-weight:bold; margin-left:100px;">CLICK THE BUTTON BELOW TO START THE EXAM.</p>
                    <a href="take_exam2.php?id=<?php echo $id; ?>&user=<?php echo $user; ?>"> START THE EXAM</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>