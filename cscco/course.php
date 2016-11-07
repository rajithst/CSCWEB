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



<?php


if (isset($_POST['submit'])) {

	$register_data = array(

		'courseid' => $_POST['courseid'],
		'subject' => $_POST['subject'],
		'subjectid' => $_POST['subjectid'],
		'coursecid' => $_POST['coursecid'],
		'fee' => $_POST['fee'],
		'duration' => $_POST['duration']

	);

	addnewcourse( $register_data); ?>
	<script>swal("New Coursr Added!", "Your have benn added a course successfully")</script>

	<?php



}




?>









<div class="container-fluid">
	<div class="row" style="padding: 10px;">

		<br>
		<div class="col-xs-12 col-sm-8 col-md-6 ">

			<center><h3>Add New Course</h3></center>


			<center><div class="alert alert-danger">
				<strong>Warning!</strong> Cant Use existing course id for new course.
			</div></center>


			<br>
			<form class="form-horizontal" action="" method="post"  id="contact_form">



				<div class="form-group">
					<label class="col-md-4 control-label">Parent Course</label>
					<div class="col-md-6 selectContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="courseid" class="form-control selectpicker" id="getmaincat">
								<option value="">--- SELECT PARENT CATEGORY ---</option>
								<?php

								$subs = getcoursefor();

								while ( $subjects = $subs->fetch_assoc()){ ?>

									<option value="<?php echo $subjects['courseid']; ?>"><?php echo $subjects['coursename']; ?></option>

								<?php	}



								?>

							</select>
						</div>
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-4 control-label">Course ID</label><button type="button" class="btn btn-warning" id="getid">Get Course ID</button>
					<div class="col-md-6 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
							<input readonly  name="subjectid" placeholder="" class="form-control"  type="text" value="" id="courseid" >
						</div>
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="col-md-4 control-label" >Course Name</label>
					<div class="col-md-6 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
							<input name="subject" placeholder="" class="form-control"  type="text">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Course Coordinator</label>
					<div class="col-md-6 selectContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="coursecid" class="form-control selectpicker" >
								<option value=" " >Please select Course Coordinator</option>

								<?php

								$subs = getcoursecodinators();

								while ( $data = $subs->fetch_assoc()){ ?>

									<option value="<?php echo $data['id']; ?>"><?php echo $data['first_name'] . " ". $data['last_name']; ?></option>

								<?php	}



								?>

							</select>
						</div>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label">Course Fee = Rs:</label>
					<div class="col-md-6 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
							<input name="fee" placeholder="" class="form-control"  type="number">
						</div>
					</div>
				</div>


				<!-- Text input-->

				<div class="form-group">
					<label class="col-md-4 control-label">Duration in weeks</label>
					<div class="col-md-6 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
							<input name="duration" placeholder="" class="form-control" type="number">
						</div>
					</div>
				</div>





				<center><div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success" name="submit">Create Course <span class="glyphicon glyphicon-send"></span></button>
							<button type="reset" class="btn btn-danger" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
						</div>
					</div>

				</center>

			</form>
		</div>







		<div class="col-xs-12 col-sm-4 col-md-6 ">

			<center><h3>Current Courses for <span id="display"></span></h3></center>
			<br>

			<table class="table table-bordred table-striped" style="width: 100%" id="lectable">
				<thead>

				<tr>
					<th>Course ID</th>
					<th>Course Name</th>

				</tr>


				</thead>
				<tbody id="tbody">

				</tbody>
			</table>



	</div>
</div>

	<br><br>
		<center>
			<a href="fullcourses.php"><button class="btn btn-info">See Full Courses Here</button></a>
			<a href="addparent.php"><button class="btn btn-info">Add new parent Category Here</button></a>
		</center>
</div>

<?php include "../components/cscordinator_footer.php"; ?>
<script>

	$(document).ready( function () {
		$('#lectable').DataTable();


		var cid = "";
	$('#getmaincat').click(function () {
		$('input#courseid').val("");
         cid = $(this).val();
		var n = $('#getmaincat').find('option:selected').text()+" "+"("+cid+")";

		$('#display').html("");
		$('#display').html(n);


		$.ajax({

			url:'getsubs.php?cid='+cid,
			type:"GET",
			success:function (data) {
                $('#tbody').html("");
                $('#tbody').html(data).fadeIn("slow");

			}


		});


	});


	$('button#getid').click(function () {

		var rowCount = $('#lectable >tbody > tr').length;
		console.log(rowCount);

		$('input#courseid').val("");
		$('input#courseid').val(cid+"/"+(rowCount+1));

	});

	});

</script>