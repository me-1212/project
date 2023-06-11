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
    <title>Review</title>
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

    <div class="container">
        <h3 id = "time-up">Time is up! You have to submit the answers you have done. Please click finish button!</h3>
        <?php for ($i = 0; $i < $num_questions; $i++): ?>
            <?php $qindex = $question_permutation[$i]; ?>
            <div class="card mb-3">
                <div class="card-header">Question <?php echo ($i + 1); ?></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $questions[$qindex]['Question']; ?></h5>
                    <p class="card-title">A. <?php echo $questions[$qindex]['Choice_1']; ?></p>
                    <p class="card-title">B. <?php echo $questions[$qindex]['Choice_2']; ?></p>
                    <p class="card-title">C. <?php echo $questions[$qindex]['Choice_3']; ?></p>
                    <p class="card-title">D. <?php echo $questions[$qindex]['Choice_4']; ?></p>
                    <?php if(isset($questions[$i]['selected_answer'])){?>
                    <p class="card-text">Selected answer: <?php echo $questions[$qindex]['selected_answer']; ?></p>
                    <?php }else{?>
                    <p class="card-text">Selected answer: No</p> 
                    <?php }?> 
                    <p class="card-text">Correct answer: <?php echo $questions[$qindex]['Answer']; ?></p>
                </div>
            </div>
        <?php endfor; ?>
        <h2>Final score: <?php echo $score; ?></h2>
        <form method="post" action="finish_exam.php?id=<?php echo $exam_id?>">
            <button type="submit" class="btn2 btn-primary">Finish</button>
        </form>
    </div>
</body>
</html>