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

			<center><h3>Add New Course</h3></center>
			<br>
			<form class="form-horizontal" action=" " method="post"  id="contact_form">



				<div class="form-group">
					<label class="col-md-4 control-label">Parent Course</label>
					<div class="col-md-6 selectContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="subject" class="form-control selectpicker" id="getmaincat">
								<option value=" " >Please select Parent Cetegory</option>

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
					<label class="col-md-4 control-label">Course ID</label>
					<div class="col-md-6 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
							<input  name="first_name" placeholder="" class="form-control"  type="text" >
						</div>
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="col-md-4 control-label" >Course Name</label>
					<div class="col-md-6 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
							<input name="last_name" placeholder="" class="form-control"  type="text">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Course Coordinator</label>
					<div class="col-md-6 selectContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="subject" class="form-control selectpicker" >
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
							<input name="email" placeholder="" class="form-control"  type="number">
						</div>
					</div>
				</div>


				<!-- Text input-->

				<div class="form-group">
					<label class="col-md-4 control-label">Duration in weeks</label>
					<div class="col-md-6 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
							<input name="phone" placeholder="" class="form-control" type="number">
						</div>
					</div>
				</div>





				<center><div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success" >Create Course <span class="glyphicon glyphicon-send"></span> </button>
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

</div>

<?php include "../components/cscordinator_footer.php"; ?>
<script>

	$(document).ready( function () {
		$('#lectable').DataTable();
	} );


	$('#getmaincat').click(function () {

        var cid = $(this).val();
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


		})
	});

</script>