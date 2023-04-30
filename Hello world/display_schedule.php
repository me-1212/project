<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create Schedule</title>
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
        <h3 class="topic" >Create Schedule</h3>
        <a href="admin_home.html" class="btn">Back</a>
        </div>
        </header>

        <section>
            <div class="row">
                <?php
                    if(isset($_GET['msg'])){ ?>
                        <h4 class="message"> <?php echo $_GET['msg']; ?> </h4>
                <?php }?>
            </div>
        </section>

        <section id="up">
            <div class="container">
                <div class="row">
                <legend><h3>Schedule</h3></legend>
                <table>
                    <tr>
                    <th>Schedule Id</th>
                    <th>Exam Name</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    </tr>

                    <?php
                        $query = "SELECT * FROM schedule";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td> <?php echo $row["Schedule_id"];?> </td>
                        <td> <?php echo $row["Exam_name"];?> </td>
                        <td> <?php echo $row["Dat"];?> </td>
                        <td> <?php echo $row["Start_time"];?> </td>
                        <td> <?php echo $row["End_time"];?> </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                    <div class="row col-lg-1">
                        <a href="" class="btn-update" data-bs-toggle="modal" data-bs-target="#Update" style="margin-top:20px;"> Update </a>
                    </div>
                </div>
            </div>
        </section>

         <!-- Modal -->
    <div class="modal fade" id="Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="background:url(res/back.jpg); -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover; overflow: hidden">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left:430px;"></button>
        <br>
        <br> 
        <form action="schedule.php" method="post" enctype="multipart/form-data" style="margin-left:65px;">
        <div class="form-row col-lg-8">
            <label for="input" class="form-label" style="font-weight:bold;">Schedule Id</label>
            <input class="form-control" type="text" name = "schedule_id" placeholder="Enter schedule id">
        </div>
        <div class="form-row col-lg-8">
          <div class="mb-3">
            <label for="input" class="form-label" style="font-weight:bold;">Admin Id</label>
            <input class="form-control" type="text" name = "admin_id" placeholder="Enter admin id">
          </div>
        </div>
        <div class="form-row col-lg-8">
          <label for="type" class="form-label" style="font-weight:bold;">Exam Name</label>
          <select class="form-select" aria-label="Default select example" name ="exam_name">
                <?php
                    $sql ="SELECT * FROM exam";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?php echo $row['Exam_name']?>"><?php echo $row['Exam_name']?></option>
                <?php
                    }
                ?>
          </select>
        </div>
        <div class="form-row col-lg-8">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight:bold;">Date</label>
            <input class="form-control" type="text" name = "day">
          </div>
        </div>
        <div class="form-row col-lg-8">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight:bold;">Start Time</label>
            <input class="form-control" type="time" name = "start_time">
          </div>
        </div>
        <div class="form-row col-lg-8">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight:bold;">End Time</label>
            <input class="form-control" type="time" name = "end_time">
          </div>
        </div>
        <div class="form-row col-lg-8">
            <input  type="submit" value="Save changes" name="update" class="btn1" style= "display:inline;">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
  
  </body>
</html>