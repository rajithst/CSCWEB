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

    <?php include "comp/navbar.php"; ?>
<ul class="breadcrum">
    <li class="completed"><a href="index.php">HOME</a></li>
    <li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
    <li class="completed"><a href="mark_type.php">STUDENT MARKS</a></li>
	<li class="completed"><a href="">EXAM</a></li>
    <li class="completed"><a href="select_course_marks_ex.php">SELECT COURSE</a></li>
	<li class="active"><a href="">EDIT MARKS</a></li>

</ul>
</br>

</head>

<body background="">

    <div class="container-fluid">

        <div class="col-sm-9 col-md-9">


        </div>


        <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="well"  >
				<?php
    $subid = $_GET['subid'];
    $res = getstudents($con,$subid);
    $subdata = getsubdata($con,$subid);
?>
        <section class="content-header">


            <div class="row">

                

                <form action="" method="post">
                <div class="col-md-10">

                   <h4><b>Subject : <?php echo $subdata[2]; ?></b></h4>
					<b>Subject id : </b><?php echo $subid?>
					<br>
                    <b> Course Id : </b><?php echo $subdata[1];?>
					<br>


                    <div class="box" style="width:100%;">
                        <div class="box-header">
                            <h3 class="box-title">Input Attendance</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">


                            <table class="table table-hover">
                                <tr>
                                    <th>Subject ID</th>
                                    <th>Student Name</th>
                                    <th>Marks</th>
                                    <th>Grade</th>
                                </tr>
                                <?php


                                while ($row= mysqli_fetch_assoc($res)) {

                                ?>
                                <tr>
                                    <td><?php  echo  $subid; ?></td>
                                    <td><?php  echo  $row['fullname']; ?></td>
                                    <td><input type="text" placeholder="Enter as a percentage(%)" checked name="marks" ></td>
                                    

                                </tr>

                                    <?php } ?>
                            </table>





                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-2"></div>
						
							<div class="col-md-2">
								<button type="submit" class="btn btn-block btn-success btn-md" name="next">Next Page</button>
							</div>

							<div class="col-md-2">
								<button type="cancel" class="btn btn-block btn-danger btn-md">Cancel</button>
							</div>
						
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>
                    </div>
                </form>
                <div class="col-md-2"></div>

                </div>

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
