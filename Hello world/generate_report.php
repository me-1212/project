<?php

    include "connection.php";

// Join the three databases based on the student ID field and subject, and select the relevant fields
$query = "SELECT student.Gender, student.Region, result.Exam_id, result.Score
          FROM student
          JOIN result ON student.Registration_number = result.Registration_no
          JOIN exam ON result.Exam_id = exam.Exam_id";

// Execute the query
$result = mysqli_query($conn, $query);

// Initialize an array to store the scores by gender, region, and subject
$scores = array();

// Iterate over the results and aggregate the scores by gender, region, and subject
while ($row = mysqli_fetch_assoc($result)) {
    $gender = $row['Gender'];
    $region = $row['Region'];
    $subject = $row['Exam_id'];
    $score = $row['Score'];
    
    if (!isset($scores[$gender][$region][$subject]['total_score'])) {
        $scores[$gender][$region][$subject]['total_score'] = 0;
        $scores[$gender][$region][$subject]['count'] = 0;
    }
    
    // Add the score to the total score and increment the count
    $scores[$gender][$region][$subject]['total_score'] += $score;
    $scores[$gender][$region][$subject]['count']++;
}

// Calculate the average score for each group
$averages = array();
foreach ($scores as $gender => $regions) {
    foreach ($regions as $region => $subjects) {
        foreach ($subjects as $subject => $data) {
            $total_score = $data['total_score'];
            $count = $data['count'];
            $average = $total_score / $count;
            $averages[$gender][$region][$subject] = $average;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "css/styleG.css">
    <title>Report</title>
  </head>
  <body>
    <header id="header">
      <div class="row">
        <i class="bi bi-flag">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-flag" viewBox="0 0 16 16">
            <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/>
          </svg>
        </i>
        <h3 class="topic">Report</h3>
        <a href="admin_home.php" class="btn col-lg-1">Back</a>
      </div>
    </header>
    <div class="container mt-5">
      <table class="table">
        <thead>
          <tr>
            <th>Gender</th>
            <th>Region</th>
            <th>Subject</th>
            <th>Average Score</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($averages as $gender => $regions) {
              foreach ($regions as $region => $subjects) {
                foreach($subjects as $subject => $average) {
                  echo "<tr>";
                  echo "<td>$gender</td>";
                  echo "<td>$region</td>";
                  echo "<td>$subject</td>";
                  echo "<td>$average</td>";
                  echo "</tr>";
                }
              }
            }
          ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-6ZMmW6L5L1uxT4d3H0T0E7I8h+H2JxuzfV8Kk4GgYQ1ZQ6W/3BQsWQ+J7/GC0Hd" crossorigin="anonymous"></script>
  </body>
</html>