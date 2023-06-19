<?php
// Start the session
session_start();

$exam_id = $_POST['exam_id'];

// Get the question index from the form data
$qindex = $_POST['qindex'];

// Get question number
$qnum = $_POST['qnum'];

//Get end time
$end_time = $_POST['end_time'];

// Get the question from the session
$question = $_SESSION['questions'][$qindex];

// Display the question and options in a form
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

    <div class="container mt-5">
        <div id="timer"></div>
        <div class="question-container">
            <h1 class="mb-4">Question
                <?php echo $qnum + 1; ?>
            </h1>
            <p class="lead">
                <?php echo $question['Question']; ?>
            </p>
            <form method="post" action="review_exam.php?id=<?php echo $exam_id; ?>&end_time=<?php echo $end_time; ?>">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="answer"
                        value="<?php echo $question['Choice_1']; ?>">
                    <label class="form-check-label">
                        <?php echo $question['Choice_1']; ?>
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="answer"
                        value="<?php echo $question['Choice_2']; ?>">
                    <label class="form-check-label">
                        <?php echo $question['Choice_2']; ?>
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="answer"
                        value="<?php echo $question['Choice_3']; ?>">
                    <label class="form-check-label">
                        <?php echo $question['Choice_3']; ?>
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="answer"
                        value="<?php echo $question['Choice_4']; ?>">
                    <label class="form-check-label">
                        <?php echo $question['Choice_4']; ?>
                    </label>
                </div>
                <input type="hidden" name="qnum" value="<?php echo $qindex; ?>">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
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