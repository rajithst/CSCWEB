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
					<?php
				
								$s_date=$_POST['start_date'];

								$e_date=$_POST['end_date'];
								$total=0;
								$con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
								$query = "SELECT * FROM project_income WHERE received_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table class='table table-bordered table-inverse'>"; // start a table tag in the HTML
								echo "<th>Project name</th><th>Client name</th><th>Responsible party</th><th>Received date</th><th>Due date</th><th>Received by</th><th>Amount</th>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['pro_name'] . "</td><td>" . $row['client'] . "</td><td>" . $row['responsible_party'] . "</td><td>" . $row['received_date'] . "</td><td>" . $row['due_date'] . "</td><td>" . $row['received_by'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								$total+=$row['amount'];
								}
								echo"<tr><td colspan='6'>"."<strong><i>Total income during the period</i></strong>"."</td><td><strong><i>".$total."</i></strong></tr>";
								echo "</table>"; //Close the table in HTML

								mysqli_close($con); //Make sure to close out the database connection

			}
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
					<?php
								$s_date=$_POST['start_date'];

								$e_date=$_POST['end_date'];
								$total=0;	
								
								$query = "SELECT * FROM cus_course_income WHERE received_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table class='table table-bordered table-inverse'>"; // start a table tag in the HTML
								echo "<th>Course name</th><th>Requesting party</th><th>Received date</th><th>Received by</th><th>Amount</th>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['course_name'] . "</td><td>" . $row['requesting_party'] . "</td><td>" . $row['received_date'] . "</td><td>" . $row['received_by'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								$total+=$row['amount'];
								}
								echo"<tr><td colspan='4'>"."<strong><i>Total income during the period</i></strong>"."</td><td><strong><i>".$total."</i></strong></tr>";
								echo "</table>"; //Close the table in HTML

								mysqli_close($con); //Make sure to close out the database connection

			}
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
								echo"<tr><td colspan='4'>"."<strong><i>Total income during the period</i></strong>"."</td><td>".$total."</tr>";

								echo "</table>"; //Close the table in HTML
								

								mysqli_close($con); //Make sure to close out the database connection


			}
			?>
			   

            
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

     