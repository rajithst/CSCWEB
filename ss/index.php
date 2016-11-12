<?php

/**
 * include main controller file
 * include page head file(load all css files and main script files)
 * 
 **/

require '../core/init.php';
require 'function/admin.php';
require '../components/page_head.php';


?>			
			
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Computer and Service Center</b> <br>
        <small> <b>Welcome</b> <br>
            This site is accessible to approved users only</small>
    </div>


	 <?php

            if(empty($_POST) === false and isset($_POST)=== true){

                 $email    = $_POST['email'];
                 $password = $_POST['password'];

                echo "$email $password";
                $login = login($email,$password);
                if($login === false){  ?>
                   <script>swal("Access Denied!", "Your Email and Password combination is incorrect!!")</script>
            <?php

               }else{

                    $_SESSION['id']= $login;
                    header('Location:dashboard.php');
                    exit();
                }
            }

            ?>
	
	

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post" id="loginform">               <!-- start login form -->

            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                <span id="emailval"></span>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                     <button type="reset" class="btn btn-primary btn-block btn-flat" name="cancel" id="login">Cancel</button>
                </div>


                <div class="col-xs-4">
                </div>
                
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" id="login">Sign In</button>
                </div>

                

            </div>
        </form>   <!-- end of form -->
    </div>
</div>
<?php include '../components/page_tail.php'; ?>
