<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination System </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/final_style.css">
</head>
<body>
    <?php
        if(isset($_GET['msg']) && $_GET['msg'] == 1){
            $m = "Result is not recorded. Press the button below to return to home page.";
        }

        if(isset($_GET['msg']) && $_GET['msg'] == 2){
            $m = "Result is successfully recorded. Press the button below to return to home page.";
        }
    ?>
    <h3><?php echo $m?></h3>
    <Button onclick='window.location.href = "home.html";' class= "btn">Back to Home</Button>
</body>
</html>