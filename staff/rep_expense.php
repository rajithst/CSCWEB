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
					<?php
								
								$s_date=$_POST['start_date'];

								$e_date=$_POST['end_date'];
								$total=0;

								$query = "SELECT * FROM expenses WHERE given_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table class='table table-bordered table-inverse'>"; // start a table tag in the HTML
								echo "<th>Expense type</th><th>Description</th><th>Given to</th><th>Given by</th><th>Given date</th><th>Amount</th>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['expense_type'] . "</td><td>" . $row['description'] . "</td><td>" . $row['give_to'] . "</td><td>" . $row['give_by'] . "</td><td>" . $row['given_date'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								$total+=$row['amount'];
								}
								echo"<tr><td colspan='5'>"."<strong><i>Total expenses during the period</i></strong>"."</td><td><strong><i>".$total."</i></strong></tr>";
								echo "</table>"; //Close the table in HTML

								mysqli_close($con); //Make sure to close out the database connection

			}
			?>
					
		
        </div>
	</div>


<?php include "../components/page_tail.php";?>