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
    </script>

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="select_course_reg.php">SELECT COURSE</a></li>
        <li class="active"><a href="">REGISTRATION</a></li>
        

    </ul>
    </br>

</head>

<body background="">
					<div style="margin-left:50px;">
					<span class="badge" style="font-size:40px;">Registration Form</span>
					</div>
							<form action="student_Registration.php" method="post" onSubmit="if(!confirm('Do you want to submit these data?')){return false;}else{return true;}">
							<table style="width:90%;margin-left:50px;">
							<tr>
								<td >
								</td>
								<td> 
								</td>
							</tr>
							<tr>
								<td>
									<h4>Subject name :<span style="color:red;font-size:20px;">*</span></h4>
								</td>
								<td >
									<?php 
										$ncid=$_POST['cid'];
										?>
									<select class="form-control" id="selecting" name="subject_name" style="width:600px;background-color: #d1f5e8;">
									
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
									<select class="form-control" style="width:10%;background-color: #d1f5e8;" id="selecting" name="title">
										
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
								<input type="text"required id="enter_details" class="form-control" name="full_name" style="width:600px;background-color: #d1f5e8;" placeholder="Enter full name"> 
								
								</input>
								</td>
							  </tr>
							  <tr>
								<td><h4>Name with initials :<span style="color:red;font-size:20px;">*</span></h4></td>
								<td><input type="text" required id="enter_details" name="full_name_with_initials"class="form-control" style="width:600px;background-color: #d1f5e8;" placeholder="Enter name with initials"></input>
								</td>
							  </tr>
							  <tr>
								<td></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4><b>2)Date of Birth </b><span style="color:red;font-size:20px;">*</span></h4></td>
								<td>
									<input class="form-control" placeholder="Birthday" style="width:20%;background-color: #d1f5e8;" type="date" required id="datepick" name="DOB" >
								</td>
							  </tr>
							  <tr>
								<td><h4><b>3)Gender </b><span style="color:red;font-size:20px;">*</span></h4></td>
								<td>
									<div class="radio">
										<label><input required type="radio" name="optradio" value="Male" >Male</label>
										<label><input required type="radio" name="optradio" value="Female">Female</label>
										
									</div>
								</td>
							  </tr>
							  <tr>
								<td><h4><b>4)NIC Number</b><span style="color:red;font-size:20px;">*</span></h4></td>
								<td><input type="text"required id="fill_area" class="form-control" name="NIC" style="width:600px;background-color: #d1f5e8;" placeholder="Enter National Identity Card number"></input>
								</td>
							  </tr>
							  <tr>
								<td><h4><b>5)Permanent residence</b></h4></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4>Address:<span style="color:red;font-size:20px;">*</span></h4></td>
								<td><input type="text" required id="enter_details" class="form-control" name="home_addr" style="width:600px;background-color: #d1f5e8;"placeholder="Enter permanent adddress"></input>
								</td>
							  </tr>
							  <tr>
								<td><h4>Telephone:</h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="home_tel" style="width:600px;background-color: #d1f5e8;" placeholder="Enter landline number"></input></td>
							  </tr>
							  <tr>
								<td><h4>Mobile:<span style="color:red;font-size:20px;">*</span></h4></td>
								<td><input required type="text" id="fill_area" class="form-control" name="mobile" style="width:600px;background-color: #d1f5e8;"placeholder="Enter mobile number"></input></td>
							  </tr>
							  <tr>
								<td><h4>Email:<span style="color:red;font-size:20px;">*</span></h4></td>
								<td><input required type="text" id="fill_area" class="form-control" name="personel_email" style="width:600px;background-color: #d1f5e8;"placeholder="Enter personal email"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>6)Work place</b></h4></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4>Address:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_addr" style="width:600px;background-color: #d1f5e8;" placeholder="Enter work place address"></input></td>
							  </tr>
							  <tr>
								<td><h4>Telephone:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_tel" style="width:600px;background-color: #d1f5e8;" placeholder="Enter office telephone number"></input></td>
							  </tr>
							  <tr>
								<td><h4>Email:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_email" style="width:600px;background-color: #d1f5e8;" placeholder="Enter office email"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>7)Designation</b></h4></td>
								<td style="width:1000px;"><input type="text" class="form-control"  id="fill_area" name="work_pl_&_desig" style="width:600px;background-color: #d1f5e8;" placeholder="Company name and your designation"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>8)Vehicle Number</b>(if any)</h4></td>
								<td><input type="text" class="form-control"  id="fill_area" name="veh_num" style="width:600px;background-color: #d1f5e8;"placeholder="Enter vehicle number"></input></td>
							  </tr>
							  </table>
							  <table style="margin-left:50px;">
							  <tr>
								<td style="width:700px;"><h4><b>9)How did you get to know about the UCSC short term training courses?</b></h4></td>
								<td style="width:300px;">
										<select style="width:200px;background-color: #d1f5e8;"class="form-control" id="selecting" name="method">
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
							  <td style="width:200px;"><input type="text" class="form-control"  id="fill_area" name="other_des" style="width:600px;background-color: #d1f5e8;" placeholder="if other please describe"></input>
							  </tr>
							  </table>
							 <hr>
							 <div style="margin-left:50px;">
							<span class="badge" style="font-size:40px;">Payment details</span>
							 </div>
							<table style="width:50%;margin-left:50px;">
							 						 
							  <tr>
								<td><h4>Payment Method</h4></td>
								<td>
									<select class="form-control" style="background-color: #d1f5e8;" id="selecting" name="pay_method" required>
										<option value="Cash">Cash</option>
										<option value="Cheque">Cheque</option>
										<option value="Other">Other</option>
									</select>
									
								</td>
							  </tr>
							  
							  <tr>
								<td><h4>Date Received <span style="color:red;font-size:20px;">*</span></h4></td>
								<td>
									<input type="date" class="form-control" style="width:50%;background-color: #d1f5e8;" name="rec_date" required id="datepick2">
								</td>
							  </tr>
							  <tr>
								<td><h4>Received person:<span style="color:red;font-size:20px;">*</span></h4></td>
								<td>
									<select name="person_received"" style="background-color: #d1f5e8" class="form-control selectpicker" >
									<?php
										$q="SELECT * FROM staff WHERE role='CSC Staff' or role='CSC Coordinator'";
										$res=mysqli_query($con,$q);
										while ($row =mysqli_fetch_array($res))
										{
											$full_name=$row['first_name']." ".$row['last_name'];
											
											?>
											<option value="<?php echo $full_name;?>"><?php echo $full_name;?></option>";
										<?php
										}
										?>
                                          
                                            
                                        
									
									</select>
							
								</td>
							  </tr>
							  <tr>
								<td><h4>Reference number:<span style="color:red;font-size:20px;">*</span></h4></td>
								<td><input type="text" style="background-color: #d1f5e8;" id="fill_area" class="form-control" name="ref"required placeholder="Enter the receipt number"></input></td>
							  </tr>
							 </table>
							 <br>
							 
							</center>
							<center>
								<button type="submit" class="btn btn-success" name="submit">Add <span class="glyphicon glyphicon-send"></span> </button>
								<button type="reset" class="btn btn-warning" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
							</center>
							
							</form>
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
