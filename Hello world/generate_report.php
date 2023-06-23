<?php
// Establish database connection
include 'connection.php';

// Initialize averages array
$averages = array();

// Check if form has been submitted
if (isset($_POST['subject'])) {
    // Get the selected subject from the form
    $subject = $_POST['subject'];
    $year = $_POST['year'];

    // Join tables and select relevant fields
    $sql = "SELECT student.Gender, student.Region, AVG(result.Score) AS average
    FROM result
    INNER JOIN student ON result.Registration_no = student.Registration_number AND result.Year = ?
    WHERE result.Exam_id = ?
    GROUP BY student.Gender, student.Region";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $year, $subject);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Aggregate scores by gender and region
    while ($row = mysqli_fetch_assoc($result)) {
        $gender = $row['Gender'];
        $region = $row['Region'];
        $average = $row['average'];
        if (!isset($averages[$gender])) {
            $averages[$gender] = array();
        }
        $averages[$gender][$region] = $average;
    }
}
?>

<!-- HTML code with Bootstrap CSS and JavaScript files -->
<!DOCTYPE html>
<html>

<head>
    <title>Student Scores Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
    <link rel="stylesheet" href="css/styleG.css">
</head>

<body>
    <header id="header">
        <div class="row">
            <i class="bi bi-flag">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-flag"
                    viewBox="0 0 16 16">
                    <path
                        d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z" />
                </svg>
            </i>
            <h3 class="topic">Report</h3>
            <a href="admin_home.php" class="btn col-lg-1">Back</a>
        </div>
    </header>
    <div class="container mt-5">
        <h1>Student Scores Report</h1>
        <form method="post" class="form-inline mt-3 mb-3">
            <label for="subject" class="mr-2">Select Subject:</label>
            <select name="subject" id="subject" class="form-control mr-2">
                <option value="">Select subject</option>
                <?php
                $sql = "SELECT * FROM exam";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row['Exam_id'] ?>" <?php if (isset($subject) && $subject == $row['Exam_id'])
                           echo 'selected'; ?>><?php echo $row['Exam_name'] ?></option>
                    <?php
                }
                ?>
            </select>
            <label for="year" class="mr-2">Select Year:</label>
            <select name="year" id="year" class="form-control mr-2">
                <?php
                // Get the current year
                $current_year = date('Y');

                // Generate options for the dropdown
                for ($i = 0; $i < 4; $i++) {
                    $year = $current_year - $i;
                    echo '<option value="' . $year . '">' . $year . '</option>';
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if (!empty($averages)): ?>
            <canvas id="myChart"></canvas>
            <script>
                const chartData = <?php echo json_encode($averages); ?>;
                const ctx = document.getElementById('myChart').getContext('2d');

                // Create an array of labels for the chart
                const labels = Object.keys(chartData);

                // Create an array of data for the chart
                const data = [];
                for (let gender in chartData) {
                    const row = [];
                    for (let region in chartData[gender]) {
                        row.push(chartData[gender][region]);
                    }
                    data.push(row);
                }

                // Create the chart
                const chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Average Score',
                            data: data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        <?php else: ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                No data available.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>