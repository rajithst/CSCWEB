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
<div class="container-fluid text-center">
        <div class="row content" style="padding-top:0.1px" >


            <div class="col-md-3 sidenav" style="padding-left:0.1px">
                <div class="well" style="height:200px;" id="calendar">
                    <p><strong>calender</strong></p>
                </div>
            </div>
			<form action="gen_income.php" method="post">
            <div class="col-md-6 col-sm-12 col-xs-12" style="padding-right:0.1px;padding-left:0.1px;">
                <div class="well" id="newsfeed" >
				<u><h2>INCOME REPORT</h2></u>
					<?php 
						$s_date=$_POST['start_date'];

						$e_date=$_POST['end_date'];

						$table=$_POST['type'];
	
						?>
						<table>
									
						<?php
							$sql = "SELECT student_NIC,ammount FROM $table WHERE received_date BETWEEN STR_TO_DATE(, '%m-%d-%Y') AND STR_TO_DATE(, '%m-%d-%Y')";
							$query = mysqli_query($con, $sql);			
							while ($row = mysqli_fetch_assoc($query)){
							$NIC = $row['student_NIC'];
							?>
											
						<tr> <?php echo $row['ammount']; ?></tr>
											
											
						<?php } ?>
						</table>
                </div>
            </div>
			</form>
        <div class="col-md-3 sidenav" style="padding-right:0.1px">
            <!--profile-->
            <div class="well" style="height:200px;" id="proArea">
                <h4>L P Jayasinghe</h4>
                <img src="../public/dist/img/profile/c280829b27.jpg" class="img-circle" height="100" width="100" alt="Avatar">
            </div>
            </div>

        </div>
    </div>


</center>
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