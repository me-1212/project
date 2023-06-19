<?php
include 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title> Online Examination </title>
  <link rel="stylesheet" href="css/admin_dash.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/std_style.css">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="res/logo1.png">
    </div>
    <div>
      <h2 class="logo_name" style="color: #fff; font-size: 24px; font-weight: 500;">Online Examination</h2>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#" class="active">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="take_exam1.php?username=<?php echo $_GET['username']; ?>">
          <i class="bi bi-question-octagon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-question-octagon" viewBox="0 0 16 16">
              <path
                d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
              <path
                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
            </svg>
          </i>
          <span class="links_name">Take exam</span>
        </a>
      </li>
      <li>
        <a href="news.php">
          <i class="bi bi-newspaper">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper"
              viewBox="0 0 16 16">
              <path
                d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
              <path
                d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
            </svg>
          </i>
          <span class="links_name">View news</span>
        </a>
      </li>
      <li>
        <a href="res.php">
          <i class="bi bi-book">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book"
              viewBox="0 0 16 16">
              <path
                d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
            </svg>
          </i>
          <span class="links_name">Get resource</span>
        </a>
      </li>
      <li>
        <a href="view_schedule.php?username=<?php echo $_GET['username']; ?>">
          <i class="bi bi-calendar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar"
              viewBox="0 0 16 16">
              <path
                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
            </svg>
          </i>
          <span class="links_name">View schedule</span>
        </a>
      </li>
      <li>
        <a href="view_result.php?username=<?php echo $_GET['username']; ?>">
          <i class="bi bi-file-check">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-check"
              viewBox="0 0 16 16">
              <path
                d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
              <path
                d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
            </svg>
          </i>
          <span class="links_name">View result</span>
        </a>
      </li>
      <li class="log_out">
        <a href="home.html">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
    </nav>


    <!-- fetch and display student information -->
    <?php
    $username = $_GET['username'];
    $query = "SELECT * FROM student WHERE Username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="home-content">
      <div class="row">
        <div class="col-lg-6">
          <!-- fetch and display photo -->
          <img id="photo" src=<?php echo $row['Photo']; ?>>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <!-- fetch and display name -->
              <th>Name</th>
              <td>
                <?php
                echo $row['Name'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display registration number -->
              <th>Registration Number</th>
              <td>
                <?php
                echo $row['Registration_number'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display gender -->
              <th>Gender</th>
              <td>
                <?php
                echo $row['Gender'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display stream -->
              <th>Stream</th>
              <td>
                <?php
                echo $row['Stream'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display is blind or not -->
              <th>Blind</th>
              <td>
                <?php
                echo $row['Is_blind'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display School code -->
              <th>School Code</th>
              <td>
                <?php
                echo $row['School_code'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display Region -->
              <th>Region</th>
              <td>
                <?php
                echo $row['Region'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display Zone -->
              <th>Zone</th>
              <td>
                <?php
                echo $row['Zone'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display City -->
              <th>City</th>
              <td>
                <?php
                echo $row['City'];
                ?>
              </td>
            </tr>
            <tr>
              <!-- fetch and display Woreda -->
              <th>Woreda</th>
              <td>
                <?php
                echo $row['Woreda'];
                ?>
              </td>
            </tr>

          </table>
        </div>
      </div>
    </div>
  </section>

</body>

</html>