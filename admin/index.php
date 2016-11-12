<?php require '../core/function/admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Computing Service Center</title>

    <link href="../public/css/custom.css" rel="stylesheet">
    <link href="../public/fontawesome/css/font-awesome.css" rel="stylesheet">
    <link href="../public/plugins/nprogress/nprogress.css" rel="stylesheet">
    <link href="../public/plugins/sweealert/sweetalert.css" rel="stylesheet">
    <link href="../public/css/animate.css" rel="stylesheet">
    <link href="../public/dist/css/adminfull.css" rel="stylesheet">
    <script src="../public/plugins/jQuery/jquery.js"></script>
    <script src="../public/plugins/sweealert/sweetalert.min.js"></script>
</head>

<body class="login">
<div>
    <?php

    if(empty($_POST) === false and isset($_POST)=== true){

        $email    = $_POST['email'];
        $password = $_POST['password'];

        $login = login($email,$password);
        if($login === false){  ?>
            <script>swal("Access Denied!", "Your Email and Password combination is incorrect!!")</script>
            <?php

        }else{

            session_start();
            $_SESSION['id']= $login;
            header('Location:dashboard.php');
            exit();
        }
    }

    ?>


    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <center><h2> Computing Service Center </h2></center>
                <form action="" method="post">
                    <h1>Sign Up</h1>
                    <div>
                        <input type="email" class="form-control" placeholder="E-mail" name="email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                    </div>
                    <div>
                        <button class="submit" type="submit">Log in</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">


                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h2> University of Colombo School Of Computing</h2>
                            <p>©2016 All Rights Reserved. Webrax websolutions</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>


</body>
</html>