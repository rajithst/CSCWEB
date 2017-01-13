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

    <?php include "comp/navbar.php"; ?>

<ul class="breadcrum">
	<li class="completed"><a href="index.php">HOME</a></li>
	<li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
	<li class="active"><a href="">SELECT REPORT TYPE</a></li>
	

</ul>
    </br>

</head>

<body background="">

	<div class="container">

            <center><h2>Select income type</h2></center>
            <br><br>
            <?php include "incomeA.php"; ?>
    </div>





<?php include "../components/page_tail.php";?>
