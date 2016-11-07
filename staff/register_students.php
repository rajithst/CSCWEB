<?php
include "../core/init.php";
include '../components/page_head.php'; ?>

<link rel="stylesheet" href="../public/dist/css/staff_css.css">

</head>

<body background="">
<!-- header-->
<nav class="navbar navbar-inverse" id="myNavbar" >
    <div class="container-fluid" >
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="../public/dist/img/system/csclogo.png"class="img-responsive csc-logo" id="logo">
        </div>
        <div class="collapse navbar-collapse"  >

            <ul class="nav navbar-nav navbar-right" id="navbar_txt" >
                <li>
					<a href="index.php" style="color:white;" class="glyphicon glyphicon-home"> Home</a>
				</li>
                <li class="dropdown" style="margin-right:4px" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;padding-top:18px;" >
					<span class="glyphicon glyphicon-globe"></span>
					Notifications
					<span class="caret">
					</span>
					</a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                        <li><a tabindex="-1" href="" id="task_txt">Emails</a></li>
                    </ul>
                </li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;padding-top:18px;">
					<span class="glyphicon glyphicon-list-alt"> Reports</span>
                        <span class="caret">
						</span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                        <li><a tabindex="-1" href="" id="task_txt">Edit Report</a></li>
						<li><a tabindex="-1" href="report_gen.php" id="task_txt">Generate report</a></li>
                    </ul>
                </li>
				<li>
					<a href="select_course_reg.php" style="color:white;padding-top:18px;"><span class="glyphicon glyphicon-edit"></span> Registration</a>
				</li>
                <li>
					<a href="#" style="color:white;padding-top:18px;"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
				</li>
            </ul>
        </div>
    </div>
</nav>


<!-- end of header-->
		<form action="student_Registration.php" method="post">
			<div class="container-fluid text-center">
				<div class="row content"style="padding-top:0.1px;">	
						<div class="well" id="news">	
							<h2><u>Registration Form</u></h2>
							<table style="width:100%">
							<tr>
								<td>
									<h4>Subject name :<span style="color:red;font-size:25px;">*</span></h4>
								</td>
								<td>
									<?php 
										$ncid=$_POST['cid'];
										?>
									<select id="selecting" name="course_name" style="width:700px;">
									
									<?php
										$sql = "SELECT subject FROM subjects WHERE courseid = '$ncid'";
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
								<td><h4>Name in full :<span style="color:red;font-size:25px;">*</span></h4></td>
								<td>
								<input type="text"required id="enter_details" class="form-control" name="full_name" style="width:900px;"> 
								</input>
								</td>
							  </tr>
							  <tr>
								<td><h4>Name with initials :<span style="color:red;font-size:25px;">*</span></h4></td>
								<td><input type="text" required id="enter_details" name="full_name_with_initials"class="form-control" style="width:900px;"></input>
								</td>
							  </tr>
							  <tr>
								<td></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4><b>2)Date of Birth <span style="color:red;font-size:25px;">*</span></b></h4></td>
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
								<td><input type="text"required id="fill_area" class="form-control" name="NIC"></input>
								</td>
							  </tr>
							  <tr>
								<td><h4><b>5)Permanent residence</b></h4></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4>Address:<span style="color:red;font-size:25px;">*</span></h4></td>
								<td><input type="text" required id="enter_details" class="form-control" name="home_addr" style="width:900px;"></input>
								</td>
							  </tr>
							  <tr>
								<td><h4>Telephone:</h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="home_tel"></input></td>
							  </tr>
							  <tr>
								<td><h4>Mobile:</h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="mobile"></input></td>
							  </tr>
							  <tr>
								<td><h4>Email:</h4></td>
								<td><input type="text" id="fill_area" class="form-control" name="personel_email" style="width:900px;"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>6)Work place</b></h4></td>
								<td>  </td>
							  </tr>
							  <tr>
								<td><h4>Address:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_addr" style="width:900px;"></input></td>
							  </tr>
							  <tr>
								<td><h4>Telephone:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_tel"></input></td>
							  </tr>
							  <tr>
								<td><h4>Email:</h4></td>
								<td><input type="text"  id="fill_area" class="form-control" name="office_email" style="width:900px;"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>7)Work place & Designation</b></h4></td>
								<td style="width:1000px;"><input type="text" class="form-control"  id="fill_area" name="work_pl_&_desig" style="width:900px;"></input></td>
							  </tr>
							  <tr>
								<td><h4><b>8)Vehicle Number</b>(if any)</h4></td>
								<td><input type="text" class="form-control"  id="fill_area" name="veh_num"></input></td>
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
								<td style="width:200px;"><input type="text" class="form-control"  id="fill_area" name="other_des" style="width:600px;" placeholder="if other please describe"></input>
								</td>
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
							 <button type="submit" class="btn btn-primary" style="width:300px;">Submit</button>
						</div>
				</div>
			</div>
		</form>
	
<footer class="container-fluid" id="footer">
        <div class = "container-fluid">
            <div class="row">
                <div col-md-5 class="footer-content">
                     <ul class="footer-nav">
                        <li>C</li> <li>O</li> <li>M</li> <li>P</li> <li>U</li> <li>T</li> <li>I</li> <li>N</li><li>G</li><li></li>           
                        <li>S</li> <li>E</li> <li>R</li> <li>V</li> <li>I</li> <li>C</li> <li>E</li> <li>S</li><li></li>
                        <li>C</li><li>E</li> <li>N</li> <li>T</li> <li>R</li> <li>E</li>
                    </ul>
               </div>
            </div>
        </div>
    </footer>
<?php include "../components/page_tail.php";