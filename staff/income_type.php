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

    <!--<div class="container-fluid">

        <div class="col-sm-9 col-md-9">


        </div>


        <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="well">
					<span class="badge" style="font-size:40px">Select report type</span><br>
					<hr>
					<ul>
					<a href="project_in.php"  style="color:white;font-size:15px;">
					<button type="button" href="attendance_rep.php" class="btn btn-primary btn-lg gradient"  style="width:250px">
					Project income
					</button>
					</a>
					</ul>
					<ul>
					<a href="customized_courses_in.php"  style="color:white;font-size:15px;">
					<button type="button" href="income_rep.php" class="btn btn-primary btn-lg gradient"  style="width:250px">
					Costomized course income
					</button>
					</a>
					</ul>
					<ul>
					<a href="other_in.php"  style="color:white;font-size:15px;">
					<button type="button" href="expense_rep.php" class="btn btn-primary btn-lg gradient"  style="width:250px">
					Other
					</button>
					</a>
					</ul>
					
                </div>
        </div>
    </div>
    <br>
    <br>
    </div>
    </div>
    </div>
    </div>-->
	<div class="container">

            <center><h2>Select income type</h2></center>
            <br><br>
            <?php include "incomeA.php"; ?>
    </div>





<?php include "../components/page_tail.php";?>
