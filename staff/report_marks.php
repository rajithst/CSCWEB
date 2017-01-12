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
        <li class="completed"><a href="generate_report.php">SELECT REPORTS</a></li>
        <li class="completed"><a href="select_course_marks.php">SELECT COURSE</a></li>
        <li class="active"><a href="">ATTENDANCE REPORT</a></li>

    </ul>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
	<script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js"></script>
						
	<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.addimage.js"></script>
	<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.standard_fonts_metrics.js"></script>
	<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.split_text_to_size.js"></script>
	<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.from_html.js"></script>
	<script type="text/javascript" src="js/basic.js"></script>
	<script type="text/javascript">
	$(function()
	{
								var doc = new jsPDF('p', 'pt');
								
								var specialElementHandlers = {
									'#editor': function (element, renderer) {
										return true;
									}
								};
								doc.setFontSize(30);
								$('#cmd').click(function () {
									doc.fromHTML($('#content').html(), 15, 15, {
										'width': 1500,
											'elementHandlers': specialElementHandlers
									});
									doc.save('income-report.pdf');
								});
								
	});	
	</script>
</head>

<body background="">

    <div class="container-fluid">

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
						<center><h2>Select the batch</h2></center>
						<div class="process">
							<div class="process-row">
						<div class="process-step">
							 <a href="report_marks.php?subid=<?php echo $subid?>&token=1">
							 <button type="submit" style="font-size:30px;" name="token" value="1" class="btn btn-info btn-circle" >01</button>
							 <p>batch 01</p> </a>
							</div>
						<div class="process-step">
							<a href="report_marks.php?subid=<?php echo $subid?>&token=2">
							<button type="submit" style="font-size:30px;" name="token" value="2" class="btn btn-info btn-circle">02</button>
							<p>batch 02</p> </a>
						</div>
						<div class="process-step">
							<a href="report_marks.php?subid=<?php echo $subid?>&token=3">
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

                <div id='content'>
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
                            <h3 class="box-title">Student Marks Report</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">


                            <table class='table table-bordered table-inverse'>
                                <tr>
                                    <th>Student Name</th>
									<th>Number of Assignments</th>
									<th>Assignment marks</th>
                                    <th>Exam Marks</th>
                                    
                                </tr>
                                <?php

                                while ($row= mysqli_fetch_assoc($res)) 
								{
									$percentage=$row['exam_marks'];
									if($percentage>=80 )
									{
									?>
									<tr style="background-color:#8ed191;" >
										
										<td><?php  echo  $row['fullname']; ?></td>
										<td><?php echo $row['total_assignments'];?></td>
										<td><?php echo $row['assignment_marks'];?></td>
										<td><?php echo $row['exam_marks'];?></td>
										

									</tr>
									<?php
									}
									else if(60<=$percentage)
									{?>
										<tr style="background-color:#fcd771;">
										
										<td><?php  echo  $row['fullname']; ?></td>
										<td><?php echo $row['total_assignments'];?></td>
										<td><?php echo $row['assignment_marks'];?></td>
										<td><?php echo $row['exam_marks'];?></td>
										

									</tr>
									<?php
									}
									else if($percentage<60)
									{?>
										<tr style="background-color:#fc8067;">
										
										<td><?php  echo  $row['fullname']; ?></td>
										<td><?php echo $row['total_assignments'];?></td>
										<td><?php echo $row['assignment_marks'];?></td>
										<td><?php echo $row['exam_marks'];?></td>
										

									</tr>
								
								
								<?php 
								}
								
							}
			}?>
                            </div>
							</table>
								
							<div id='editor'></div>
							<center>
							<button class='btn btn-primary' id ='cmd'><span class='glyphicon glyphicon-file' style='vertical-align:middle'></span> Download</button>
							</center>





                        </div>

                
            </section>
            </center>
			</div>
			</div>

<?php include "../components/page_tail.php";?>
