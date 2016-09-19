<?php

require 'core/function/frontend.php';
?>


<!doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

 <title>Computing And Service Center</title>
 <link rel="stylesheet" href="public/css/custom.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="public/dist/css/mainlogin.css" />
 <link rel="stylesheet" href="public/dist/css/mainloginbody.css" />
 <link rel="stylesheet" href="public/plugins/sweealert/sweetalert.css" />
 <!-- <link rel="stylesheet" href="public/plugins/sweealert/google.css" /> -->
 <script src="public/plugins/jQuery/jquery.js"></script>
 <script src="public/plugins/sweealert/sweetalert.min.js"></script>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


		<body style="background-color: #515151">

		<div class="top-content">

		 <div class="inner-bg">
		  <div class="container">
		   <div class="row">
		    <div class="col-sm-8 col-sm-offset-2 text">
		     <h1><strong>Computer and Service Center</strong></h1> <br>
		     <div class="description">
		      <p>
		       Main login area of <strong style="color: green;">Computer and Service Center</strong> of University of Colombo School of Computing
		       <br>
		       This site  accessible only for provided users
		      </p>
		     </div>
		    </div>
		   </div>
		   <div class="row">
		    <div class="col-sm-6 col-sm-offset-3 form-box">
		     <div class="form-top">
		      <div class="form-top-left">
		       <h3>Login to CSC Account</h3>
		       <p>Enter your Email and Password to log on:</p>
		      </div>
		      <div class="form-top-right">
		       <i class="fa fa-lock"></i>
		      </div>
		     </div>
		     <div class="form-bottom">


		      <?php

		      if(isset($_POST['main'])=== true){

				 $email    = $_POST['email'];
			 	 $password = $_POST['password'];
				  $login = loginall($email,$password);

		       if($login === false){  ?>

			<script>swal("Access Denied!", "Your Email and Password combination is incorrect!!")</script>

			<?php

		       }else{

					header('Location:logall.php');
					exit();
		       }
		      }

		      ?>

		      <form action="" method="post" class="login-form">

			     <div class="form-group">
			      <label class="sr-only" for="form-username">Email</label>
			      <input type="text" name="email" placeholder="Email..." class="form-username form-control" id="form-username">
			     </div>
			     <div class="form-group">
			      <label class="sr-only" for="form-password">Password</label>
			      <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
			     </div>
		       <button type="submit" class="btn" name="main">Sign in!</button>
		      </form>



		     </div>
		    </div>
		   </div>
		  </div>
		 </div>

		</div>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="public/plugins/jQuery/jquery.js"></script>
		<script src="public/js/bootstrap.js"></script>

		</body>
</html>
