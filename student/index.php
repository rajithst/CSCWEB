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
        <div class="col-sm-6" style="margin-top: 0px;">
            <div class="logo"><h3>Computing Service Center Student Portial</h3></div>
        </div>
        <div class="col-sm-5 hidden-xs">

        <form action="" method="post">
            <div class="row">
                <div class="col-sm-5">
                      <div class="form-group" style="margin-bottom: 15px;color: #fff;">
                        <label for="username">Username:</label>
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
                     <div class="form-group" style="margin-bottom: 15px;color: #fff;">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="login-bottom-text hidden-md"> Forgot your password?  </div>
                      </div>
                </div>
                <div class="col-sm-1">
                     <div class="form-group" style="margin-top: 20px;">
                        <input type="submit" value="Login" name="submit" class="btn btn-primary btn-header-login">
                      </div>
                </div>
                
            </div>  
            </form>

        </div>
        <div class="col-sm-1" style="margin-top: 20px;">
            <button class="btn btn-primary">Register</button>
        </div>
    </div>
    </div>
</header>
<?php

if(empty($_POST) === false and isset($_POST['submit'])=== true){

     $username  =filter_var($_POST['username'],FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL) ;
     $password = mysqli_real_escape_string($con,$_POST['password']);

    $login = loginstudent($con,$username,$password);

    if($login === false){  ?>

    <br><br>
    <div class="col-md-4 col-md-offset-4">

      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <center> <strong>Username and Password Combination is not valid</strong> <br> <a href="recover.php">Forget Password?</a></center>
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
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-xs-12">
            <article >
                
                <h3><strong>About</strong></h3>
                <hr>
                <p>The Computing Services Centre, which is the Consultancy arm of the UCSC was established in 1990 to provide Consultancy Services to the IT and related industries.</p>
                
                <br>
                <h3><strong>Short Term Training Courses At CSC</strong></h3>
                <hr>
                <p>The UCSC conducts specialised, short-term training programmes in the most advanced and up to date topics that are in demand in the industry. These programmes are designed with a view to enable a participant to learn about a particular programming language, a design methodology, new technologies or the use of specialised packages in small groups with close supervision. These courses are designed by the staff of UCSC and closely follows the industry needs and standards. Many of these courses are conducted over 5 or 10 days. Special programmes for individual groups from companies are arranged on demand.</p>
                <br>
                <h4><strong>Co-ordinator</strong></h4>
                <p>Mr. L.P. Jayasinghe – BSc (Col)(Instructor Gr. I)</p>
                
            </article>
        </div>
        <div class="col-sm-3 col-xs-12">
            <div><h3><strong>Contact</strong><h3></div>
            <hr>
            <article>
                <div class="wpb_wrapper">
                  <h4><strong>Mailing Address</strong></h4>
                  <p>University of Colombo School of Computing<br>
                  UCSC Building Complex,<br>
                  35 ,Reid Avenue, Colombo 7<br>
                  SRI LANKA<br>
                  </p>
                  <br>
                  <h4><strong>Telephone</strong></h4>
                  <p>
                    +94 -1- 2581245 ext. 8910 / 8911
                  </p>
                  <br>
                  <h4><strong>Fax</strong></h4>
                  <p>+94-1-2587239</p>
                  <br>
                  <h4><strong>E-mail</strong></h4>
                  <p> csc@ucsc.cmb.ac.lk</p>
                  <br>
                </div>
            </article>
        </div>
</article>


<?php include "../components/stud_footer.php"; ?>