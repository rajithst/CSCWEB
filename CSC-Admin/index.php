<?php require '../classes/Admin/Adminlogin.php'; ?>
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
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/sw/sweetalert2.min.js"></script>                                    
    </head>
    <body>


    <?php



    $al = new Adminlogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $adminEmail = $_POST['adminEmail'];
        $adminPass = md5($_POST['adminPass']);

        $loginChk= $al->adminLogin($adminEmail,$adminPass);
    }

    ?>

        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body" style="background:rgba(27, 27, 27, 0.64);">

                    <?php
                    if (isset($loginChk)){

                    echo $loginChk;
                    }


                    ?>
                    <div class="login-title"><strong>Log In</strong> to your account</div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="E-mail" name="adminEmail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="adminPass"/>
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
                <div class="login-footer" style="color: black;">
                    <div class="pull-left">
                        &copy; 2016 Computing And Service Center
                    </div>
                    <div class="pull-right" style="color: black;">
                       
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
    

<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>

</html>






