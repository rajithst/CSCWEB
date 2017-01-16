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

<style>


</style>

    <script>


        $(document).ready(function () 
		{
            $( function() 
			{
				$( "#datepick" ).datepicker();
			} );
        });

    </script>
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
	<script>
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
    <body>

    <?php include "comp/navbar.php"; ?>

    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="generate_report.php">SELECT REPORTS</a></li>
        <li class="completed"><a href="gen_income_type.php">INCOME</a></li>
		

    
		
		<?php
		if(isset($_POST['pro_in']) === true)
			
		
			{?>
			<li class="active"><a href="">PROJECT INCOME REPORT</a></li>
			</ul>
				</br>

			</head>

			<body background="">

				<div class="container-fluid">
			   
			   <div class="row">
			   <div class="col-md-2"></div>
					<div class="col-md-8 col-sm-6 col-xs-12">
						<div id='content'>
						<div class="panel panel-primary">
							<!-- Default panel contents -->
							<div class="panel-heading">
								<center><h2 class="panel-title">
								<?php
									$s_date=$_POST['start_date'];
									$e_date=$_POST['end_date'];
								?>
									Project Income Report from <?php echo $s_date." to ".$e_date;?>
								</h2> </center>
							</div>
						
							<div class="panel-body">

							</div>
					<?php
				
								$s_date=$_POST['start_date'];

								$e_date=$_POST['end_date'];
								$total=0;
								$con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
								$query = "SELECT * FROM project_income WHERE received_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table id='table1' class='table' width='120%' style='width:120%'>"; // start a table tag in the HTML
								echo '<tr><th style="min-width:50px">Project</th>';
								echo "<th style='min-width:45px'>Client</th>";
								echo "<th style='min-width:120px'>Responsible party</th>";
								echo "<th style='min-width:95px'>Received date</th>";
								echo "<th style='min-width:75px'>Due date</th>";
								echo "<th style='min-width:80px'>Received by</th>";
								echo "<th style='min-width:60px'>Amount</th></tr>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['pro_name'] . "</td><td>" . $row['client'] . "</td><td>" . $row['responsible_party'] . "</td><td>" . $row['received_date'] . "</td><td>" . $row['due_date'] . "</td><td>" . $row['received_by'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								$total+=$row['amount'];
								}
								
								echo "</div>";
								echo "</table>"; //Close the table in HTML
								echo "<b><i><h2>Total Project income during the period : ".$total."</h2></i></b>";
								echo "<div id='editor'></div>";
								$s_date=0;

								$e_date=0;

								mysqli_close($con); //Make sure to close out the database connection
								echo "<center>
									<button class='btn btn-primary' id ='cmd'><span class='glyphicon glyphicon-download-alt' style='vertical-align:middle'></span> Download</button>
									</center>";
								$total=0;

			}?>
			</div>
			
			
			<?php
			if(isset($_POST['cc_in']) === true)
			
			{?>
			<li class="active"><a href="">CUSTOMIZED COURSE INCOME REPORT</a></li>
			</ul>
				</br>

			</head>

			<body background="">

				<div class="container-fluid">
			   
			   <div class="row">
			   <div class="col-md-2"></div>
					<div class="col-md-8 col-sm-6 col-xs-12">
					<div id='content'>
					<div class="panel panel-primary">
							<!-- Default panel contents -->
							<div class="panel-heading">
								<center><h2 class="panel-title">
								<?php
									$s_date=$_POST['start_date'];
									$e_date=$_POST['end_date'];
								?>
									Customized Course Income Report from <?php echo $s_date." to ".$e_date;?>
								</h2> </center>
							</div>
						
							<div class="panel-body">

							</div>
					<?php
								$s_date=$_POST['start_date'];

								$e_date=$_POST['end_date'];
								$total=0;	
								
								$query = "SELECT * FROM cus_course_income WHERE received_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table class='table table-bordered table-inverse'>"; // start a table tag in the HTML
								echo "<th style='min-width:80px'>Course name</th><th>Requesting party</th><th>Received date</th><th>Received by</th><th>Amount</th>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['course_name'] . "</td><td>" . $row['requesting_party'] . "</td><td>" . $row['received_date'] . "</td><td>" . $row['received_by'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								$total+=$row['amount'];
								}
								echo "</div>";
								echo "</table>"; //Close the table in HTML
								echo "<b><i><h2>Total Project customized course income during the period : ".$total."</h2></i></b>";
								echo "<div id='editor'></div>";
								
								
								$s_date=0;

								$e_date=0;
								mysqli_close($con); //Make sure to close out the database connection
								echo "<center>
									<button class='btn btn-primary' id ='cmd'><span class='glyphicon glyphicon-download-alt' style='vertical-align:middle'></span> Download</button>
									</center>";
								$total=0;
			}?>
			</div>
			
			<?php
			
			if(isset($_POST['other_in']) === true)
			
			{?>
			<li class="active"><a href="">OTHER INCOME REPORT</a></li>
			</ul>
				</br>

			</head>

			<body background="">

				<div class="container-fluid">
			   
			   <div class="row">
			   <div class="col-md-2"></div>
					<div class="col-md-8 col-sm-6 col-xs-12">
					<div id='content'>
					<div class="panel panel-primary">
							<!-- Default panel contents -->
							<div class="panel-heading">
								<center><h2 class="panel-title">
								<?php
									$s_date=$_POST['start_date'];
									$e_date=$_POST['end_date'];
								?>
									Other Income Report from <?php echo $s_date." to ".$e_date;?>
								</h2> </center>
							</div>
						
							<div class="panel-body">

							</div>
					<?php
								$s_date=$_POST['start_date'];

								$e_date=$_POST['end_date'];
								$total=0;

								$query = "SELECT * FROM other_income WHERE received_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table class='table table-bordered table-inverse'>"; // start a table tag in the HTML
								echo "<th>Description</th><th>Received from</th><th>Redeived by</th><th>Received date</th><th>Amount</th>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								$total+=$row['amount'];
								echo "<tr><td>" . $row['description'] . "</td><td>" . $row['received_from'] . "</td><td>" . $row['received_by'] . "</td><td>" . $row['received_date'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								}
								echo "</div>";
								echo "</table>"; //Close the table in HTML
								echo "<b><i><h2>Total Project other income during the period : ".$total."</h2></i></b>";
								echo "<div id='editor'></div>";
								
								
								$s_date=0;

								$e_date=0;
								
								mysqli_close($con); //Make sure to close out the database connection
								echo "<center>
									<button class='btn btn-primary' id ='cmd'><span class='glyphicon glyphicon-download-alt' style='vertical-align:middle'></span> Download</button>
									</center>";
								$total=0;


			}
			?>
			</div>
			

            
        </div>
	</div>
<script>
var data = {
    labels: [
        "Red",
        "Blue",
        "Yellow"
    ],
    datasets: [
        {
            data: [300, 50, 100],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ]
        }]
};
var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,
    options: options
});
</script>
<?php include "../components/page_tail.php";?>

     