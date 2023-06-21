<?php
// Connect to database
include 'connection.php';
$user = $_GET['username'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Online Examination System</title>
    <link rel="stylesheet" href="css/exam.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- check whether an exam is active or not -->
    <?php
    $query = "SELECT COUNT(*) FROM exam WHERE `Status` = 1";
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_assoc($result)['COUNT(*)'];

    //if one exam is active, conduct the exam
    if ($count == 1) {
        $query = "SELECT * FROM exam WHERE `Status` = 1";
        $result = mysqli_query($conn, $query);
        $exam = mysqli_fetch_assoc($result);
        header("location:list.php?user=$user");
        ?>
        <?php
        //if no exam is active, display error message
    } else {
        ?>
        <section id="view">
                <h3> Ooops! <h3>
                <h4> You can't take an exam. <br> There is no active exam session. <br> Try another time. </h4>
            <div class="row col-lg-1">
                <a href="student_home.php?username=<?php echo $_GET['username']; ?>">Back</a>
            </div>
        </section>
        <?php
    }
    ?>
</body>
</html>