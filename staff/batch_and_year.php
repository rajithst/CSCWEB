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
        <li class="completed"><a href="select_co.php">SELECT COURSE</a></li>
        <li class="active"><a href="">COURSE INCOME REPORT</a></li>

    </ul>

</head>

<body background="">

    <div class="container-fluid">

        <div class="row">
		<?php
			$subid = $_GET['subid'];
		?>
        <div class="row">
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
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
						<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
						<script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js"></script>
						
						<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.addimage.js"></script>
						<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.standard_fonts_metrics.js"></script>
						<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.split_text_to_size.js"></script>
						<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.from_html.js"></script>
						
						
						<script>
							$(function()
							{
								var doc = new jsPDF('p', 'pt');
								var specialElementHandlers = {
									'#editor': function (element, renderer) {
										return true;
									}
								};

								$('#cmd').click(function () {
									doc.fromHTML($('#content').html(), 15, 15, {
										'width': 1000,
											'elementHandlers': specialElementHandlers
									});
									doc.save('Course-income.pdf');
								});
								
							});
							
						</script>
						
							<div class="col-md-2"></div>
								<div class="col-md-8 col-sm-8 col-xs-12" style="padding-left: 10%">
										<?php
											$subid = $_GET['subid'];
											
											$subdata = getsubdata($con,$subid);
										?>
								<center>
								<section class="content-header">

								
								<div class="col-md-10">

								   <h4><b>Subject : <?php echo $subdata[2]; ?></b></h4>
								   <form action="" method="post">
								   <table>
								   <tr style="height:25px"><td><b>Subject id : </b></td><td><?php echo $subid?></td></tr>
								
									<tr style="height:25px"><td><b> Course Id : </b></td><td><?php echo $subdata[1];?></td></tr>
									
									<tr style="height:25px"><td><b> Enter year : </b></td><td><input required placeholder="Enter the year" name="year" type="text"></td></tr>
								
									<tr style="height:40px"><td><b> Enter batch number : </b></td><td><input required placeholder="batch number" name="batch" type="text"></td></tr>
									
								</table>
								<center><button type="submit" name="next" class="btn btn-success"><span class='glyphicon glyphicon-send' style='vertical-align:middle'></span> Create Report</button></center>
								</form>
								<hr>
						
					<?php
					if(isset($_POST['next']) === true)
					{
						
						$b=$_POST['batch'];
						$y=$_POST['year'];
						
						$sql="SELECT nic,coursename,name_w_initials FROM student WHERE batch=$b";
						$result=mysqli_query($con,$sql);
						echo "<div id='content'>";
						echo "<div class='panel panel-primary'>
								<div class='panel-heading'>
									<center>
									<h2 class='panel-title'>
										Course Income Report of $subid for $y(batch $b)
									</h2> 
									</center>
								</div>
							</div>";
						
						echo "<table class='table'>";
						
						echo "<tr class='success'><th><b>Student Name</b></th>";
						echo "<th><b>Student NIC</b></th>";
						echo "<th><b>Received Date</b></th>";
						echo "<th><b>Amount</b></th></tr>";
						$total=0;
						while ($row= mysqli_fetch_assoc($result)) 
						{
							if($row['coursename']==$subid)
							{
								$sql2="SELECT student_NIC,received_date,amount FROM course_income";
								$result2=mysqli_query($con,$sql2);
								while ($row2= mysqli_fetch_assoc($result2)) 
								{
									if((date('Y',strtotime($row2['received_date']))==$y)&&($row2['student_NIC']==$row['nic']))
									{
										
										$a=$row['name_w_initials'];
										$b=$row2['student_NIC'];
										$c=$row2['received_date'];
										$d=$row2['amount'];
										echo "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td></tr>";
										$total=$total+$d;
										
									}
								}
							}
						}
						
						echo "</div>";
						echo "</table>";
						
						echo "<b><i><h2>Total income during the year : ".$total."</h2></i></b>";
						
						echo "<div id='editor'></div>";
						echo "<button class='btn btn-primary' id ='cmd'><span class='glyphicon glyphicon-download-alt' style='vertical-align:middle'></span> Download</button>";
						$total=0;
						mysqli_close($con);
										
						
					}
					?>
                        </div>

                
            </section>
            </center>
			</div>
			</div>

<?php include "../components/page_tail.php";?>
