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

$c_name=$_POST['course_name'];

$requesting_party=$_POST['req_party'];

$r_date=$_POST['rec_date'];
$received_date = date('Y-m-d', strtotime($r_date));

$received_by=$_POST['rec_by'];

$amount=$_POST['amm'];

$sql="INSERT INTO 
cus_course_income(course_name,requesting_party,received_date,received_by,amount)
values('$c_name','$requesting_party','$received_date','$received_by','$amount')";

if(mysqli_query($con,$sql))
{?>

	</head>
    <body>

    <?php include "comp/navbar.php"; ?>
	
	<ul class="breadcrum">
	<li class="completed"><a href="index.php">HOME</a></li>
	<li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
	<li class="completed"><a href="income_type.php">SELECT REPORT TYPE</a></li>
	<li class="completed"><a href="customized_courses_in.php">CUSTOMIZED COURSE INCOME</a></li>
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
	<li class="completed"><a href="customized_courses_in.php">CUSTOMIZED COURSE INCOME</a></li>
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