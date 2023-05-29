<?php
    // Connect to database
    include 'connection.php';

    // If the "Activate" button is clicked, update the status of all results to 1
    if(isset($_POST['activate'])){
        $sql="UPDATE `result` SET `Status`= 1";

        // Execute the query
        mysqli_query($conn,$sql);
    }

    // If the "Deactivate" button is clicked, update the status of all results to 0
    if(isset($_POST['deactivate'])){
        $sql="UPDATE `result` SET `Status`= 0";

        // Execute the query
        mysqli_query($conn,$sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Online Examination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Using internal/embedded css -->
    <style>
        body{
            overflow-x: hidden;
        }
        .btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
            margin-left: 650px;
            margin-top: 30px;
            width: 150px; 
        }
        .red{
            background-color: red;
            margin-left: 650px;
            margin-top: 30px;
            width: 150px; 
        }
        #header {
            background: #0A2558;
            transition: all 0.5s;
            z-index: 997;
            padding: 20px 0;
            height:100px;
        }

        #header .row{
            margin:8px;
        }

        #header .row  h3{
            font-weight: bold;
            font-size: 24px;
            color:white;
            margin-left:35px;
            margin-top: -20px;
        }
        #header .row .btn{
            text-decoration: none;
            border: none;
            outline: none;
            height: 40px;
            width:80px;
            background-color: white;
            color: black;
            border-radius: 4px;
            font-weight: bold;
            margin-left:1300px;
            margin-top: -30px;   
        }
        #header .row .btn:hover{
            background: white;
            border: 1px solid;
            color: #96bbff;
        }
        #status-text {
            font-size: 20px;
            font-weight: bold;
            margin-top: 100px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="row">
            <i class="bi bi-file-check">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-file-check" viewBox="0 0 16 16">
                <path d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
              </svg>
            </i>
            <h3 class="topic" >Post Result</h3>
            <a href="admin_home.php" class="btn col-lg-1">Back</a>
        </div>
    </header>

    <form method="post">
        <?php
                // Get all the results from result table
            // execute the query
            // Store the result
            $sql = "SELECT * FROM `result`";
            $Sql_query = mysqli_query($conn,$sql);
            $results = mysqli_fetch_array($Sql_query,MYSQLI_ASSOC);

                if($results['Status'] == 0){
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

