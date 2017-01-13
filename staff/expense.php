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

$type=$_POST['meth'];

$description=$_POST['desc'];

$given_to=$_POST['g_to'];

$given_by=$_POST['g_by'];

$g_date=$_POST['g_date'];
$given_date = date('Y-m-d', strtotime($g_date));

$amount=$_POST['amm'];

$sql="INSERT INTO 
expenses(expense_type,description,give_to,give_by,given_date,amount)
values('$type','$description','$given_to','$given_by','$given_date','$amount')";

if(mysqli_query($con,$sql))
{?>

	</head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
        <li class="completed"><a href="expense_type,php">ADD EXPENSES </a></li>
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
        <li class="completed"><a href="expense_type,php">ADD EXPENSES </a></li>
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