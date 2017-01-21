<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/staff.php';
include '../components/page_head.php'; ?>


    <script>


        $(document).ready(function () {

            $('#mycalendar').monthly({
                mode: 'event',
                //jsonUrl: 'events.json',
                //dataType: 'json'
                xmlUrl: 'events.xml'
            });
        });
    </script>

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="active"><a href="">SELECT COURSE</a></li>
        
        

    </ul>
    </br>
    </br>

</head>

<body background="">
    <div class="container-fluid" style="margin-left:25%;">
        <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="well"  >
					<section class="content-header">

						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-10">
								<div class="box" style="width: 75%;">
									<div class="badge" style="font-size:40px;">
										Select Course
									</div>
									<!-- /.box-header -->
									<div class="box-body table-responsive no-padding">
										<table class="table table-hover">
											<tr>
												<th><span class="badge" style="font-size:15px;">Course ID</span></th>
												<th><span class="badge" style="font-size:15px;">Course Name</span></th>
											</tr>

											<?php
											$res = getall($con);
											while ($row = mysqli_fetch_assoc($res)) {
												$id= $row['courseid'];
												?>
											<tr id="tdata">
												<form action="register_students.php" method="post">
												<td><input type="submit" class="btn btn-success" value="<?php echo $row['courseid']; ?>" name="cid"></input></td>
												<td><?php echo $row['coursename']; ?></td>
												
												</form>
											</tr>
											<?php } ?>
										</table>
									</div>
									<!-- /.box-body -->
								</div>
								<!-- /.box -->
							</div>

							<div class="col-xs-2"> </div>
						</div>



						<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
							<div class="modal-dialog" role="document" style="top: 25%; margin-right: 75px;">
								<div class="modal-content">

									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel2">Subjects</h4>
									</div>

									<div class="modal-body">
										<ul>

										</ul>
									</div>

								</div><!-- modal-content -->
							</div><!-- modal-dialog -->
						</div><!-- modal -->

					</section>
                </div>
            

        </div>



    </div>
    <br>
    <br>
    </div>
    </div>
    </div>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <div class="container-fluid well span6">
                <div class="row">
                    <div class="col-md-4" >
                        <img src="<?php echo $staff_data['profile']; ?>" class="img-circle">
                    </div>

                    <div class="col-md-8" >
                        <h3><?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?></h3>
                        <h5><?php echo $staff_data['email']; ?></h5>
                        <h5><?php echo $staff_data['role']; ?></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>



<?php include "../components/page_tail.php";?>
