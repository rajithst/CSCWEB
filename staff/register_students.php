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
							<form action="student_Registration.php" method="post">
							<table style="width:150%">
							<tr>
								<td >
								</td>
								<td 
								</td>
							</tr>
							<tr>
								<td>
									<h4>Subject name :<span style="color:red;font-size:25px;">*</span></h4>
								</td>
								<td >
									<?php 
										$ncid=$_POST['cid'];
										?>
									<select id="selecting" name="course_name" style="width:600px;">
									
									<?php

										$sql = "SELECT subject,subjectid FROM subjects WHERE courseid = '$ncid'";
										$query = mysqli_query($con, $sql);			
										while ($row = mysqli_fetch_assoc($query)){
											$subid = $row['subjectid'];
											?>
											
												<option value="<?php echo $row['subject']; ?>"> <?php echo $row['subject']; ?></option>
											
											
										<?php } ?>
										</select>
								</td>	
							  </tr>
							  <tr>
								<td><h4><b>1)Name</b></h4></td>
								<td>  </td>
							  </tr>
							  
							  <tr>
								<td><h4>Title</h4></td>
								<td>
									<select id="selecting" name="title">
										
										<option value="Mr">Mr.</option>
										<option value="Mrs">Mrs.</option>
										<option value="Miss">Miss.</option>
										<option value="Rev">Rev.</option>
										<option value="Other">Other</option>
									
									</select>
								</td>
								
							  </tr>
							  <tr>
								<td><h4>Name in full :<span style="color:red;font-size:20px;">*</span></h4></td>
								<td>
								<input type="text"required id="enter_details" class="form-control" name="full_name" style="width:600px;"> 
								</input>
								</td>
							  </tr>
							  <tr>
								<td><h4>Name with initials :<span style="color:red;font-size:20px;">*</span></h4></td>
								<td><input type="text" required id="enter_details" name="full_name_with_initials"class="form-control" style="width:600px;"></input>
								</td>
							  </tr>
							  <tr>
								<td></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4><b>2)Date of Birth <span style="color:red;font-size:20px;">*</span></b></h4></td>
								<td><input type="date"required id="enter_details" name="DOB" ></input>
								</td>
							  </tr>
							  <tr>
								<td><h4><b>3)Gender<span style="color:red;font-size:25px;">*</span></b></h4></td>
								<td>
									<div class="radio">
										<label><input required type="radio" name="optradio" value="Male" >Male</label>
										<label><input required type="radio" name="optradio" value="Female">Female</label>
										
									</div>
								</td>
							  </tr>
							  <tr>
								<td><h4><b>4)National Identity Card Number<span style="color:red;font-size:25px;">*</span></b></h4></td>
								<td><input type="text"required id="fill_area" class="form-control" name="NIC" style="width:600px;"></input>
								</td>
							  </tr>
							  <tr>
								<td><h4><b>5)Permanent residence</b></h4></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4>Address:<span style="color:red;font-size:25px;">*</span></h4></td>
								<td><input type="text" required id="enter_details" class="form-control" name="home_addr" style="width:600px;"></input>
								</td>
							  </tr>
							  <tr>
								<td><h4>Telephone:</h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="home_tel" style="width:600px;"></input></td>
							  </tr>
							  <tr>
								<td><h4>Mobile:</h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="mobile" style="width:600px;"></input></td>
							  </tr>
							  <tr>
								<td><h4>Email:</h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="personel_email" style="width:600px;"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>6)Work place</b></h4></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4>Address:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_addr" style="width:600px;"></input></td>
							  </tr>
							  <tr>
								<td><h4>Telephone:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_tel" style="width:600px;"></input></td>
							  </tr>
							  <tr>
								<td><h4>Email:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_email" style="width:600px;"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>7)Work place & Designation</b></h4></td>
								<td style="width:1000px;"><input type="text" class="form-control"  id="fill_area" name="work_pl_&_desig" style="width:600px;"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>8)Vehicle Number</b>(if any)</h4></td>
								<td><input type="text" class="form-control"  id="fill_area" name="veh_num" style="width:600px;"></input></td>
							  </tr>
							  </table>
							  <table>
							  <tr>
								<td style="width:800px;"><h4><b>9)How did you get to know about the UCSC short term training courses?</b></h4></td>
								<td style="width:300px;">
										<select style="width:200px;"class="form-control" id="selecting" name="method">
											<option value="Newspaper Advertisment">Newspaper Advertisment</option>
											<option value="Email Marketing">Email Marketing</option>
											<option value="Past student">Past student</option>
											<option value="Facebook">Facebook</option>
											<option value="Search Engine">Search Engine</option>
											<option value="Television">Television</option>
											<option value="Website,Banners,Links,Postings">Website,Banners,Links,Postings</option>
											<option value="Other">Other</option>
										</select>
								</td>
							  </tr>
							  <tr>
							  <td style="width:200px;"><input type="text" class="form-control"  id="fill_area" name="other_des" style="width:600px;" placeholder="if other please describe"></input>
							  </tr>
							  </table>
							 <hr>
							 <h2><u>Payments details</u></h2>
							<table style="width:100%">
							 						 
							  <tr>
								<td><h4>Payment Method</h4></td>
								<td>
									<select class="form-control" id="selecting" name="pay_method" required>
										<option value="Cash">Cash</option>
										<option value="Cheque">Cheque</option>
										<option value="Other">Other</option>
									</select>
									
								</td>
							  </tr>
							  <tr>
								<td><h4>Ammount:<span style="color:red;font-size:25px;">*</span></h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="amm" required></input></td>
							  </tr>
							  <tr>
								<td><h4>Date Received <span style="color:red;font-size:25px;">*</span></h4></td>
								<td><input type="date"  id="fill_area" name="rec_date" required></input></td>
							  </tr>
							  <tr>
								<td><h4>Received person:<span style="color:red;font-size:25px;">*</span></h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="person_received"required></input></td>
							  </tr>
							  <tr>
								<td><h4>Reference number:<span style="color:red;font-size:25px;">*</span></h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="ref"required></input></td>
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
