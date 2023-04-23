<?php 
    include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Schedule</title>
  </head>
  <body>
    <header id="header">
      <div class="row">
        <i class="bi bi-calendar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>
        </i>
            <h3 class="topic" style="margin-top:-182px;">Create Schedule</h3>
            <a href="admin_home.html" class="btn col-lg-1" style="margin-top:-330px;">Back</a>
      </div>
    </header>


<section id = "sec">
  <div class="container">
    <div class="row">
      <form action="schedule.php" method="post" enctype="multipart/form-data">
        <fieldset><div class="form-row">
          <?php
            if(isset($_GET['msg'])){ ?>
              <p class="message"> <?php echo $_GET['msg']; ?> </p>
          <?php }?>
        </div>
        <div class="form-row col-lg-3">
          <div class="mb-3">
            <label for="input" class="form-label" style="font-weight:bold;">Schedule Id</label>
            <input class="form-control" type="text" name = "schedule_id" placeholder="Enter schedule id">
          </div>
        </div>
        <div class="form-row col-lg-3">
          <div class="mb-3">
            <label for="input" class="form-label" style="font-weight:bold;">Admin Id</label>
            <input class="form-control" type="text" name = "admin_id" placeholder="Enter admin id">
          </div>
        </div>
        <div class="form-row col-lg-3">
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
        <div class="form-row col-lg-3">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight:bold;">Date</label>
            <input class="form-control" type="text" name = "day">
          </div>
        </div>
        <div class="form-row col-lg-3">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight:bold;">Start Time</label>
            <input class="form-control" type="time" name = "start_time">
          </div>
        </div>
        <div class="form-row col-lg-3">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight:bold;">End Time</label>
            <input class="form-control" type="time" name = "end_time">
          </div>
        </div>
        <div class="form-row d-grid gap-2 d-md-flex justify-content-md-end col-lg-3" style = "margin-top:-20px;">
            <input  type="submit" value="Create" name="save" class="btn1" style= "display:inline;">
            <input  type="reset" value="Reset" class="btn1" style= "display:inline;">
        </div></fieldset>
      </form>
    </div>
  </div>
  </section>
  </body>
</html>