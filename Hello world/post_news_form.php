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
      <i class="bi bi-newspaper">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-newspaper"
          viewBox="0 0 16 16">
          <path
            d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
          <path
            d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
        </svg>
      </i>
      <h3 class="topic" >Post news</h3>
      <a href="admin_home.php" class="btn col-lg-1">Back</a>
    </div>
  </header>
  <section id="sec">
    <div class="container">
      <div class="row">
        <form action="post_news.php" method="post" enctype="multipart/form-data">
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
                <label for="input" class="form-label" style="font-weight:bold;">Admin Id</label>
                <input class="form-control" type="text" id="text" name="admin_id" placeholder="Enter your username" autocomplete="off">
              </div>
            </div>
            <div class="form-row col-lg-4">
              <div class="mb-3">
                <label for="textarea" class="form-label" style="font-weight:bold;">News title</label>
                <input class="form-control" type="textarea" name="title" placeholder="Enter news title" autocomplete="off">
              </div>
            </div>
            <div class="form-row col-lg-4">
              <label for="textarea" class="form-label" style="font-weight:bold;">News description</label>
              <input class="form-control" type="textarea" name="description" placeholder="Enter the full description" autocomplete="off">
            </div>
            <div class="form-row d-grid gap-2 d-md-flex justify-content-md-end col-lg-3">
              <input type="submit" value="Post" name="save" class="btn1" style="display:inline;">
              <input type="reset" value="Reset" class="btn1" style="display:inline;">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </section>
</body>
</html>