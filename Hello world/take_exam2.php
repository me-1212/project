<?php

// Start the session
session_start();

// Include the database connection file
include 'connection.php';

// Set the exam ID
$exam_id = $_GET['id'];

$_SESSION['exam_id'] = $exam_id;

// Check if the user has started the exam
if (!isset($_SESSION['started'])) {

    // Set student id
    $username = $_GET['user'];

    $query = "SELECT * FROM student WHERE Username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['student_id'] = $row['Registration_number'];

    // Get the questions for the exam
    $query = "SELECT * FROM question WHERE Exam_id = '$exam_id'";
    $result = mysqli_query($conn, $query);

    // Save the questions in the session
    $_SESSION['questions'] = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Get total number of questions
    $_SESSION['num_questions'] = count($_SESSION['questions']);

    // Generate a random permutation of the question indices
    $_SESSION['question_permutation'] = range(0, $_SESSION['num_questions'] - 1);
    shuffle($_SESSION['question_permutation']);

    // Initialize the current question index to 0
    $_SESSION['current_question'] = 0;

    // Set the started flag
    $_SESSION['started'] = true;

    // Set the initial score to 0
    $_SESSION['score'] = 0;

    // Set the time
    $_SESSION['start_time'] = time();
}

// Get the duration of the exam in minutes
$query = "SELECT * FROM exam WHERE Exam_id = '$exam_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$duration = $row['Time'];

// Calculate the end time of the exam
$end_time = $_SESSION['start_time'] + ($duration * 60);

// Check if the user has submitted an answer
if (isset($_POST['submit'])) {

    // Check if an answer has been selected
    if (!isset($_POST['answer'])) {
        // echo "<p>Please select an answer before proceeding.</p>";
        $error = "Please select an answer before proceeding.";
    } else {

        // Get the current question index
        $current_question = $_SESSION['current_question'];

        // Get the selected answer
        $selected_answer = $_POST['answer'];

        // Get the index of the current question in the random permutation
        $permuted_index = $_SESSION['question_permutation'][$current_question];

        // Update the selected answer for the current question
        $_SESSION['questions'][$permuted_index]['selected_answer'] = $selected_answer;

        // Check if the selected answer is correct
        if ($selected_answer == $_SESSION['questions'][$permuted_index]['Answer']) {
            // Increment the score
            $_SESSION['score']++;
        }

        // Move to the next question
        $_SESSION['current_question']++;

        // Check if all questions have been answered
        if ($_SESSION['current_question'] == $_SESSION['num_questions']) {
            // Redirect to the review page
            $t = $end_time;
            header("Location: review_exam.php?id=$exam_id&end_time=$t");
            exit;
        }
    }
}

// Calculate the time remaining in seconds
$time_remaining  = $end_time - time();


// Check if the time is up
if ($time_remaining <= 0) {
    // Redirect to the time up page page
    header("Location: time_up.php?id=$exam_id");
    exit;
}

// Get the current question index
$current_question = $_SESSION['current_question'];

// Get the index of the current question in the random permutation
$permuted_index = $_SESSION['question_permutation'][$current_question];

// Get the current question
$question = $_SESSION['questions'][$permuted_index];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/exam_style.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <h1 class="navbar-brand" href="#">
                <?php 
                    switch($exam_id){
                        case 'Eng':
                            echo 'English Exam';    break;
                        case 'Sat':
                            echo 'Scholastic Aptitude Test Exam';   break;  
                        case 'Math_N':
                            echo  'Mathematics For Natural Science Exam';   break;
                        case 'Math_S':
                            echo 'Mathematics For Social Science Exam';  break;
                        case 'Bio':
                            echo 'Biology Exam';     break;
                        case 'Chm':
                            echo 'Chemistry Exam';   break;
                        case 'Phy':
                            echo 'Physics Exam';     break;
                        case 'Civ':
                            echo 'Civics and Ethical Education Exam';    break;
                        case 'Geo':
                            echo 'Geography Exam';   break;
                        case 'His':
                            echo 'History Exam';     break;
                        case 'Bus':
                            echo 'Business Exam';    break;
                    }
                ?>
            </h1>
        </div>
    </nav>

    <div class="container mt-5">
        <div id="timer"></div>
        <div class="question-container">
        <div class="row">
            <?php 
            if(isset($error)){
            ?>
                <p id="error">
                    <?php echo $error; ?>
                </p>
            <?php }?>
        </div>
        <h1 class="mb-4">Question <?php echo $current_question + 1; ?></h1>
        <p class="lead"><?php echo $question['Question']; ?></p>
        <form method="post">
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="answer" id="choice1" value="A" <?php if ($question['Choice_1'] == $question['Answer']) echo'checked'; ?>>
                <label class="form-check-label" for="choice1"><?php echo $question['Choice_1']; ?></label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="answer" id="choice2" value="B" <?php if ($question['Choice_2'] == $question['Answer']) echo 'checked'; ?>>
                <label class="form-check-label" for="choice2"><?php echo $question['Choice_2']; ?></label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="answer" id="choice3" value="C" <?php if ($question['Choice_3'] == $question['Answer']) echo 'checked'; ?>>
                <label class="form-check-label" for="choice3"><?php echo $question['Choice_3']; ?></label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="answer" id="choice4" value="D" <?php if ($question['Choice_4'] == $question['Answer']) echo 'checked'; ?>>
                <label class="form-check-label" for="choice4"><?php echo $question['Choice_4']; ?></label>
            </div>
            <input type="hidden" name="end_time" value="<?php echo $end_time; ?>">
            <button type="submit" name="submit" class="btn btn-primary">Next</button>
        </form>
        </div>
    </div>



    <script>
        // Set the duration of the exam in seconds
        var duration = <?php echo $duration * 60; ?>;

        // Get the element that will display the timer
        var timerElement = document.getElementById('timer');

        // Set the end time of the exam
        var endTime = <?php echo $end_time; ?> * 1000;

        // Update the timer every second
        var timerId = setInterval(function() {
            // Get the current time
            var currentTime = new Date().getTime();

            // Calculate the time remaining
            var timeRemaining = endTime - currentTime;

            // Convert the time remaining to minutes and seconds
            var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            // Update the timer element with the time remaining
            timerElement.innerHTML = minutes + "m " + seconds + "s ";

            // Stop the timer when time is up
            if (timeRemaining < 0) {
                clearInterval(timerId);
                timerElement.innerHTML = "Time's up!";
                // Add code here to submit the exam
                window.location.href = "time_up.php?id=<?php echo $exam_id; ?>";
            }
        }, 1000);
    </script>

</body>
</html>