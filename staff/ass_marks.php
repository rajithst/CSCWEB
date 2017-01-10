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
	<li class="completed"><a href="">ASSIGNMENT</a></li>
    <li class="completed"><a href="select_course_marks_ass.php">SELECT COURSE</a></li>
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
					<b>Subject id : </b><?php echo $subid; ?>
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
                                    
                                </tr>
                                <?php


                                while ($row= mysqli_fetch_assoc($res)) {

                                ?>
                                <tr>
                                    <td><?php  echo  $subid; ?></td>
                                    <td><?php  echo  $row['fullname']; ?></td>
                                    <td><input type="text" placeholder="Enter as a percentage(%)" name="marks[]" id="marks[]" value="<?php $row['fullname']; ?>"></td>
                                    

                                </tr>

                                    <?php } ?>
                            </table>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-2"></div>
						
							<div class="col-md-4">
								<button type="submit" class="btn btn-block btn-success btn-md" name="next">Submit marks</button>
							</div>

							<div class="col-md-4">
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
		
		
		<?php
    if(isset($_POST['next']) === true) {
        foreach ($_POST['marks'] as $index => $val) {

            $sql1 = "SELECT assignment_marks,total_assignments FROM student WHERE fullname='$val'";
            $res = mysqli_query($con,$sql1);
            $dd = mysqli_fetch_array($res);
            $currentmarks= $dd[0];
			$newmark = $currentmarks;
            
			
            $sql = "UPDATE student SET attendance=$new,total_attendance=$n WHERE fullname = '$val'" ;
            $res = mysqli_query($con,$sql);
			
			$sql2 = "SELECT total_attendance FROM student WHERE (fullname='$val' or name_w_initials='$val')";
			$res2=mysqli_query($con,$sql2);
			$dx = mysqli_fetch_array($res2);
			$cur= $dx[0];
            $nw = $cur+ 1;
			$sql3 = "UPDATE student SET total_attendance=$nw WHERE (fullname = '$val' or name_w_initials='$val') " ;
            $res3 = mysqli_query($con,$sql3);
			

        }
    }

        ?>



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
