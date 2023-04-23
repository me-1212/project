<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online examination system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/log1.css" rel="stylesheet">
  </head>

  <body  style="background: url(res/back.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; overflow: hidden">
    <section class = "Form my-4 mx-5">
        <div class="container">
            <div class="row gx-0">
                <div class="div1">
                    <img src="res/logo.png" class = "logo">
                    <h4 class ="font-weight-bold py-3"> Welcome to Grade 12 Online Examination System</h4>
                    <p style = "text-align: center;"> Here is the login form. Please, insert your username and password correctly.</p>
                    <form action = "log_ad.php" method = "post">
                        <div class="form-row">
                                <?php
                                    if(isset($_GET['error'])){ ?>
                                        <p class="error"> <?php echo $_GET['error']; ?> </p>
                                <?php }?>
                        </div>
                        <div class="form-row">
                            <div class="input-group">
                            <span class="input-group-text col-lg-1" style= "background-color:#454868; margin-top: 5.5px; height:38px;">
                                <i class="bi bi-person"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg></i> 
                            </span> 
                            <div class="col-lg-7">
                                <input style="height:40px;" type = "text" name = "username" id = "username" class = "form-control my-1 p-1" placeholder="Enter username" >                     
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-group">
                                <span class="input-group-text col-lg-1" style="background-color:#454868; margin-top: 5.5px; height:38px; ">
                                    <i class="bi bi-lock "><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-lock" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                    </svg></i>
                                </span>
                                <div class="col-lg-7">
                                <input style="height:40px;" type = "password" name = "password" id = "password" class = "form-control my-1 p-1" placeholder="Enter password">
                        </div>
                            </div> </div>
                        <div class="form-row">
                            <div class="col-lg-5" style="margin-left:63px;">
                                <input type = "Submit" name = "login" class = "btn1" value = "Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>