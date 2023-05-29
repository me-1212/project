<?php include 'upload.php';?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Resource</title>
  </head>
  <body>
    <header id="header">
      <div class="row">
      <i class="bi bi-book">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" class="bi bi-book" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
              </svg>
            </i>
            <h3 class="topic" style="margin-top:-182px;">Upload Resource</h3>
            <a href="admin_home.php" class="btn col-lg-1" style="margin-top:-330px;">Back</a>
      </div>
    </header>


<section id = "sec">
  <div class="container">
    <div class="row">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <fieldset><div class="form-row">
          <?php
            if(isset($_GET['msg'])){ ?>
              <p class="message"> <?php echo $_GET['msg']; ?> </p>
          <?php }?>
        </div>
        <div class="form-row col-lg-3">
          <div class="mb-3">
            <label for="input" class="form-label" style="font-weight:bold;">Admin Id</label>
            <input class="form-control" type="text" id="text" name = "admin_id" placeholder="Enter your username">
          </div>
        </div>
        <div class="form-row col-lg-3">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight:bold;">Select the resource</label>
            <input class="form-control" type="file" id="formFile" name = "myfile">
          </div>
        </div>
        <div class="form-row col-lg-3">
          <label for="type" class="form-label" style="font-weight:bold;">Choose the type of resource:</label>
          <select class="form-select" aria-label="Default select example" name ="type">
          <option selected>Select type</option>
            <option value="reading">Reading Material</option>
            <option value="exam">Exam</option>
          </select>
        </div>
        <div class="form-row d-grid gap-2 d-md-flex justify-content-md-end col-lg-3">
            <input  type="submit" value="Upload" name="save" class="btn1" style= "display:inline;">
            <input  type="reset" value="Reset" class="btn1" style= "display:inline;">
        </div></fieldset>
      </form>
    </div>
  </div>
  </section>
  </body>
</html>