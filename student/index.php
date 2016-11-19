<?php 
ob_start();
require '../core/base_connection.php';
require '../core/function/student.php';
require '../components/stud_head.php';

?>
<link rel="stylesheet" href="../public/dist/css/student.css">
 <link rel="stylesheet" href="../public/dist/css/studentlogin.css">

    </head>

    <body>

    <header>
    <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="logo">Computing Service Center Student Portial</div>
        </div>
        <div class="col-sm-6 hidden-xs">

        <form action="" method="post">
            <div class="row">
                <div class="col-sm-5">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="login-bottom-text checkbox hidden-sm">
                            <label>
                              <input type="checkbox" id="">
                              Keep me sign in
                            </label>
                          </div>
                      </div>
                </div>  
                <div class="col-sm-5">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Password" name="password">
                        <div class="login-bottom-text hidden-sm"> Forgot your password?  </div>
                      </div>
                </div>
                <div class="col-sm-2">
                     <div class="form-group">
                        <input type="submit" value="login" name="submit" class="btn btn-default btn-header-login">
                      </div>
                </div>
            </div>  
            </form>
        </div>
    </div>
    </div>
</header>
<article class="container">
        <div class="row">
            <!-- <div class="col-sm-8">
                <div class="login-main">
                    <h4><i class="fa fa-dashboard"></i> Gorgeous color and design</h4>
                    <span>Some sample description text about the template goes here</span>
            
                    <h4> <i class="fa fa-money"></i> 100%  fully responsive </h4>
                    <span>Another description text about the template goes here</span>
            
                    <h4><i class="fa fa-mobile-phone"></i> Competible with all browers and mobile devices</h4>
                    <span>Yet another sample description text can be placed in one line</span>
            
                    <h4> <i class="fa fa-trophy"></i> Easy to use and custmize with mobile friendly and responsive</h4>
                    <span>Your last description text about your startup or business</span>
                </div>
            </div> -->
            <!-- <div class="col-sm-4">
                <div class="">
                
                <h3><i class="fa fa-shield"></i> Register now</h3>
                <hr>
                <div class="form-group">
                  <label class="control-label" for="">Email Address</label>
                  <input type="text" class="form-control" placeholder="Email Address">
                </div>
            
                <div class="form-group">
                  <label class="control-label" for="">Password</label>
                  <input type="text" class="form-control" placeholder="Password">
                </div>
            
                <div class="form-group">
                  <label class="control-label" for="">Repeat Password</label>
                  <input type="text" class="form-control" placeholder="Repeat Password">
                </div>
            
                <div class="">
                    <label>Birthday</label>
                  <div class="form-group">
                      <div class="col-sm-4 multibox">
                        <select class="form-control">
                            <option>Day</option>
                        </select>
                      </div>
                       <div class="col-sm-4 multibox">
                        <select class="form-control">
                            <option>Month</option>
                        </select>
                      </div>
                       <div class="col-sm-4 multibox">
                        <select class="form-control">
                            <option>Year</option>
                        </select>
                      </div>
                   
                  </div>
                </div> -->
              
               <!--  <small>
                   By clicking Sign Up, you agree to our Terms and that you have read our
                    Data Use Policy, including our Cookie Use.
               </small>     
               <div style="height:10px;"></div>
               <div class="form-group">
                 <label class="control-label" for=""></label>
                 <input type="submit" class="btn btn-primary">
               </div>    -->

                  </div>
            </div>
            </div>
        </div>
</article>
<?php

if(isset($_POST['submit'])=== true){

     $username    = $_POST['username'];
     $password = $_POST['password'];

    $login = loginstudent($con,$username,$password);

    if($login === false){  ?>

    <br><br>
    <div class="col-md-4 col-md-offset-4">

      <div class="alert alert-danger">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <center> <strong>Your Username Password Combination is not valid</strong> <br> <a href="recover.php">Forget Password?</a></center>
</div>
        </div>

        <?php

    }else{

        session_start();
         $_SESSION['id']= $login;       
        header('Location:home.php');
        ob_end_flush();   
        exit();
    }
}

?>

<?php include "../components/stud_footer.php"; ?>