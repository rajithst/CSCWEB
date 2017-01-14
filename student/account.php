<?php
session_start();
ob_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../core/init.php';
require '../components/stud_head.php';
require '../core/function/student.php';
require '../core/base_connection.php';
?>

<body style="background-color: #f0f0f0;overflow-x:hidden;">
<?php include "comp/navbar.php"; ?>

<div class="row" style="margin-left:20px; margin-bottom: 20px;">
    <div class="btn-group btn-breadcrumb">
        <a href="home.php" class="btn btn-primary"><i class="glyphicon glyphicon-home"> Home</i></a>
        <a href="#" class="btn btn-primary"><?php echo $stu_data['name_w_initials']; ?></a>
        <a href="#" class="btn btn-primary" style="color: #ccc;">Account Settings</a>
    </div>
</div>

	<div class="container" >
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2" style="background-color: #fff;margin-bottom: 60px;">

				<div><center><h3>Account Settings</h3></center></div>
				<hr>

				<?php 

				$stu_id=$stu_data['id'];
				$stu_uname=$stu_data['username'];
				$stu_email=$stu_data['email'];
				$stu_contact=$stu_data['home_mobile'];
				$stu_pwd=$stu_data['password'];
				$comment='';
				$column='';

				$usernameError='';
				if(isset($_POST['save1'])){
					if(empty($_POST['username'])){
						$usernameError='Invalid Input';
					}
				}

				$contactError='';
				if(isset($_POST['save2'])){
					if(empty($_POST['contact'])){
						$contactError='Invalid Input';
					}
				}

				$emailError='';
				if(isset($_POST['save3'])){
					if(empty($_POST['email'])){
						$emailError='Invalid Input';
					}
				}

				$pwdError='';
				if(isset($_POST['save4'])){
					if(empty($_POST['newpwd'])){
						$pwdError='Invalid Input';
					}else

					if(empty($_POST['conpwd'])){
						$pwdError='Invalid Input';
					}

					if(empty($_POST['curpwd'])){
						$pwdError='Invalid Input';
					}

				}

				function test_input($data){
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}

				?>

				<div>
					<table class="table table-striped">
						<tr>
							<td>
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>Username:</strong></h5></div>
								<div class="col-sm-9 col-xs-9" style="color: #85adad;"><h5><strong><?php echo $stu_uname ; ?></strong></h5></div>
							</td>
						</tr>
						<tr>
							<td>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>New:</strong></h5></div>
								<div class="col-sm-7 col-xs-7"><input type="text" class="form-control" name="username"></div>
								<div class="col-sm-2 col-xs-2"><input type="submit" name="save1" value="save" class="btn btn-primary"></div>
								<?php 

								if(isset($_POST['save1']) && !empty($_POST['username'])){
									$username= test_input($_POST['username']);
									$column='username';
									$result=updatedata($con,$column,$username,$stu_id);
									$comment="Successfully updated.";
								}

								?>

								<?php
								if($usernameError!=''){
								?>
								<div class="col-sm-6 col-sm-offset-3" style="margin-top:5px;margin-right: 30px;">
									<div class="alert alert-danger">
        								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       									<strong><?php echo $usernameError ;?></strong>
      								</div>
      							</div>
								<?php
								}else{
								?>
									<div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $usernameError ;?></span></div>
								<?php
								}
								?>
								
								
							</form>
							</td>
						</tr>

						<tr>
							<td>
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>Contact Number:</strong></h5></div>
								<div class="col-sm-9 col-xs-9" style="color: #85adad;"><h5><strong><?php echo $stu_contact ; ?></strong></h5></div>
							</td>
						</tr>
						<tr>
							<td>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>New:</strong></h5></div>
								<div class="col-sm-7 col-xs-7"><input type="text" class="form-control" name="contact"></div>
								<div class="col-sm-2 col-xs-2"><input type="submit" name="save2" value="save" class="btn btn-primary"></div>
								<?php

								if(isset($_POST['save2']) && !empty($_POST['contact'])){
									if(!preg_match('^[0-9]{11}^', $_POST['contact'])){
										$contactError='Invalid Format';
									}else{
										$contact=$_POST['contact'];
										$column='home_mobile';
										$result=updatedata($con,$column,$contact,$stu_id);
										$comment="Successfully updated.";
									}
								}

								?>


								<?php
								if($contactError!=''){
								?>
								<div class="col-sm-6 col-sm-offset-3" style="margin-top:5px;margin-right: 30px;">
									<div class="alert alert-danger">
        								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       									<strong><?php echo $contactError ;?></strong>
      								</div>
      							</div>
								<?php
								}else{
								?>
									<div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $contactError ;?></span></div>
								<?php
								}
								?>
								
							</form>
							</td>
						</tr>

						<tr>
							<td>
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>Email:</strong></h5></div>
								<div class="col-sm-9 col-xs-9" style="color: #85adad;"><h5><strong><?php echo $stu_email ; ?></strong></h5></div>
							</td>
						</tr>
						<tr>
							<td>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>New:</strong></h5></div>
								<div class="col-sm-7 col-xs-7"><input type="email" class="form-control" name="email"></div>
								<div class="col-sm-2 col-xs-2"><input type="submit" name="save3" value="save" class="btn btn-primary"></div>
								<br>

								<?php

								if(isset($_POST['save3']) && !empty($_POST['email'])){
						
									if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
										$emailError='Invalid Email Format';
									}else{
										$email=test_input($_POST['email']);
										$column='email';
										$result=updatedata($con,$column,$email,$stu_id);
										$comment="Successfully updated.";
									}
								}

								?>

								<?php
								if($emailError!=''){
								?>
								<div class="col-sm-6 col-sm-offset-3" style="margin-top:5px;margin-right: 30px;">
									<div class="alert alert-danger">
        								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       									<strong><?php echo $emailError ;?></strong>
      								</div>
      							</div>
								<?php
								}else{
								?>
									<div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 18px;"><?php echo $emailError ;?></span></div>
								<?php
								}
								?>
								
							</form>
							</td>
						</tr>

						<tr>
							<td>
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>Password:</strong></h5></div>
								<div class="col-sm-9 col-xs-9" style="color: #85adad;"><h5><strong>Enter the password.</strong></h5></div>
							</td>

						</tr>
						<tr>
							<td >
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<div class="col-sm-12" style="margin-bottom: 5px;">
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>New:</strong></h5></div>
								<div class="col-sm-6 col-xs-9" style="margin-left: -7px;"><input type="password" class="form-control" name="newpwd"></div>
								<div class="col-sm-3 col-xs-12"><span style="color: red; margin-left: 0px;"><?php //echo $pwdError ;?></span></div>
								</div>
								<br>
								<div class="col-sm-12" style="margin-bottom: 5px;">
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>Confirm:</strong></h5></div>
								<div class="col-sm-6 col-xs-9" style="margin-left: -7px;"><input type="password" class="form-control" name="conpwd"></div>
								<div class="col-sm-3 col-xs-12"><span style="color: red; margin-left: 0px;"><?php //echo $pwdError ;?></span></div>
								</div>
								<br>
								<div class="col-sm-12" style="margin-bottom: 5px;">
								<div class="col-sm-3 col-xs-3" align="right"><h5><strong>Current:</strong></h5></div>
								<div class="col-sm-6 col-xs-9" style="margin-left: -7px;"><input type="password" class="form-control" name="curpwd"></div>
								<div class="col-sm-3 col-xs-12"><span style="color: red; margin-left: 0px;"><?php //echo $pwdError ;?></span></div>
								</div>
								<br>
								<div class="col-sm-12" style="margin-bottom: 0px;">
									<div class="col-sm-6 col-sm-offset-3"><input type="submit" name="save4" value="save" class="btn btn-primary"></div>
								</div>
								<?php 

								if(isset($_POST['save4']) && !empty($_POST['newpwd']) && !empty($_POST['conpwd']) && !empty($_POST['curpwd'])){
									$newpwd=test_input($_POST['newpwd']);
									$conpwd=test_input($_POST['conpwd']);
									$curpwd=test_input($_POST['curpwd']);

									if(($newpwd!=$conpwd) || ($curpwd!=$stu_pwd)){
										$pwdError='Password Combination error occured.';
									}else{
										$newpwd1=md5($newpwd);
										$column='password';
										$result=updatedata($con,$column,$newpwd1,$stu_id);
										$comment="Successfully updated.";
									}
								}

								?>

								<?php
								if($pwdError!=''){
								?>
								<div class="col-sm-6 col-sm-offset-3" style="margin-top:5px;">
									<div class="alert alert-danger">
        								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       									<center> <strong><?php echo $pwdError ;?></strong> </center>
      								</div>
      							</div>
								<?php
								}else{
								?>
									<div class="col-sm-6 col-sm-offset-3"><span style="color: red; margin-left: 0px;"><?php echo $pwdError ;?></span></div>
								<?php
								}
								?>
								
							</form>
							</td>
						</tr>

					</table>

					<hr>
					<?php
					if($comment!=''){
					?>
						<div class="alert alert-success">
        					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       						<center> <strong><?php echo $comment ;?></strong> </center>
      					</div>
					<?php
					}else{
					?>
						<span style="color: green; margin-bottom: 30px;"><center><h4><?php echo $comment ;?><h4></center></span>
					<?php
					}
					?>

				</div>

			</div>
		</div>
	</div>

<?php include "../components/stud_footer.php"; ?>
</body>