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


    <script>


        $(document).ready(function () 
		{
			$( function() 
			{
				$( "#datepick" ).datepicker();
			});
        });

    </script>

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>

    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
        <li class="active"><a href="">ADD EXPENSES </a></li>

    </ul>
    </br>

</head>

<body background="">

    <div class="container-fluid">
   
   <div class="row">
   <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-6 col-xs-12">
			   

            <center><h3>Add Expense information</h3></center>
            <br>
                <form class="form-horizontal" action="expense.php" method="post"  id="contact_form">


                        <div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Expense Type</label>
                            <div class="col-md-6 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select name="meth" class="form-control selectpicker" >
                                  
                                            <option value="Dnation">Donation</option>
                                            <option value="Advertising">Advertising</option>
                                            <option value="Other">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label" >Add a note</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                    <input name="desc" placeholder="Description" class="form-control"  type="text">
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Given To</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="g_to" placeholder="Given to" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>


                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Given By</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="g_by" placeholder="Given by" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Date</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input name="g_date" style="width:160px;" placeholder="" class="form-control" type="date" id="datepick" required>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Amount Rs</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                    <input name="amm" placeholder="Amount" class="form-control" type="number" required>
                                </div>
                            </div>
                        </div>
                        

                    <center><div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" name="submit">Add <span class="glyphicon glyphicon-send"></span> </button>
                                <button type="reset" class="btn btn-warning" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
                            </div>
                        </div>

                    </center>

                </form>
            </div>
            <div class="col-md-2"></div>
            </div>

                
                </div>


<?php include "../components/page_tail.php";?>

     