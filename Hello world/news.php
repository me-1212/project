<?php
  include "connection.php";
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title> Online Examination System </title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link href="css/home.css" rel="stylesheet">
    </head>

    <body>

         <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"> <span> <img src = "res/logo.png"> </span> Ethiopian University Entrance Examination </h1>
    
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home.html" class="active">Home</a></li>
          <li><a href="news.php">News</a></li>
          <li class="dropdown"><a href="#"><span>Resources</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="res.php">Reading materials</a></li>
              <li><a href="res.php">Last exams</a></li>
            </ul>
          </li>
          <li><a href="about.html">About</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>News</h2>
        <nav aria-label="breadcrumbs">
        <ol class="breadcrumbs">
          <li class="breadcrumb-item"><a href="home.html">Home</a></li>
          <li class="breadcrumb-item active" >News</li>
        </ol>
      </nav>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->



<!-- ======= News Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry">

            <?php
              $query = "SELECT * FROM news ORDER BY News_id DESC";
              $result = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($result)){
            ?>

            <h2 class="entry-title">
                <?php
                  echo $row["Title"];
                ?>
            </h2>

            <time datetime="2020-01-01" style = "display: block; margin-top: -15px; margin-bottom: 10px; font-style: italic; font-size: 14px;">
              <?php
                echo $row["Date"];
              ?>
            </time>

            <div class="entry-content">
              <p>
                <?php
                  echo $row["Full"];
                ?>
              </p>
            </div>
            
            <?php   
            }
            ?>

          </article><!-- End blog entry -->

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              <div class="post-item clearfix">
                <?php
                      $query = "SELECT * FROM news ORDER BY news_id DESC";
                      $result = mysqli_query($conn, $query);
                      while($row = mysqli_fetch_assoc($result)){
                ?>
                <h4><a href="full_news.php">
                  <?php
                    echo $row["Title"];
                  ?>
                </a></h4>
                <time datetime="2020-01-01">
                  <?php
                    echo $row["Date"];
                  ?>
                </time>
                <?php
                  }
                ?>
              </div>

            </div><!-- End sidebar recent posts-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-sm-3">
            <div class="footer-info">
              <h3>Ministry of Education</h3>
              <p>
                4kilo, Arada subcity <br>
                Addis Ababa, Ethiopia<br><br>
                <strong>Phone:</strong> +251-11-155-3133<br>
                <strong>Email:</strong> moff@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="http://twitter.com/fdremoe" class="twitter"><i class="bx bxl-twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg></i></a>
                <a href="http://facebook.com/fdremoe" class="facebook"><i class="bx bxl-facebook"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg></i></a>
                <a href="http://t.me/FDRE_MOE" class="telegram"><i class="bx bxl-telegram"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                </svg></i></a>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="footer-info">
              <h3> National Educational Assessment <br> and Examination Agency</h3>
              <p>
                5kilo, Arada subcity <br>
                Addis Ababa, Ethiopia<br><br>
                <strong>Phone:</strong> +251-11-126-0506<br>
                <strong>Email:</strong> neaeaneaea@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="http://twitter.com/neaea" class="twitter"><i class="bi bi-twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg></i></a>
                <a href="http://facebook.com/neaea" class="facebook"><i class="bx bxl-facebook"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg></i></a>
                <a href="http://t.me/Neaeanews" class="telegram"><i class="bx bxl-telegram"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                </svg></i></a>
              </div>
            </div>
          </div>

          <div class="col-sm-2 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">News</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Resources</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

    </body>
</html>