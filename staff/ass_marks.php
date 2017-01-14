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

        <div class="col-sm-9 col-md-9"></div>
		<div class="row">
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
							<?php
								$qry="SELECT batch FROM subjects WHERE subjectid='$subid'";
								$result=mysqli_query($con,$qry);
								while ($row= mysqli_fetch_assoc($result)) 
								{
									if($row['batch']!=null)
									{
										echo '<center><h2>Select the batch</h2></center>
												<div class="process">
													<div class="process-row">';
										$i=1;
										while($i<=$row['batch'])
										{
											echo '
											<div class="process-step">
												 <a href="ass_marks.php?subid='.$subid.'&token='.$i.'">
												 <button type="submit" style="font-size:30px;" name="token" value=$i class="btn btn-info btn-circle" >
												 0';echo $i;
												 echo '</button>
												 <p>batch 0';
												 echo $i;
												 echo'</p> </a>
											</div>';
											$i=$i+1;
										}
									}
									else
									{
										echo '<div class="col-md-12">
												<br>
												<div class="alert alert-warning">
													<strong><center>THERE IS NO CURRENT BATCH FROM THIS COURSE</center></strong>
												</div>';
									
										
									}
								}
							?>
						</div>
					</div>
						
					
			<?php
			}
			else if($token>0)
			{?>
			<div class="col-md-2"></div>
        <div class="col-md-8 col-sm-8 col-xs-12" style="margin-left: 25%">
				<?php
					$subid = $_GET['subid'];
					$res = getstudents($con,$subid,$token);
					$subdata = getsubdata($con,$subid);
				?>
        <center>
        <section class="content-header">

                <form action="" method="post">
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
                            <h3 class="box-title">Input Marks</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">


                            <table class="table table-hover">
                                <tr>
                                    <th>Subject ID</th>
                                    <th>Student Name</th>
                                    <th>assignment marks</th>
                                    
                                </tr>
                                <?php


                                while ($row= mysqli_fetch_assoc($res)) {

                                ?>
                                <tr>
                                    <td><?php  echo  $subid; ?></td>
                                    <td><?php  echo  $row['fullname']; ?></td>
									
                                    <td>
										<center>
											<input type="hidden" id="name[]" name="name[]"  value="<?php echo $row['fullname']; ?>">
											<input type="text" placeholder="Enter as a percentage(%)" name="marks[]" id="marks[]">
										</center>
									</td>
                                    

                                </tr>

                                    <?php } ?>
                            </table>





                        </div>

                    </div>

                            <button type="submit" class="btn btn-block btn-success btn-md" name="next"><b>Record Marks </b><span class="glyphicon glyphicon-ok"></button>
                            
                        </div>
                </form>
            </section>
            </center>
        </div>
            <div class="col-md-2"></div>
        </div>

       

        <div class="col-md-4"></div>

<?php
			}
    if(isset($_POST['next']) === true) {
		$i=0;
        foreach ($new=$_POST['marks'] as $index => $val) {
			$n=$_POST['name'];
			$new=$_POST['marks'];
			$sql = "UPDATE student SET assignment_marks=assignment_marks+'$new[$i]',total_assignments=total_assignments+1 WHERE fullname = '$n[$i]'" ;
			$res = mysqli_query($con,$sql);
			$i++;
        }?>
		<div class="col-md-4">
		<br>
		<div class="alert alert-info">
		<strong><center>Recorded!</center></strong>
		</div>

	<?php
	}
        ?>

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
