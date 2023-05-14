<?php

	// Connect to database
	include 'connection.php';

	// Get all the courses from courses table
	// execute the query
	// Store the result
	$sql = "SELECT * FROM `exam`";
	$Sql_query = mysqli_query($conn,$sql);
	$All_courses = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
	<title>Online Examination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<!-- Using internal/embedded css -->
	<style>
        body{
            overflow-x: hidden;
        }
		.btn{
			background-color: red;
			border: none;
			color: white;
			padding: 5px 5px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 20px;
		}
		.green{
			background-color: #199319;
		}
		.red{
			background-color: red;
		}
        table{
            width:700px;
            margin-top: 20px;
            margin-left: 350px;
            margin-bottom:10px;
        }
		table,th, td{
			border: 1px solid black;
            border-collapse: collapse;
			text-align :center;
		}
		td{
            padding: 2px;
			text-align :center;
		}
        
        th{
            padding:5px;
            font-size: 24px;
            text-align: center;
        }
        #header {
        background: #0A2558;
        transition: all 0.5s;
        z-index: 997;
        padding: 20px 0;
        height:85px;
        }

        #header .row{
        margin:6px;
        }

        #header .row  h3{
        font-weight: bold;
        font-size: 24px;
        color:white;
        margin-left:30px;
        margin-top:-30px;
        }

        #header .row .btn{
        text-decoration: none;
        border: none;
        outline: none;
        height: 40px;
        width:80px;
        background-color: white;
        color: black;
        border-radius: 4px;
        font-weight: bold;
        margin-left:1290px;
        margin-top:-30px;        
        }
        #header .row .btn:hover{
        background: white;
        border: 1px solid;
        color: #96bbff
        }
	</style>	
</head>

<body>
<header id="header">
      <div class="row">
            <i class="bi bi-skip-start-circle">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-skip-start-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.229 5.055a.5.5 0 0 0-.52.038L7 7.028V5.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0V8.972l2.71 1.935a.5.5 0 0 0 .79-.407v-5a.5.5 0 0 0-.271-.445z"/>
              </svg>
            </i>
        <h3 class="topic" >Activate exam</h3>
        <a href="admin_home.html" class="btn col-lg-1">Back</a>
      </div>
    </header>
	<table>
		<!-- TABLE TOP ROW HEADINGS-->
		<tr>
			<th>Exam Name</th>
			<th>Exam Status</th>
			<th>Change Status</th>
		</tr>
		<?php

			// Use foreach to access all the courses data
			foreach ($All_courses as $course) { ?>
			<tr>
				<td><?php echo $course['Exam_name']; ?></td>
				<td><?php
						// Usage of if-else statement to translate the
						// tinyint status value into some common terms
						// 0-Inactive
						// 1-Active
						if($course['Status']=="1")
							echo "Active";
						else
							echo "Inactive";
					?>						
				</td>
				<td>
					<?php
					if($course['Status']=="1")

						// if a course is active i.e. status is 1
						// the toggle button must be able to deactivate
						// we echo the hyperlink to the page "deactivate.php"
						// in order to make it look like a button
						// we use the appropriate css
						// red-deactivate
						// green- activate
						echo
                            "<a href=deactivate.php?id=".$course['Exam_id']." class='btn red'>Deactivate</a>";
					else
						echo
                            "<a href=activate.php?id=".$course['Exam_id']." class='btn green'>Activate</a>";
					?>
			</tr>
		<?php
				}
				// End the foreach loop
		?>
	</table>
</body>

</html>
