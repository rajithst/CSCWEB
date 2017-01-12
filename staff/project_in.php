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
			} );
        });
		$(document).ready(function () 
		{
			$( function() 
			{
				$( "#datepick2" ).datepicker();
			} );
        });

    </script>

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>

    <ul class="breadcrum">
	<li class="completed"><a href="index.php">HOME</a></li>
	<li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
	<li class="completed"><a href="income_type.php">SELECT REPORT TYPE</a></li>
	<li class="active"><a href="">PROJECT INCOME</a></li>
	

</ul>
    </br>

</head>

<body background="">

    <div class="container-fluid">
   
   <div class="row">
   <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-6 col-xs-12">
			   

            <center><h3>Add project income information</h3></center>
            <br>
                <form class="form-horizontal" action="income_project.php" method="post"  id="contact_form">

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label" >Project name</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <input name="pro_name" placeholder="Project name" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Client</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="client_name" placeholder="Client name" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>


                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Responsible party</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="res_party" placeholder="Who will lead the project" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Received Date</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input name="rec_date" style="width:160px;" placeholder="" class="form-control" type="date" id="datepick" required>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Due Date</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input name="due_date" style="width:160px;" placeholder="" class="form-control" type="date" id="datepick2" required>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Received by</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="rec_by" placeholder="Money received by" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Amount Rs</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                    <input name="amm" placeholder="Amount in rupees" class="form-control" type="number" required>
                                </div>
                            </div>
                        </div>
                        

                    <center><div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-info" name="submit">Add <span class="glyphicon glyphicon-send"></span> </button>
                                <button type="reset" class="btn btn-info" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
                            </div>
                        </div>

                    </center>

                </form>
            </div>
            <div class="col-md-2"></div>
            </div>

                <!-- 
                                    <form action="expense.php" method="post">
                
                    <label>Textbox for user name</label>
                         <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" id="" name=""></div>
                
                
                
                
                
                
                
                                    <table>
                                        <tr>
                                            <td><h4><b>Select expense type:-</b></h4></td>
                                            <td style="width:200px;">
                                                        <select style="width:200px;"class="form-control" id="selecting" name="meth">
                                                            <option value="Donations">Donations</option>
                                                            <option value="Advertising">Advertising</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                </td>
                                        </tr>
                                        <tr>
                                            <td><h4><b>Description :-</b></h4></td>
                                            <td><input name="desc" "type="text"required id="enter_details" class="form-control" style="width:400px;" placeholder="Describe the expense"></input></td>
                                        </tr>
                                        <tr>
                                            <td><h4><b>Given to :-</b></h4></td>
                                            <td><input name="g_to"type="text"required id="enter_details" class="form-control" style="width:400px;" placeholder="receiving party name"></input></td>
                                        </tr>
                                        <tr>
                                            <td><h4><b>Given by :-</b></h4></td>
                                            <td><input name="g_by" type="text"required id="enter_details" class="form-control" style="width:400px;" placeholder="Authorized by"></input></td>
                                        </tr>
                                        <tr>
                                            <td><h4><b>Date :-</b></h4></td>
                                            <td><input  name="g_date" type="date"required id="enter_details" ></input></td>
                                        </tr>
                                        <tr>
                                            <td><h4><b>Total amount:-</b></h4></td>
                                            <td><input name="amm" type="text"required id="enter_details" class="form-control"placeholder="Ammount"></input></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <center><button type="submit" class="btn btn-primary">Submit</button></center>
                                    </form> -->
                </div>


<?php include "../components/page_tail.php";?>

     