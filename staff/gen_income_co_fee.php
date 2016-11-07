<?php
include "../core/init.php";
include '../components/page_head.php'; ?>

<link rel="stylesheet" href="../public/dist/css/staff_css.css">
<style>
table, th, td {
    border: 1px solid black;
}
td{
	width:100px;
	border-color:#40ff00;
}
</style>
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
                        <li><a tabindex="-1" href="edit_rep.php" id="task_txt">Edit Report</a></li>
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
							<?php
								
								$s_date=$_POST['start_date'];

								$e_date=$_POST['end_date'];

								$query = "SELECT * FROM course_income WHERE received_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
								$result = mysqli_query($con,$query);

								echo "<table>"; // start a table tag in the HTML
								echo "<tr><td>Student NIC</td><td>Subject name</td><td>Payment method</td><td>Received date</td><td>Person received</td><td>Refference no</td><td>Amount</td></tr>";
								while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['student_NIC'] . "</td><td>" . $row['subject_name'] . "</td><td>" . $row['payment_method'] . "</td><td>" . $row['received_date'] . "</td><td>" . $row['person_rec']  . "</td><td>" . $row['refference_no'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
								}

								echo "</table>"; //Close the table in HTML

								mysqli_close($con); //Make sure to close out the database connection

								?>
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




