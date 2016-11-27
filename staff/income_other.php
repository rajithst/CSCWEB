<?php
session_start();
	require '../core/base.php';

	if(logged_in() === false){

		session_destroy();
		
		exit();

	}
	require '../core/init.php';
	require '../core/function/staff.php';
	include '../components/page_head.php'; 

$description=$_POST['desc'];

$received_from=$_POST['rec_from'];

$received_by=$_POST['rec_by'];

$received_date=$_POST['rec_date'];

$amount=$_POST['amm'];

$sql="INSERT INTO 
other_income(description,received_from,received_by,received_date,amount)
values('$description','$received_from','$received_by','$received_date','$amount')";

if(mysqli_query($con,$sql))
{?>

	</head>
    <body>

    <?php include "comp/navbar.php"; ?>
	
	<ul class="breadcrum">
	<li class="completed"><a href="index.php">HOME</a></li>
	<li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
	<li class="completed"><a href="income_type.php">SELECT REPORT TYPE</a></li>
	<li class="completed"><a href="other_in.php">OTHER INCOME</a></li>
	<li class="active"><a href="">RECORDED</a></li>
	

</ul>
    </br>
	
        <div class="alert alert-info">
            <strong><center>Recorded!</center></strong>
        </div>
	</body>
	<?php include "../components/page_tail.php";?>
	<?php
}
else
	//
{?>
	</head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
	<li class="completed"><a href="index.php">HOME</a></li>
	<li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
	<li class="completed"><a href="income_type.php">SELECT REPORT TYPE</a></li>
	<li class="completed"><a href="other_in.php">OTHER INCOME</a></li>
	<li class="active"><a href="">NOT RECORDED</a></li>
	

</ul>
    </br>
	
        <div class="alert alert-info">
            <strong><center>Not Recorded!</center></strong>
        </div>
	</body>
	<?php include "../components/page_tail.php";?>
	<?php
}

?>