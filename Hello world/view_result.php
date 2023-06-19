<?php
// Establish database connection
include "connection.php";

// Get username
$username = $_GET['username'];

// Fetch information from student table using username
$sql = "SELECT * FROM `student` WHERE Username = '$username'";
$Sql_query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);

$reg = $row['Registration_number'];

// Set the stream
if ($row['Stream'] == 'Natural') {
    $stream = 'N';
} else {
    $stream = 'S';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleR.css">
</head>
<body>
    <header id="header">
        <div class="row">
            <i class="bi bi-file-check">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-file-check"
                    viewBox="0 0 16 16">
                    <path
                        d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path
                        d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                </svg>
            </i>
            <h3 class="topic">View Result</h3>
            <a href="student_home.php?username=<?php echo $_GET['username']; ?>" class="btn">Back</a>
        </div>
    </header>
    <div >
        <?php
        // Check if result session is active or not
        $sql = "SELECT * FROM `result`";
        $Sql_query = mysqli_query($conn, $sql);
        $results = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
        if ($results['Status'] == 0) {
            echo "<h3> Oops! You can't see your result since the session is not active. Please wait till result is released.</h3>";
        } 
        // If it is active, fetch student information and display the result for each subject
        else {
            ?>
        </div>
        <div class="container">
            <table>
                <tr>
                    <th>
                        <p> Name </p>
                    </th>
                    <th>
                        <p>
                            <?php echo $row['Name']; ?>
                        </p>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p> Registration Number </p>
                    </th>
                    <th>
                        <p>
                            <?php echo $row['Registration_number']; ?>
                        </p>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p> Stream </p>
                    </th>
                    <th>
                        <p>
                            <?php echo $row['Stream']; ?>
                        </p>
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <th>Score</th>
                </tr>
                <?php if ($stream == 'N' || $stream == 'S') { ?>
                    <tr>
                        <td class="col-lg-6">English</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Eng'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'N') { ?>
                    <tr>
                        <td class="col-lg-6">Mathematics For Natural Science</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Math_N'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'S') { ?>
                    <tr>
                        <td class="col-lg-6">Mathematics For Social Science</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Math_S'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'N' || $stream == 'S') { ?>
                    <tr>
                        <td class="col-lg-6">Scholastic Aptitude Test</td>
                        <td>
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Sat'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'N') { ?>
                    <tr>
                        <td class="col-lg-6">Biology</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Bio'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'N') { ?>
                    <tr>
                        <td class="col-lg-6">Chemistry</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Chm'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'N') { ?>
                    <tr>
                        <td class="col-lg-6">Physics</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Phy'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'S') { ?>
                    <tr>
                        <td class="col-lg-6">Geography</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Geo'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'S') { ?>
                    <tr>
                        <td class="col-lg-6">History</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'His'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'S') { ?>
                    <tr>
                        <td class="col-lg-6">Business</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Bus'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($stream == 'S' || $stream == 'N') { ?>
                    <tr>
                        <td class="col-lg-6">Civics and Ethical Education</td>
                        <td class="col-lg-4">
                            <?php
                            $sql = "SELECT * FROM `result` WHERE Registration_no = $reg AND Exam_id = 'Civ'";
                            $Sql_query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
                            echo isset($result['Score']) ? $result['Score'] : '-';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        }
        ?>
    </div>
</body>
</html>