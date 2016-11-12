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


        $(document).ready(function () {

    
               $( function() {
    $( "#datepick" ).datepicker();
  } );
        });

    </script>

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>

<div class="nabbar clearfix" id="path">
        <ol class="breadcrumb">
            <li><a href="Home.html">Home</a>
            <span class="glyphicon glyphicon-triangle-right"></span></li>
            <li><a href="edit_report.php"> Select Type</a>
            <span class="glyphicon glyphicon-triangle-right"></span></li>
            <li><a href="">Expenses</a>
            <span class="glyphicon glyphicon-triangle-right"></span></li>
            <li class="active">Add expenses</li>
        </ol>
    </div>
    </br>

</head>

<body background="">

    <div class="container-fluid">
   
   <div class="row">
   <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-6 col-xs-12">
			   

            <center><h3>Add Expense information</h3></center>
            <br>
                <form class="form-horizontal" action=" " method="post"  id="contact_form">


                        <div class="form-group">
                            <label class="col-md-4 control-label">Expense Type</label>
                            <div class="col-md-6 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select name="subject" class="form-control selectpicker" >
                                        <option value=" " >Please select subject</option>

                                            <option value="">Donation</option>
                                            <option value="">Advertising</option>
                                            <option value="">Others</option>
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
                                    <input name="last_name" placeholder="Last Name" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Given To</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="text" placeholder="E-Mail Address" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>


                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Given By</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="phone" placeholder="" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Date</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input name="phone" placeholder="" class="form-control" type="date" id="datepick" required>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Amount Rs</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                    <input name="phone" placeholder="" class="form-control" type="number" required>
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

     