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
</head>
<body>
    <div class="container">
        <h1>Time is up!!!! You have to submit the answers you have done. Please click finish button!!</h1>
        <?php for ($i = 0; $i < $num_questions; $i++): ?>
            <div class="card mb-3">
                <div class="card-header">Question <?php echo ($i + 1); ?></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $questions[$i]['Question']; ?></h5>
                    <p class="card-title">A. <?php echo $questions[$i]['Choice_1']; ?></p>
                    <p class="card-title">B. <?php echo $questions[$i]['Choice_2']; ?></p>
                    <p class="card-title">C. <?php echo $questions[$i]['Choice_3']; ?></p>
                    <p class="card-title">D. <?php echo $questions[$i]['Choice_4']; ?></p>
                    <?php if(isset($questions[$i]['selected_answer'])){?>
                    <p class="card-text">Selected answer: <?php echo $questions[$i]['selected_answer']; ?></p>
                    <?php }else{?>
                    <p class="card-text">Selected answer: No</p> 
                    <?php }?> 
                    <p class="card-text">Correct answer: <?php echo $questions[$i]['Answer']; ?></p>
                </div>
            </div>
        <?php endfor; ?>
        <h2>Final score: <?php echo $score; ?></h2>
        <form method="post" action="finish_exam.php?id=<?php echo $exam_id?>">
            <button type="submit" class="btn btn-primary">Finish</button>
        </form>
    </div>
</body>
</html>