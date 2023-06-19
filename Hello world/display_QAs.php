<?php
// connect to database
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Examination System</title>
    <link rel="stylesheet" href="css/styleQ.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Header part -->
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
            <h3 class="topic">Display QAs</h3>
            <a href="admin_home.php" class="btn">Back</a>
        </div>
    </header>
    <section id="up">
        <div class="form-row">
            <?php
            if (isset($_GET['msg'])) { ?>
                <p class="message" style="margin-left: 200px;">
                    <?php echo $_GET['msg']; ?>
                    <button id="btn-msg" type="button" onclick="document.getElementsByClassName('message')[0].style.display = 'none';">X</button>
                </p>
            <?php } ?>
        </div>
        <div class="form-row">
            <?php
            if (isset($_GET['msgs'])) { ?>
                <p class="messages" style="margin-left: 200px;">
                    <?php echo $_GET['msgs']; ?>
                    <button id="btn-msgs" type="button" onclick="document.getElementsByClassName('messages')[0].style.display = 'none';">X</button>
                </p>
            <?php } ?>
        </div>
        <div class="container my-4">
            <div class="row card-body">
                <?php
                $id = $_GET['id'];
                $query = "SELECT * FROM question WHERE Exam_id ='$id'";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <h6 class="card-title fw-bold" id="quest">
                        <?php
                        echo $row["Question_id"] . ". " . $row["Question"];
                        ?>
                    </h6>
                    <div class="card-title bg-light p-4 rounded">
                        <p class="card-title">
                            <?php
                            echo "A" . ". " . $row["Choice_1"];
                            ?><br>
                            <?php
                            echo "B" . ". " . $row["Choice_2"];
                            ?><br>
                            <?php
                            echo "C" . ". " . $row["Choice_3"];
                            ?><br>
                            <?php
                            echo "D" . ". " . $row["Choice_4"];
                            ?>
                        </p>
                        <p class="card-title">
                            <?php
                            echo "Answer" . ": " . $row["Answer"];
                            ?>
                        </p>
                    </div>
                    <?php
                }
                ?>
                <div class="row col-lg-1">
                    <a href="" class="btn-update" data-bs-toggle="modal" data-bs-target="#Update"> Update </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background:url(res/modal1.jpg); -webkit-background-size: cover;
                -moz-background-size: cover; -o-background-size: cover; background-size: cover; overflow: hidden">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="margin-left:430px;"></button>
                    <br>
                    <br>
                    <form action="upload_QAs.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <label for="input" class="form-label" style="font-weight:bold;">Exam Id</label>
                            <input class="form-control" type="text" name="exam_id" value="<?php echo $_GET['id']; ?>"
                                readonly>
                        </div>
                        <div class="form-row mb-3">
                            <label for="input" class="form-label" style="font-weight:bold;">Question Number</label>
                            <input class="form-control" type="number" name="question_id"
                                placeholder="Enter question number" autocomplete="off">
                        </div>
                        <div class="form-row mb-3">
                            <label for="textarea" class="form-label" style="font-weight:bold;">Question</label>
                            <textarea class="form-control" name="question" placeholder="Enter the question" rows="4"
                                cols="50" autocomplete="off"></textarea>
                        </div>
                        <div class="form-row mb-3">
                            <label for="textarea" class="form-label" style="font-weight:bold;">Choice A</label>
                            <textarea class="form-control" name="ch_a" placeholder="Enter choice A" rows="4"
                                cols="50" autocomplete="off"></textarea>
                        </div>
                        <div class="form-row mb-3">
                            <label for="formFile" class="form-label" style="font-weight:bold;">Choice B</label>
                            <textarea class="form-control" type="textarea" name="ch_b" placeholder="Enter choice B"
                                rows="4" cols="50" autocomplete="off"></textarea>
                        </div>
                        <div class="form-row mb-3">
                            <label for="formFile" class="form-label" style="font-weight:bold;">Choice C</label>
                            <textarea class="form-control" type="textarea" name="ch_c" placeholder="Enter choice C"
                                rows="4" cols="50" autocomplete="off"></textarea>
                        </div>
                        <div class="form-row mb-3">
                            <label for="formFile" class="form-label" style="font-weight:bold;">Choice D</label>
                            <textarea class="form-control" type="textarea" name="ch_d" placeholder="Enter choice D"
                                rows="4" cols="50" autocomplete="off"></textarea>
                        </div>
                        <div class="form-row mb-3">
                            <label for="formFile" class="form-label" style="font-weight:bold;">Answer</label>
                            <input class="form-control" type="text" name="answer" placeholder="Enter the answer" autocomplete="off">
                        </div>
                        <div class="form-row mb-3">
                            <label for="formFile" class="form-label" style="font-weight:bold;">Figure (if any)</label>
                            <input class="form-control" type="file" name="question" placeholder="Upload figure">
                        </div>
                        <div class="form-row">
                            <input type="submit" value="Save changes" name="update" class="btn1"
                                style="display:inline;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>