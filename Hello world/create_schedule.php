<?php
// Establish database connection
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Examination System</title>
</head>
<body>
  <header id="header">
    <div class="row">
      <i class="bi bi-calendar">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-calendar"
          viewBox="0 0 16 16">
          <path
            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
        </svg>
      </i>
      <h3 class="topic" >Create Schedule</h3>
      <a href="admin_home.php" class="btn col-lg-1" >Back</a>
    </div>
  </header>
  <section id="sec">
    <div class="container">
      <div class="row-con">
        <form action="schedule.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="form-row">
              <?php
              if (isset($_GET['msg'])) { ?>
                <p class="message">
                  <?php echo $_GET['msg']; ?>
                  <button id="btn-msg" type="button" onclick="document.getElementsByClassName('message')[0].style.display = 'none';">X</button>
                </p>
              <?php } ?>
              <?php
              if (isset($_GET['msgs'])) { ?>
                <p class="messages">
                  <?php echo $_GET['msgs']; ?>
                  <button id="btn-msgs" type="button" onclick="document.getElementsByClassName('messages')[0].style.display = 'none';">X</button>
                </p>
              <?php } ?>
            </div>
            <div class="form-row col-lg-4">
              <div class="mb-3">
                <label for="input" class="form-label" style="font-weight:bold;">Schedule Id</label>
                <input class="form-control" type="text" name="schedule_id" placeholder="Enter schedule id" autocomplete="off">
              </div>
            </div>
            <div class="form-row col-lg-4">
              <div class="mb-3">
                <label for="input" class="form-label" style="font-weight:bold;">Admin Id</label>
                <input class="form-control" type="text" name="admin_id" placeholder="Enter admin id" autocomplete="off">
              </div>
            </div>
            <div class="form-row col-lg-4">
              <label for="type" class="form-label" style="font-weight:bold;">Exam Name</label>
              <select class="form-select" aria-label="Default select example" name="exam_name">
                <option value="">Select subject</option>
                <?php
                $sql = "SELECT * FROM exam";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <option value="<?php echo $row['Exam_name'] ?>"><?php echo $row['Exam_name'] ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="form-row col-lg-4">
              <label for="type" class="form-label" style="font-weight:bold;">Stream</label>
              <select class="form-select" aria-label="Default select example" name="stream">
                <option value="">Select stream</option>
                <option value="Natural">Natural</option>
                <option value="Social">Social</option>
                <option value="Both">Both</option>
              </select>
            </div>
            <div class="form-row col-lg-4">
              <div class="mb-3">
                <label for="formFile" class="form-label" style="font-weight:bold;">Date</label>
                <input class="form-control" type="text" name="day" autocomplete="off" placeholder="Enter the date">
              </div>
            </div>
            <div class="form-row col-lg-4">
              <div class="mb-3">
                <label for="formFile" class="form-label" style="font-weight:bold;">Start Time</label>
                <input class="form-control" type="time" name="start_time">
              </div>
            </div>
            <div class="form-row col-lg-4">
              <div class="mb-3">
                <label for="formFile" class="form-label" style="font-weight:bold;">End Time</label>
                <input class="form-control" type="time" name="end_time">
              </div>
            </div>
            <div class="form-row d-grid gap-2 d-md-flex justify-content-md-end col-lg-3" style="margin-top:-20px;">
              <input type="submit" value="Create" name="save" class="btn1" style="display:inline;">
              <input type="submit" value="Display" name="display" class="btn1" style="display:inline;">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </section>
</body>
</html>