<?php require '../core/base.php';
require '../core/function/admin.php'; ?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Computing Service Center</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>

    <?php

    if(empty($_POST) === false and isset($_POST)=== true){

        $email    = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        $login = login($con,$email,$password);
        if($login === false){  ?>
            <script>swal("Access Denied!", "Your Email and Password combination is incorrect!!")</script>
            <?php

        }else{

            session_start();
            $_SESSION['id']= $login;
            header('Location:home.php');
            exit();
        }
    }

    ?>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Log In</strong> to your account</div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="E-mail" name="email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                   
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2016 Computing And Service Center
                    </div>
                    <div class="pull-right">
                       
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






