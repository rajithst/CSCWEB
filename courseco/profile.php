<?php
session_start();
ob_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/coursecode.php';
include '../components/course_head.php'; ?>



</head>
<body>



    <?php include "comp/navbar.php"; ?>

</br>


 <?php

$fnameerr = $lnameerr = $emailerr = $passworderr = $confirmpassworderr = $matchingerror = "";

if(isset($_POST["submit"])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if(empty($fname)){
        $fnameerr = "First name should be included !"; 
    }else{
        $fname = test_input($fname);
    
    }
    if(empty($lname)){
        $lnameerr = "Last name should be included !"; 
    }else{
        $lname = test_input($lname);
    
    }
    if(empty($email)){
        $emailerr = "E-mail should be included !"; 
    }else{
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = "Invalid email format"; 
    }
    
    }
    if(empty($password)){
        $passworderr = "password should be included !"; 
    }else{
        $password = test_input($password);
    
    }
    if(empty($confirmpassword)){
        $confirmpassworderr = "password should be included again!"; 
    }else{
        $confirmpassword = test_input($confirmpassword);
    }


    $md5password = md5($password);
    $md5confirmpassword = md5($confirmpassword);

    /*if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($confirmpassword)){*/
        if($md5password!=$md5confirmpassword){
            $matchingerror = "passwords do not match, please enter the same password to confirm !";
            
       
        }else{
            update_settings($con,$fname,$lname,$email,$md5password,$staff_data['id']);
            //session_start();
            session_destroy();
            header('Location:../index.php');
<<<<<<< HEAD
            ob_end_flush();
            exit();


=======

            ob_end_flush();
            exit();

>>>>>>> 44371cac8626ebe47a1b3162d8f8d1af13748b41
        }
   /* }*/

   } 

function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}


?>



<div class="container" style="margin-top: -30px;">

    <h1 class="page-header">Edit Profile</h1>
    
    <div class="row">
    <center>
   
   
            <div class="alert alert-info">
            <strong>Changing account settings may cause the system to log out !</strong>
            </div>
   
   
   </center>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <img src="<?php echo $staff_data['profile']; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Browse for different photo...</h6>
                <input type="file" class="text-center center-block well well-sm">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <h3>Personal information</h3>
            <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="fname" value="<?php echo $staff_data['first_name']; ?>" type="text">
                        <span style="color: red; margin-left: 18px;"><?php echo $fnameerr;?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="lname" value="<?php echo $staff_data['last_name']; ?>" type="text">
                        <span style="color: red; margin-left: 18px;"><?php echo $lnameerr;?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" value="<?php echo $staff_data['email']; ?>" type="text">
                       <span style="color: red; margin-left: 18px;"><?php echo $emailerr;?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="password" value="" type="password">
                        <span style="color: red; margin-left: 18px;"><?php echo $passworderr;?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="confirmpassword" value="" type="password">
                    </div>
                    <span style="color: red; margin-left: 18px;"><?php echo $confirmpassworderr;?></span>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input class="btn btn-primary" value="Save Changes" name="submit" type="submit">
                        <span></span>
                        <input class="btn btn-default" value="Cancel" type="reset">
                    </div>
                </div>
            </form>

           

        </div>
    </div>
</div>

<?php include "../components/cscordinator_footer.php"; ?>