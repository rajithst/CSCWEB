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
	
    <link type="text/css" href="bt/css/bootstrap-timepicker.min.css" />
        
    <script type="text/javascript" src="bt/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () 
		{
			
			$( function() 
			{
				$( "#datepick" ).datepicker();
				
			} );
			
        });
		
	
		
				
		
	</script>
	
	
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
												 <a href="attendance.php?subid='.$subid.'&token='.$i.'">
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
		
        <div class="col-md-4">
			<center>
			<h3><b><u>Input Lecture Details</u></b></h3>
			</center>
			<br>
			
			<hr>
			<form action="" method="post" onSubmit="if(!confirm('Do you want to submit these data?')){return false;}else{return true;}">
			<table>
					<tr>
						<td  width="38%"><h4><b><span style="color:red;font-size:25px;">*</span>Date :</b></h4></td>
						<td colspan="3">
								<div class="input-group">
									<input  class="form-control" type="date" required id="datepick" name="date" >
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
						</td>
						
					</tr>
					<tr>
						<td  width="38%"><h4><b><span style="color:red;font-size:25px;">*</span>Hall :</b></h4></td>
						<td colspan="3">
							
								<select class="form-control" id="selecting" name="hall">
											<option value="W001">W001</option>
											<option value="W002">W002</option>
											<option value="LAB A">LAB A</option>
											<option value="LAB B">LAB B</option>
											<option value="LAB C">LAB C</option>
											<option value="IRQUE">IRQUE</option>
											<option value="Mini auditorium">Mini auditorium</option>
											<option value="4th floor">4th floor</option>
											<option value="Other">Other</option>
								</select>
							
						</td>
					</tr>
					
					<tr>
						<td  width="38%"><h4><b><span style="color:red;font-size:25px;">*</span>Time(From)</b></h4></td>
						<td>
							<div class="input-group bootstrap-timepicker timepicker">
								<input id="timepicker1" type="text" class="form-control input-small" name="f_time">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
							 
							<script type="text/javascript">
								$('#timepicker1').timepicker({ 'step': 30 });
							</script>
											
						</td>
						<td width="5%"><center><h4><b>To</b></h4></center></td>
						<td>
							
							<div class="input-group bootstrap-timepicker timepicker">
								<input id="timepicker2" type="text" class="form-control input-small" name="t_time">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
							 
							<script type="text/javascript">
								$('#timepicker2').timepicker({ 'step': 30 });
							</script>
												
						</td>
					</tr>
					<tr>
						<td  width="38%"><h4><b><span style="color:red;font-size:25px;">*</span>Lecturer name :</b></h4></td>
						<td colspan="3">
								<div class="input-group">
									<input placeholder="name of the lecturer" class="form-control" required type="text" name="l_name" >
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								</div>
						</td>
					</tr>
					<tr>
						<td  width="38%"><h4><b>Instructor name :</b></h4></td>
						<td colspan="3">
								<div class="input-group">
									<input placeholder="name of the instructor" class="form-control" type="text" name="i_name" >
									<span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span>
								</div>
						</td>
					</tr>
					
				</table>
			
		</div>
		
        <div class="col-md-8 col-sm-8 col-xs-12" style="padding-left: 10%">
				<?php
					$subid = $_GET['subid'];
					$res = getstudents($con,$subid,$token);
					$subdata = getsubdata($con,$subid);
				?>
        <!--<center>-->
        <section class="content-header">
		
                
                <div class="col-md-10">
					
					<center>
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
                                    <th>Student NIC</th>
                                    <th>Student Name</th>
                                    <th>mark Attendance</th>
                                    
                                </tr>
                                <?php


                                while ($row= mysqli_fetch_assoc($res)) {

                                ?>
                                <tr>
                                    <td><?php  echo  $row['nic']; ?></td>
                                    <td><?php  echo  $row['name_w_initials']; ?></td>
									
                                    <td>
										<center>
											<input type="hidden" id="attendance[]" name="attendance[]"  value="<?php echo $row['name_w_initials']; ?>">
											<input type="checkbox" checked id="attendance[]" name="attendance[]" value="<?php  echo  $row['fullname']; ?>">
										</center>
									</td>
                                    

                                </tr>

                                    <?php } ?>
                            </table>





                        </div>

                    </div>

                        <button type="submit" class="btn btn-block btn-success btn-md" name="next"><b>Submit </b><span class="glyphicon glyphicon-ok"></span></button>
                            
                        </div>
                </form>
				</center>
            </section>
            <!--</center>-->
        </div>
            <div class="col-md-2"></div>
        </div>

        
	<div class="col-md-6"></div>
       
		



<?php
    if(isset($_POST['next']) === true) 
	{
		$odate=$_POST['date'];
		$hall=$_POST['hall'];
		$t_time=$_POST['t_time'];
		$f_time=$_POST['f_time'];
		$l_name=$_POST['l_name'];
		$i_name=$_POST['i_name'];
		$date = date('Y-m-d', strtotime($odate));
		$sqlf="INSERT INTO lecture_details(subject_id,date,hall,time_from,time_to,lecturer_name,instructor_name) VALUES('$subid','$date','$hall','$f_time','$t_time','$l_name','$i_name')";
		mysqli_query($con,$sqlf);
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
		<div>

        

        <?php


    } ?>

        </div>

        </div>

			</div>
			<?php
			}
			?>






<?php include "../components/page_tail.php";?>
