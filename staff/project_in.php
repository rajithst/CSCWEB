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

            $('#mycalendar').monthly({
                mode: 'event',
                //jsonUrl: 'events.json',
                //dataType: 'json'
                xmlUrl: 'events.xml'
            });
        });
    </script>

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>

    </br>

</head>

<body background="">

    <div class="container-fluid">
        <div class="sidenav col-md-2 col-sm-3 col-xs-12">
            <center><h3> Event Calender</h3></center>
            <div class="monthly" id="mycalendar"></div>

        </div>



        <div class="col-sm-9 col-md-9">


        </div>


        <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="well"  >
					<u><h2>PROJECT INCOME</h2></u>	
					<form action="income_project.php"method="post">
                    <table>
						<tr>
							<td><h4><b>Project name :-</b></h4></td>
							<td><input name="pro_name" type="text"required id="enter_details" class="form-control" style="width:400px;" placeholder="name of the project"></input></td>
						</tr>
						<tr>
							<td><h4><b>Client :-</b></h4></td>
							<td><input name="client_name" type="text"required id="enter_details" class="form-control" style="width:400px;" placeholder="name of client"></input></td>
						</tr>
						<tr>
							<td><h4><b>Responsible party :-</b></h4></td>
							<td><input name="res_party"type="text"required id="enter_details" class="form-control" style="width:400px;" placeholder="responsible person of the project"></input></td>
						</tr>
						<tr>
							<td><h4><b>Received Date :-</b></h4></td>
							<td><input type="date"required id="enter_details" name="rec_date" ></input></td>
						</tr>
						<tr>
							<td><h4><b>Due date:-</b></h4></td>
							<td><input type="date"required id="enter_details" name="due_date"></input></td>
						</tr>
						<tr>
							<td><h4><b>Received by:-</b></h4></td>
							<td><input name="rec_by" type="text"required id="enter_details" style="width:400px;" class="form-control" placeholder="who received the ammount"></input></td>
						</tr>
						<tr>
							<td><h4><b>Total income:-</b></h4></td>
							<td><input name="amm" type="text"required id="enter_details" class="form-control" placeholder="ammount"></input></td>
						</tr>
						
					</table>
					<br>
					<center><button type="submit" class="btn btn-primary">Submit</button></center>
					</form>
                </div>
            

        </div>

        <div class="col-md-2 col-sm-3 col-xs-12">
            <div class="profile-sidebar">

                <div class="profile-userpic">
                    <img src="<?php echo $staff_data['profile']; ?>" class="img-responsive" alt="">
                </div>

                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo $staff_data['role']; ?>
                    </div>
                </div>

                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Profile</button>
                    <button type="button" class="btn btn-danger btn-sm">Sign Out</button>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="index.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Home </a>
                        </li>
                        <li>
                            <a href="profile.php">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>


    </div>
    <br>
    <br>
    </div>
    </div>
    </div>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <div class="container-fluid well span6">
                <div class="row">
                    <div class="col-md-4" >
                        <img src="<?php echo $staff_data['profile']; ?>" class="img-circle">
                    </div>

                    <div class="col-md-8" >
                        <h3><?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?></h3>
                        <h5><?php echo $staff_data['email']; ?></h5>
                        <h5><?php echo $staff_data['role']; ?></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>



<?php include "../components/page_tail.php";?>
