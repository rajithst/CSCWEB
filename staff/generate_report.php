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
<div class="nabbar clearfix" id="path">
        <ol class="breadcrumb">
            <li><a href="Home.html">Home</a>
            <span class="glyphicon glyphicon-triangle-right"></span></li>
            <li><a href="edit_report.php"> Generate Repors</a>
            
        </ol>
    </div>
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
             <a class="btn btn-lg btn-info" href="">
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
    




                <!-- <div class="well"  >
                                <u><b><h4>Generate reports</h4></b></u>                
                                    <li>
                                    <a href=""  style="color:white;font-size:17px;">
                                    <button type="button"  class="btn btn-primary btn-lg gradient"  style="width:200px">
                                    Attendance
                                    </button>
                                    </a>
                                    </li>
                                    <br>
                                    <li>
                                    <a href="gen_income_type.php"  style="color:white;font-size:17px;">
                                    <button type="button" class="btn btn-primary btn-lg gradient"  style="width:200px">
                                    Income
                                    </button>
                                    </a>
                                    </li>
                                    <br>
                                    <li>
                                    <a href="expense_rep.php"  style="color:white;font-size:17px;">
                                    <button type="button" class="btn btn-primary btn-lg gradient"  style="width:200px">
                                    Expense
                                    </button>
                                    </a>
                                    </li>
                                    <br>
                                    <li>
                                    <a href=""  style="color:white;font-size:17px;">
                                    <button type="button"  class="btn btn-primary btn-lg gradient"  style="width:200px">
                                    Student marks
                                    </button>
                                    </a>
                                    </li>
                </div> -->
            

        </div>
    </div>




<?php include "../components/page_tail.php";?>
