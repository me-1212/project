<?php
// Start the session
session_start();

// Check if the user has started the exam
if (!isset($_SESSION['started'])) {
    // Redirect to the start page
    header('Location: take_exam2.php');
    exit;
}

$exam_id = $_GET['id'];
$end_time = $_GET['end_time'];
//$end_time = $_POST['end_time'];

if (isset($_POST['update'])) {
    // Get the question index and updated answer from the form data
    $qno = $_POST['qnum'];
    $updated_answer = $_POST['answer'];
    //$end_time = $_POST['end_time'];

    // Update the answer in the session
    // $_SESSION['questions'][$qno]['selected_answer'] = $updated_answer;

    // Get the previous answer from the session
    $previous_answer = $_SESSION['questions'][$qno]['selected_answer'];

    // Check if the updated answer is different from the previous answer
    if ($updated_answer != $previous_answer) {
        // Update the answer in the session
        $_SESSION['questions'][$qno]['selected_answer'] = $updated_answer;

        // Recalculate the score
        if (strcmp(trim(strtolower($_SESSION['questions'][$qno]['selected_answer'])), trim(strtolower($_SESSION['questions'][$qno]['Answer']))) == 0) {
            $_SESSION['score']++;
        } else if (strcmp(trim(strtolower($previous_answer)), trim(strtolower($_SESSION['questions'][$qno]['Answer']))) != 0) {
            // Do nothing
        } else {
            $_SESSION['score']--;
        }
        //$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
    }
}

// Get the permutation of question indices from the session
$question_permutation = $_SESSION['question_permutation'];

// Get the questions from the session
$questions = $_SESSION['questions'];

// Get total number of questions
$num_questions = $_SESSION['num_questions'];

// Initialize the score
$score = $_SESSION['score'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Examination System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/exam_style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <h1 class="navbar-brand" href="#">
                <?php
                switch ($exam_id) {
                    case 'Eng':
                        echo 'English Exam';
                        break;
                    case 'Sat':
                        echo 'Scholastic Aptitude Test Exam';
                        break;
                    case 'Math_N':
                        echo 'Mathematics For Natural Science Exam';
                        break;
                    case 'Math_S':
                        echo 'Mathematics For Social Science Exam';
                        break;
                    case 'Bio':
                        echo 'Biology Exam';
                        break;
                    case 'Chm':
                        echo 'Chemistry Exam';
                        break;
                    case 'Phy':
                        echo 'Physics Exam';
                        break;
                    case 'Civ':
                        echo 'Civics and Ethical Education Exam';
                        break;
                    case 'Geo':
                        echo 'Geography Exam';
                        break;
                    case 'His':
                        echo 'History Exam';
                        break;
                    case 'Bus':
                        echo 'Business Exam';
                        break;
                }
                ?>
            </h1>
        </div>
    </nav>
    <div class="container-review">
        <div id="timer"></div>
        <h1>Review</h1>
        <?php for ($i = 0; $i < $num_questions; $i++) { ?>
            <?php $qindex = $question_permutation[$i]; ?>
            <div class="card mb-3">
                <div class="card-header">Question
                    <?php echo ($i + 1); ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $questions[$qindex]['Question']; ?>
                    </h5>
                    <p class="card-title">A.
                        <?php echo $questions[$qindex]['Choice_1']; ?>
                    </p>
                    <p class="card-title">B.
                        <?php echo $questions[$qindex]['Choice_2']; ?>
                    </p>
                    <p class="card-title">C.
                        <?php echo $questions[$qindex]['Choice_3']; ?>
                    </p>
                    <p class="card-title">D.
                        <?php echo $questions[$qindex]['Choice_4']; ?>
                    </p>
                    <p class="card-text">Selected answer:
                        <?php echo $questions[$qindex]['selected_answer']; ?>
                    </p>
                    <form method="post" action="update_exam.php" class="d-inline">
                        <input type="hidden" name="qnum" value="<?php echo $i; ?>">
                        <input type="hidden" name="qindex" value="<?php echo $qindex; ?>">
                        <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                        <input type="hidden" name="end_time" value="<?php echo $end_time; ?>">
                        <button type="submit" class="btn1 btn-primary">Update</button>
                    </form>
                </div>
            </div>
        <?php } ?>
        <form method="post" action="finish_exam.php?id=<?php echo $exam_id ?>">
            <button type="submit" class="btn2 btn-primary">Finish</button>
        </form>
    </div>

    <script>
        // Get the element that will display the timer
        var timerElement = document.getElementById('timer');

        // Set the end time of the exam
        var endTime = <?php echo $end_time; ?> * 1000;

        // Update the timer every second
        var timerId = setInterval(function () {
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