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

$p_name=$_POST['pro_name'];

$c_name=$_POST['client_name'];

$r_party=$_POST['res_party'];

$r_date=$_POST['rec_date'];

$d_date=$_POST['due_date'];

$r_by=$_POST['rec_by'];

$amount=$_POST['amm'];
/*
*/
$sql="INSERT INTO 
project_income(pro_name,client,responsible_party,received_date,due_date,received_by,amount)
values('$p_name','$c_name','$r_party','$r_date','$d_date','$r_by','$amount')";

if(mysqli_query($con,$sql))
{?>

	</head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
	<li class="completed"><a href="index.php">HOME</a></li>
	<li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
	<li class="completed"><a href="income_type.php">SELECT REPORT TYPE</a></li>
	<li class="completed"><a href="project_in.php">PROJECT INCOME</a></li>
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
	<li class="completed"><a href="project_in.php">PROJECT INCOME</a></li>
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