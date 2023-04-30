<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>View Schedule</title>
        <link rel="stylesheet" href="css/styleQ.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
         table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding:5px;
            margin:5px;
         }
      </style>
    </head>
    <body>
        <!-- Header part -->
        <header id="header">
        <div class="row">
        <i class="bi bi-calendar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>
        </i>
        <h3 class="topic" >View Schedule</h3>
        <a href="student_home.php" class="btn">Back</a>
        </div>
        </header>

        <section id="up">
            <div class="container">
                <div class="row">
                <legend><h3>Schedule</h3></legend>
                <table>
                    <tr>
                    <th>Exam Name</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    </tr>

                    <?php
                        $year = date("Y");
                        $query = "SELECT * FROM schedule WHERE Schedule_id LIKE CONCAT($year, '%')";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td> <?php echo $row["Exam_name"];?> </td>
                        <td> <?php echo $row["Dat"];?> </td>
                        <td> <?php echo $row["Start_time"];?> </td>
                        <td> <?php echo $row["End_time"];?> </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                </div>
            </div>
        </section>
  </body>
</html>