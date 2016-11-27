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

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="active"><a href="">SELECT REPORT</a></li>

    </ul>
</head>
<style>
    .ds-btn li{ list-style:none; float:left; padding:10px; }
.ds-btn li a span{padding-left:15px;padding-right:5px;width:200px;display:inline-block; text-align:left;}
.ds-btn li a span small{width:100%; display:inline-block; text-align:left;}

</style>
<body background="">

    <div class="container">
        <div class="row">

    

      <center><h2>Select report Type</h2></center>

     
        
    <ul class="ds-btn">

        <li>
             <a class="btn btn-lg btn-info" href="select_course_att.php">
          <i class="glyphicon glyphicon-user pull-left"></i><span>Student Attendance<br><small></small></span></a> 
            
        </li>

         <li>
             <a class="btn btn-lg btn-info" href="gen_income_type.php">
          <i class="glyphicon glyphicon-user pull-left"></i><span>Income<br><small></small></span></a> 
            
        </li>

         <li>
             <a class="btn btn-lg btn-info" href="expense_rep.php">
          <i class="glyphicon glyphicon-user pull-left"></i><span>Expense<br><small></small></span></a> 
            
        </li>

         <li>
             <a class="btn btn-lg btn-info" href="">
          <i class="glyphicon glyphicon-user pull-left"></i><span>Student Marks<br><small></small></span></a> 
            
        </li>
        
        
       
    </ul>
    




                

        </div>
    </div>




<?php include "../components/page_tail.php";?>
