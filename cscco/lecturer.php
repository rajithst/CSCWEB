<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/cscco.php';

include '../components/cscordinator_head.php'; ?>

<link rel="stylesheet" href="../public/dist/css/handle-lecturer.css">

	<style>


		.navbar-login
		{
			width: 305px;
			padding: 10px;
			padding-bottom: 0px;
		}

		.navbar-login-session
		{
			padding: 10px;
			padding-bottom: 0px;
			padding-top: 0px;
		}

		.icon-size
		{
			font-size: 87px;
		}
	</style>




</head>
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#"><img src="../public/dist/img/system/csclogo.png" style="width:170px; height:50px;" ></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right" style="margin-right:30px; padding: 10px;">
				<li><a href="index.php" style="height:50px;"><span class="glyphicon glyphicon-home"></span> Home</a>
				<li><a href="#" style="height:50px;"><span class="glyphicon glyphicon-globe"></span> Notifications</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;"><span class="glyphicon glyphicon-envelope"></span>  Emails And Posts  <span class="glyphicon glyphicon-chevron-down"></span>
					</a>
					<ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
						<li><a tabindex="-1" href="email.php">Email</a></li>
						<li role="separator" class="divider"></li>
						<li><a tabindex="-1" href="notification.php">Notification</a></li>
						<li role="separator" class="divider"></li>
					</ul>
				</li>



				<ul class="nav navbar-nav navbar-right" >
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user"></span> 
							<strong><?php echo $staff_data['first_name']; ?></strong>
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="navbar-login">
									<div class="row">
										<div class="col-lg-4">
											<p class="text-center">
												<span class="glyphicon glyphicon-user icon-size"></span>
											</p>
										</div>
										<div class="col-lg-8">
											<p class="text-left"><strong><?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?></strong></p>
											<p class="text-left small"><?php echo $staff_data['email']; ?></p>
											<p class="text-left">
												<a href="#" class="btn btn-primary btn-block btn-sm">See Profile</a>
											</p>
										</div>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="navbar-login navbar-login-session">
									<div class="row">
										<div class="col-lg-12">
											<p>
												<a href="logout.php" class="btn btn-danger btn-block">Logout</a>
											</p>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
		</div>
	</div>
	</nav>
    
   </br> 
    

        <div class="row" style="padding: 10px;">


			<center> <h2>Add Lecturer</h2></center>
			<br>
			<hr>
			<br>
        <div class="col-xs-12 col-sm-8 col-md-6 ">


				<form class="form-horizontal" action=" " method="post"  id="contact_form">


						<div class="form-group">
							<label class="col-md-4 control-label">First Name</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input  name="first_name" placeholder="First Name" class="form-control"  type="text">
								</div>
							</div>
						</div>

						<!-- Text input-->

						<div class="form-group">
							<label class="col-md-4 control-label" >Last Name</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input name="last_name" placeholder="Last Name" class="form-control"  type="text">
								</div>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
									<input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
								</div>
							</div>
						</div>


						<!-- Text input-->

						<div class="form-group">
							<label class="col-md-4 control-label">Phone #</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
									<input name="phone" placeholder="(845)555-1212" class="form-control" type="text">
								</div>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label">Subject</label>
							<div class="col-md-6 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
									<select name="subject" class="form-control selectpicker" >
										<option value=" " >Please select subject</option>

										<?php

										$subs = getsubsfor();

										while ( $subjects = $subs->fetch_assoc()){ ?>

											<option><?php echo $subjects['subject']; ?></option>

									<?php	}



										?>

									</select>
								</div>
							</div>
						</div>


					<center><div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<button type="submit" class="btn btn-success" >Submit <span class="glyphicon glyphicon-send"></span> </button>
								<button type="reset" class="btn btn-danger" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
							</div>
						</div>

					</center>




				</form>
			</div>
		



			<div class="col-xs-12 col-sm-4 col-md-6 ">

				<center><h3>Current Lecturers</h3></center>

				<table class="table table-bordred table-striped" style="width: 100%" id="lectable">
					<thead>

					<tr>
						<td>First Name</td>
						<td>Last Name</td>
						<td>E mail</td>
						<td>Subject</td>
						<td>Send</td>
					</tr>


					</thead>
					<tbody>
					<?php  $lecs = getlecs();

					while ( $lecdata = $lecs->fetch_assoc()){ ?>

						<tr>
							<td><?php echo $lecdata['first_name']; ?></td>
							<td><?php echo $lecdata['last_name']; ?></td>
							<td><?php echo $lecdata['email']; ?></td>
							<td><?php echo $lecdata['subject']; ?></td>
							<td> <button class="btn btn-success"> Send Email</button></td>
						</tr>

					<?php	}


					?>

					</tbody>
				</table>

				</div>
    	</div>



<?php include "../components/cscordinator_footer.php"; ?>
<script>

$(document).ready( function () {
	$('#lectable').DataTable();
} );

</script>