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
include '../components/page_head.php';?>



    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
        <li class="completed"><a href="select_course.php">SELECT COURSE</a></li>
        <li class="active"><a href="">INPUT ATTENDANCE</a></li>

    </ul>

</head>

<body background="">

    <div class="container-fluid">
		<?php
			$token = $_GET['token'];
			$subid = $_GET['subid'];
		?>
        <div class="row">
			<?php
			
			if($token==0)
			{?>
						<style>




							.stepwizard-step p {
								margin-top: 10px;
							}

							.process-row {
								display: table-row;
							}

							.process {
								display: table;
								width: 100%;
								position: relative;
							}

							.process-step button[disabled] {
								opacity: 1 !important;
								filter: alpha(opacity=100) !important;
							}

							.process-row:before {
								top: 50px;
								bottom: 0;
								position: absolute;
								content: " ";
								width: 100%;
								height: 1px;
								background-color: #ccc;
								z-order: 0;

							}

							.process-step {
								display: table-cell;
								text-align: center;
								position: relative;
							}

							.process-step p {
								margin-top:10px;

							}

							.btn-circle {
								width: 100px;
								height: 100px;
								text-align: center;
								padding: 6px 0;
								font-size: 12px;
								line-height: 1.428571429;
								border-radius: 15px;
							}
						</style>
						<center><h2>Select the batch</h2></center>
						<div class="process">
							<div class="process-row">
						<div class="process-step">
							 <a href="attendance.php?subid=<?php echo $subid?>&token=1">
							 <button type="submit" style="font-size:30px;" name="token" value="1" class="btn btn-info btn-circle" >01</button>
							 <p>batch 01</p> </a>
							</div>
						<div class="process-step">
							<a href="attendance.php?subid=<?php echo $subid?>&token=2">
							<button type="submit" style="font-size:30px;" name="token" value="2" class="btn btn-info btn-circle">02</button>
							<p>batch 02</p> </a>
						</div>
						<div class="process-step">
							<a href="attendance.php?subid=<?php echo $subid?>&token=3">
							<button type="submit" style="font-size:30px;" name="token" value="3" class="btn btn-info btn-circle">03</button>
							<p>batch 03</p> </a>
						</div>
						</div>
					</div>
						
					
			<?php
			}
			else if($token>0)
			{?>
        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-8 col-xs-12" style="padding-left: 10%">
				<?php
					$subid = $_GET['subid'];
					$res = getstudents($con,$subid,$token);
					$subdata = getsubdata($con,$subid);
				?>
        <center>
        <section class="content-header">

                <form action="lecandinstruct.php" method="post">
                <div class="col-md-10">
					

                   <h4><b>Subject : <?php echo $subdata[2]; ?></b></h4>
					<b>Subject id : </b><?php echo $subid?>
					<br>
                    <b> Course Id : </b><?php echo $subdata[1];?>
					<br>
                    <b> Batch number : </b><?php echo $token;?>
					<hr>


                    <div class="box" style="width:75%;">
                        <div class="box-header">
                            <h3 class="box-title">Input Attendance</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">


                            <table class="table table-hover">
                                <tr>
                                    <th>Subject ID</th>
                                    <th>Student Name</th>
                                    <th>mark Attendance</th>
                                    <th>Additional Infromation</th>
                                </tr>
                                <?php


                                while ($row= mysqli_fetch_assoc($res)) {

                                ?>
                                <tr>
                                    <td><?php  echo  $subid; ?></td>
                                    <td><?php  echo  $row['fullname']; ?></td>
									
                                    <td>
										<center>
											<input type="hidden" id="attendance[]" name="attendance[]"  value="<?php echo $row['name_w_initials']; ?>">
											<input type="checkbox" checked id="attendance[]" name="attendance[]" value="<?php  echo  $row['fullname']; ?>">
										</center>
									</td>
                                    <td><input type="text" name="addtional" class="form-control"></td>

                                </tr>

                                    <?php } ?>
                            </table>





                        </div>

                    </div>

                            <button type="submit" class="btn btn-block btn-success btn-md" name="next">Record Attendance</button>
                            
                        </div>
                </form>
            </section>
            </center>
        </div>
            <div class="col-md-2"></div>
        </div>

        

        <div class="col-md-4"></div>



<?php
    if(isset($_POST['next']) === true) {
        foreach ($_POST['attendance'] as $index => $val) {

            $sql1 = "SELECT attendance,total_attendance FROM student WHERE fullname='$val'";
            $res = mysqli_query($con,$sql1);
            $dd = mysqli_fetch_array($res);
            $current= $dd[0];
            $new = $current+ 1;
			
			$cr= $dd[1];
            $n = $cr-1;
			
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

        ?>

        <div class="col-md-4">
		<br>
        <div class="alert alert-info">
            <strong><center>Recorded!</center></strong>
        </div>

        <form action="lecandinstruct.php" method="GET"> 
		<center><button class="btn btn-info" type="submit" name="subid" value="<?php echo $subid; ?>">Process to next page</button></center>
		</form>

        <?php


    } ?>

        </div>

        </div>

			</div>
			<?php
			}
			?>






<?php include "../components/page_tail.php";?>
