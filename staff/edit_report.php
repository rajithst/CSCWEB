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
include '../components/page_head.php';

include "comp/navbar.php"; ?>
<ul class="breadcrum">
    <li class="completed"><a href="index.php">HOME</a></li>
    <li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
    <li class=""><a href="select_course.php">ATTENDANCE</a></li>
    <li class=""><a href="income_type.php">INCOME</a></li>
    <li class=""><a href="expense_type.php">EXPENSES</a></li>
    <li class=""><a href="select_course_marks.php">STUNDENT MARKS</a></li>


</ul>
    </br>

</head>



<body background="">

        <div class="container">

            <center><h2>Input Data</h2></center>
            <br><br>
            <?php include "comp/uppermenu.php"; ?>
        </div>



<?php include "../components/page_tail.php";?>
