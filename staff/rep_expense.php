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


        $(document).ready(function () {

    
               $( function() {
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
									doc.save('expense-report.pdf');
								});
								
							});	
	</script>
    </head>
    <body>

    <?php include "comp/navbar.php"; ?>

    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="generate_report.php">SELECT REPORTS</a></li>
        <li class="completed"><a href="expense_rep.php">EXPENSES</a></li>
		

    
		
		<?php
		if(isset($_POST['exp']) === true)
			
			{?>
			<li class="active"><a href="">EXPENSE REPORT</a></li>
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
								Expense Report from <?php echo $s_date." to ".$e_date;?>
							</h2> </center>
						</div>
						<div class="panel-body">

						</div>
					<?php
								
								
								$total=0;

								$query = "SELECT * FROM expenses WHERE given_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table class='table'>"; // start a table tag in the HTML
								echo "<th>Expense type</th><th>Description</th><th>Given to</th><th style='min-width:55px'>Given by</th><th>Given date</th><th>Amount</th>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['expense_type'] . "</td><td>" . $row['description'] . "</td><td>" . $row['give_to'] . "</td><td>" . $row['give_by'] . "</td><td>" . $row['given_date'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								$total+=$row['amount'];
								}
								
								echo "</div>";
								echo "</table>"; //Close the table in HTML
								echo "<b><i><h2>Total Project income during the period : ".$total."</h2></i></b>";
								echo "<div id='editor'></div>";
								$s_date=0;

								$e_date=0;
								$total=0;

								mysqli_close($con); //Make sure to close out the database connection
								echo "<center>
									<button class='btn btn-primary' id ='cmd'><span class='glyphicon glyphicon-download-alt' style='vertical-align:middle'></span> Download</button>
									</center>";

			}
			?>
			</div>
					
		</div>
        </div>
	</div>


<?php include "../components/page_tail.php";?>