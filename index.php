<?php ob_start();
require 'core/base_connection.php';
require 'core/function/frontend.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Computing Services Center</title>
    <link rel="stylesheet" href="public/css/custom.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/dist/css/basic.css" />
    <link rel="stylesheet" href="public/plugins/sweealert/sweetalert2.css" />

    <script src="public/plugins/jQuery/jquery.js"></script><
    <script src="public/plugins/sweealert/sweetalert2.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style>

        .login2background{
            background-image: url(public/dist/img/system/bgcolor.jpg);
            background-repeat:no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .loginbox{
            background: white;
            color: black;
            margin-top: 20%;
            left: 0;
            padding: 20px;
            box-shadow: 0 8px 50px -2px #000;
            border-radius:5px;

        }
        .logo{
            width: 130px;
            height: 55px;
            margin-left: 10%;
        }
        @media (max-width:767px) {
            .loginbox{
                margin-top: 10%;
            }
        }

        .loginbox_content{
            padding:5% 11% 5% 11%;

        }

        .singtext{
            font-family: "Open Sans",sans-serif;
            font-size: 27px;
            color: #82C226;
            float: right;
            padding-right: 25%;
        }

        .submit-btn{
            float: right;
            margin-right: 28%;
        }

        .forgotpassword{
            padding-left: 10%;
        }
        @media (max-width:800px) {
            .submit-btn{

                margin-right: 23%;
            }


        }

</style>

</head>
<body class="login2background">
<div class="container">
    <div class="col-lg-3 col-md-3 col-sm-3"></div>
    <div class="col-lg-6 col-md-6 col-sm-8  loginbox">
        <div class=" row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                <img src="public/dist/img/system/csclogo.png" alt="Logo" class="logo">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6  ">
                <span class="singtext" >Sign in </span>
            </div>

        </div>

        <form action="" method="post" >
        <div class=" row loginbox_content ">
            <div class="input-group input-group-sm" >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </span>
                <input class="form-control" type="email" placeholder="email"  name="email" required>
            </div>
            <br>
            <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </span>
                <input class="form-control" type="password" placeholder="Password" required name="pass" >
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-8 col-md-8  col-sm-8 col-xs-7 forgotpassword ">
                <a href="#"  > Forgot Password?</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4  col-xs-5 ">
                <button class="btn btn-warning" type="submit" name="submit">Submit <span class="glyphicon glyphicon-log-in"></span></button>
            </div>
        </div>

        </form>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 "></div>

    <?php if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$logindata=loginall($con, $email, $password);
	if ($logindata==false) {
		?><script>swal("Access Denied!", "Your Email and Password combination is incorrect!!") </script><?php
	}
	else {
		$id=$logindata[0];
		$role=$logindata[1];
		echo $role;
		if ($role==="CSC Staff") {
			session_start();
			$_SESSION['id']=$id;
			header('Location:staff/index.php');
			exit;
		}
		else if ($role==="CSC Coordinator") {
			session_start();
			$_SESSION['id']=$id;
			header('Location:cscco/index.php');
			exit;
		}
		else if($role==="Course Coordinator") {
			session_start();
			$_SESSION['id']=$id;
			header('Location:courseco/index.php');
			exit;
		}
	}
}

ob_end_flush();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="public/plugins/jQuery/jquery.js">
</script><script src="public/js/bootstrap.js"></script>



</div>
</body>
</html>