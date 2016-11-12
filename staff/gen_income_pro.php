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
					<h2><u>Registration Form</u></h2>
							<?php
								
								$s_date=$_POST['start_date'];

								$e_date=$_POST['end_date'];
								$con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
								$query = "SELECT * FROM project_income WHERE received_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table>"; // start a table tag in the HTML
								echo "<tr><td>Project name</td><td>Client name</td><td>Responsible party</td><td>Received date</td><td>Due date</td><td>Received by</td><td>Amount</td></tr>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['pro_name'] . "</td><td>" . $row['client'] . "</td><td>" . $row['responsible_party'] . "</td><td>" . $row['received_date'] . "</td><td>" . $row['due_date'] . "</td><td>" . $row['received_by'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								}

								echo "</table>"; //Close the table in HTML

								mysqli_close($con); //Make sure to close out the database connection

								?>
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
	<style>
	table,tr,td
	{
		border: 1px solid black;
		
	}
	td
	{
		width:100px;
		
	}
	</style>

<?php include "../components/page_tail.php";?>
