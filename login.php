<?php

require 'core/init.php';
require 'components/page_head.php';


?>


			
			
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <b>CSC Department UCSC</b> <br>
        <small> <b>Welcome</b> <br>
            This site is accessible to approved users only</small>
    </div>


	 <?php

            if(empty($_POST) === false and isset($_POST)=== true){

                 $email    = $_POST['email'];
                 $password = $_POST['password'];

                $login = login($con,$email,$password);
                if($login === false){ ?>
            <script>
                alert('Your email and password combination is wrong');

            </script>
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

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                </div>

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
                </div>

                <div class="col-xs-4">
                </div>

            </div>
        </form>


    </div>
</div>
<? include('components/page_tail.php'); ?>







