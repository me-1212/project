<?php
// Connect to database
include 'connection.php';

$user = $_GET['user'];
?>

<html>
<head>
    <title>Online Examination System</title>
    <link rel="stylesheet" href="css/list_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Header part -->
    <header id="header">
        <div class="row">
            <i class="bi bi-question-octagon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                class="bi bi-question-octagon" viewBox="0 0 16 16">
                <path
                    d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                <path
                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                </svg>
            </i>
            <h3 class="topic">Take exam</h3>
            <a href="student_home.php?username=<?php echo $user;?>" class="btn">Back</a>
        </div>
    </header>

    <section id="main">
    <?php
            // Fetch user's registration number
        $query = "SELECT Registration_number FROM student WHERE Username='$user'";
        $res1 = mysqli_query($conn, $query);
        $r = mysqli_fetch_assoc($res1);
        $reg = $r['Registration_number'];

        // Fetch user's exam id
        $query = "SELECT Exam_id FROM result WHERE Registration_no = $reg";
        $res2 = mysqli_query($conn, $query);
        $info = array();
        while ($row_info = mysqli_fetch_assoc($res2)) {
            if (isset($row_info['Exam_id'])) {
                $info[] = $row_info['Exam_id'];
            }
        }

        // Fetch subject details from database table 'exam'
        $query = "SELECT * FROM exam";
        $result = mysqli_query($conn, $query);

        // Display subject details as buttons in two columns
        if(mysqli_num_rows($result) > 0){
        $row_count = 0;
        while($row = mysqli_fetch_assoc($result)){
            // Check subject status and set button class and data attribute accordingly
            $button_class = $row['Status'] == '1' && !(in_array($row['Exam_id'], $info))? 'btn-primary' : 'btn-secondary';
            $button_data = 'data-status="' . $row['Status'] . '"';
            // Wrap each button in a new row
            if($row_count % 2 == 0) {
                echo '<div class="row">';
            }
            // Display subject as button with onclick event handler
            echo '<div class="col-md-4"><button class="btn ' . $button_class . '" ' . $button_data . ' onclick="handleButtonClick(\'' . $row['Exam_id'] . '\', \'' . $row['Status'] . '\', \'' . $_GET['user'] . '\')">' . $row['Exam_name'] . '</button></div>';
            if($row_count % 2 != 0) {
                echo '</div>';
            }
            $row_count++;
        }
        // If the number of buttons is odd, close the row
        if($row_count % 2 != 0) {
            echo '</div>';
        }
        } else {
        echo "No subjects found.";
        }
    ?>
    </section> 
    <script>
        function handleButtonClick(subject, status, id) {
            let f = <?php echo json_encode($info); ?>;
            let m = f.includes(subject);
            if(status =='1' && !m) {
                // Redirect to another PHP code if the button clicked is active
                window.location.href = 'exam_rule.php?subject=' + subject + '&user=' + id;
            } else if(status == '1' && m){
                // Display an error message if the button clicked is inactive
                alert('You have taken this exam. \nIt is not allowed to take it again. \nይህን ፈተና ስለተፈተኑ ደግመዉ መፈተን አይችሉም!!');
            } else{
                // Display an error message if the button clicked is inactive
                alert('This subject is currently inactive.\nይህን ፈተና መፈተን አይችሉም!!');
            }
        }
    </script>
</body>
</html>