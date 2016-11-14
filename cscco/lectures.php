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

</head>
<body>


<?php include "comp/navbar.php"; ?>

</br>

<div class="container-fluid">
        <div class="row" style="padding: 10px;">

			<br>
        <div class="col-xs-12 col-sm-8 col-md-6 ">

			<center><h3>Add New Lectures</h3></center>
			<br>
				<form class="form-horizontal" action=" " method="post"  id="contact_form">


						<div class="form-group">
							<label class="col-md-4 control-label">Batch</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
									<input  name="batch" placeholder="Batch" class="form-control"  type="text" required>
								</div>
							</div>
						</div>

						<!-- Text input-->
                    <div class="form-group">
					<label class="col-md-4 control-label" >Course Name</label>
					<div class="col-md-6 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="course_name" class="form-control selectpicker" >
										<option value=" " >Please select subject</option>

										<?php

										$subs = getsubsfor();

										while ( $subjects = $subs->fetch_assoc()){ ?>

											<option value="<?php echo $subjects['subject']; ?>"><?php echo $subjects['subject']; ?></option>

									<?php	}



										?>

									</select>
                            
						</div>
					</div>
				</div>
                    
                    <div class="form-group">
							<label class="col-md-4 control-label"> Lecturer Name</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input  name="lecturer_name" placeholder="Lecturer Name" class="form-control"  type="text" required>
								</div>
							</div>
						</div>
                    
                    <div class="form-group">
							<label class="col-md-4 control-label">Date</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<input  name="date" placeholder="Date" class="form-control"  type="date" required>
								</div>
							</div>
						</div>
                    
                    <div class="form-group">
							<label class="col-md-4 control-label">Lecture Room</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
									<input  name="room" placeholder="Lecture Room" class="form-control"  type="text" required>
								</div>
							</div>
						</div>

						
                    <div class="form-group">
							<label class="col-md-4 control-label">Sessions</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
									<input  name="session" placeholder="Sessions" class="form-control"  type="number" required>
								</div>
							</div>
						</div>
                    
                    <div class="form-group">
							<label class="col-md-4 control-label">Starting Time</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									<input  name="s_time" placeholder="time" class="form-control"  type="time" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ending Time</label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									<input  name="e_time" placeholder="time" class="form-control"  type="time" required>
								</div>
							</div>
						</div>

						

					<center><div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<button type="submit" class="btn btn-info" name="submit">Submit <span class="glyphicon glyphicon-send"></span> </button>
								<button type="reset" class="btn btn-info" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
							</div>
						</div>

					</center>

				</form>
			</div>


			<?php


            if (isset($_POST['submit'])) {
                $register = array(

                    'batch' => $_POST['batch'],
                    'course_name' => $_POST['course_name'],
                    'lecturer_name' => $_POST['lecturer_name'],
                    'date' => $_POST['date'],
                    'room' => $_POST['room'],
                    'session' => $_POST['session'],
                    's_time' => $_POST['s_time'],
                    'e_time' => $_POST['e_time']
                    

                );


                register_lecti( $register); ?>
			<script>swal("New Lectures Added!", "You have added successfully")</script>

					<?php



            }

			?>
		



			<div class="col-xs-12 col-sm-4 col-md-6 ">

				<center><h3>Time Table</h3></center>
				<br>

				<table class="table table-bordred table-striped" style="width: 100%" id="lectable">
                    
					<thead>

					<tr>
						<th>Week/Date</th>
                        <th>time</th>
						<th>Lecturer</th>
                        <th>Lecture Room</th>
					</tr>


					</thead>
					<tbody>
					<?php  $lecs = gettable();

					while ( $lecdata = $lecs->fetch_assoc()){ ?>

						<tr>
							<td><?php echo $lecdata['date']; ?></td>
                            <td><?php echo $lecdata['s_time']; ?><?php echo $lecdata['e_time']; ?></td>
							<td><?php echo $lecdata['lecturer_name']; ?></td>
							<td><?php echo $lecdata['room']; ?></td>
							
                            
							<td><button class="btn btn-info"> Edit User</button></td>
						</tr>

					<?php	}


					?>

					</tbody>
				</table>

				</div>
    	</div>

</div>





















<?php include "../components/cscordinator_footer.php"; ?>
