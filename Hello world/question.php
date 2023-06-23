<?php
// connect to db
include 'connection.php';


if(isset($_POST['upload'])){
// Check if the file was uploaded successfully
if (isset($_FILES["excel_file"]) && isset($_POST["exam_id"])) {
    if($_FILES["excel_file"]["error"] == UPLOAD_ERR_OK ){
    // Get the exam ID and file name/type
    $exam_id = $_POST["exam_id"];
    $file_name = $_FILES["excel_file"]["name"];
    $file_type = $_FILES["excel_file"]["type"];

    // Check if the file type is Excel
    if ($file_type == "text/plain") {
        // Move the file to a temporary location
        $tmp_name = $_FILES["excel_file"]["tmp_name"];
        $target_file = "questions/" . basename($file_name);
        move_uploaded_file($tmp_name, $target_file);

        // Open the Excel file and parse it into an array
        if (($handle = fopen($target_file, "r")) !== FALSE) {
            $data = array();
            while (($row = fgetcsv($handle, 0, "\t")) !== FALSE) {
                $data[] = $row;
            }
            fclose($handle);
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO question (Exam_id, Question_id, Question, Choice_1, Choice_2, Choice_3, Choice_4, Answer) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Iterate through each row in the array and insert the data into the database
        foreach ($data as $data) {
            // extract values from row
            $questionId = intval($data[0]);
            $question = $data[1];
            $choice1 = $data[2];
            $choice2 = $data[3];
            $choice3 = $data[4];
            $choice4 = $data[5];
            $correct_answer = $data[6];

            // bind values to prepared statement
            $stmt->bind_param("ssssssss", $exam_id, $questionId, $question, $choice1, $choice2, $choice3, $choice4, $correct_answer);

            // execute the prepared statement
            $stmt->execute();
        }

        // Provide feedback to the user
       header("Location:display_QAs.php?msgs=Questions uploaded successfully!&id=$exam_id");
    } else {
        header("Location:question.php?msg=Please upload an Text file with tab-separated values.&id=$exam_id");
    }
} }else {
    header("Location:question.php?msg=Error uploading file.");
}}
?>

<html>
<head>
    <title>Online Examination System</title>
    <link rel="stylesheet" href="css/styleQ.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header id="header">
        <div class="row">
            <i class="bi bi-question-octagon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white"
                    class="bi bi-question-octagon" viewBox="0 0 16 16">
                    <path
                        d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                    <path
                        d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                </svg>
            </i>
            <h3 class="topic">Upload QAs</h3>
            <a href="upload_QAs_list.php" class="btn">Back</a>
        </div>
    </header>
    <?php
    //get the id of the current subject
    $id = $_GET['id'];

    //get the total number of questions in db for this subject
    $query = "SELECT COUNT(*) FROM question WHERE Exam_id = '$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_assoc($result)['COUNT(*)'];
    //compare count with max and if max is greater add more question
    if ($count == 0) {
    ?>
    <section id="sec">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-row">
                                <?php
                                if (isset($_GET['msg'])) { ?>
                                    <p class="message">
                                        <?php echo $_GET['msg']; ?>
                                        <button id="btn-msg" type="button" onclick="document.getElementsByClassName('message')[0].style.display = 'none';">X</button>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="form-row">
                                <?php
                                if (isset($_GET['msgs'])) { ?>
                                    <p class="messages">
                                        <?php echo $_GET['msgs']; ?>
                                        <button id="btn-msgs" type="button" onclick="document.getElementsByClassName('messages')[0].style.display = 'none';">X</button>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="form-row mb-3">
                                        <label for="input" class="form-label" style="font-weight:bold;">Exam Id</label>
                                        <?php
                                        if (isset($_GET['id'])) { ?>
                                            <input class="form-control" type="text" name="exam_id"
                                                value="<?php echo $_GET['id']; ?>" readonly>
                                        <?php } ?>
                                    </div>
        <div class="form-row mb-3">
        <label for="excel_file">Excel File:</label>
        <input type="file" name="excel_file" id="excel_file">
        </div>
        <div class="form-row">
        <input type="submit" class= "btn1" name="upload" value="Upload">
        </div>
    </form>
    </section>
    <?php
    }// if the number of questions reach the limit
    else {
        ?>
        <section id="view">
            <div class="row">
                <h3>You can't add questions since the maximum limit is reached. <br> Click the link below to view questions.
                </h3>
            </div>
            <div class="row col-lg-2">
                <a href="display_QAs.php?id=<?php echo $_GET['id']; ?>">View Questions</a>
            </div>
        </section>
        <?php
    }
    ?>
</body>
</html>