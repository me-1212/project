<?php
// Connect to database
include 'connection.php';

// If the "Activate" button is clicked, update the status of all results to 1
if (isset($_POST['activate'])) {
    $sql = "UPDATE `result` SET `Status`= 1";

    // Execute the query
    mysqli_query($conn, $sql);
}

// If the "Deactivate" button is clicked, update the status of all results to 0
if (isset($_POST['deactivate'])) {
    $sql = "UPDATE `result` SET `Status`= 0";

    // Execute the query
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/result_style.css">
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
            <h3 class="topic">Post Result</h3>
            <a href="admin_home.php" class="btn col-lg-1">Back</a>
        </div>
    </header>
    <form method="post">
        <?php
        // Get all the results from result table
        // execute the query
        // Store the result
        $sql = "SELECT * FROM `result`";
        $Sql_query = mysqli_query($conn, $sql);
        $results = mysqli_fetch_array($Sql_query, MYSQLI_ASSOC);
        if ($results['Status'] == 0) {
            // Display the "Activate" button if the result is currently deactivated
            echo "<div id = 'status-text'> 
                        <h3>Session is currently deactivated. Students cannot see their results.</h3>
                    </div>";
            echo "<input type='submit' class='btn red' name='activate' value='Activate'>";
        } else {
            // Display the "Deactivate" button if the result is currently activated
            echo "<div id = 'status-text'> 
                        <h3>Session is currently activated. Students can see their results.</h3>
                    </div>";
            echo "<input type='submit' class='btn green' name='deactivate' value='Deactivate'>";
        }
        ?>
    </form>
</body>
</html>