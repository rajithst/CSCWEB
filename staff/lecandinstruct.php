<?php

include "../core/init.php";
require 'function/staff.php';
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

<?php
//$subid = $_GET['subid'];
$subid = 'csc02/1';
$res = getstudents($subid);
$subdata = getsubdata($subid);
?>
<section class="content-header">


    <div class="row">

        <div class="col-md-2"></div>

        <form action="" method="post">
            <div class="col-md-10">

                <h2><?php echo $subdata[2]; ?>  -  <?php echo $subid?></h2><br>

                <h3> Course Id - <?php echo $subdata[1];?></h3> <br>

                <div class="row">
                    <div class="col-md-4">Date <input type="date" name="lecdate" required></div>
                    <div class="col-md-3">Time <input type="datetime-local" name="lectime" required></div>
                    <div class="col-md-3">Hall <input type="text" name="lechall" required></div>

                </div>

                <br>

                <div class="box" style="width:75%;">
                    <div class="box-header">
                        <h3 class="box-title">Lecturer and Instructure Attendance</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                        <h3> Lecturers</h3>

                        <table class="table table-hover">

                            <tr>
                                <th>Lecturer Name</th>
                                <th>Mark Attendance</th>

                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername"></td>

                                <td><input type="checkbox" checked lecattendance></td>



                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername"></td>

                                <td><input type="checkbox" checked lecattendance></td>



                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername"></td>

                                <td><input type="checkbox" checked lecattendance></td>



                            </tr>
                        </table>

                        <hr>

                        <h3> INstructions</h3>

                        <table class="table table-hover">

                            <tr>
                                <th>Instructure Name</th>
                                <th>Mark Attendance</th>

                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername"></td>

                                <td><input type="checkbox" checked lecattendance></td>



                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername"></td>

                                <td><input type="checkbox" checked lecattendance></td>



                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername"></td>

                                <td><input type="checkbox" checked lecattendance></td>



                            </tr>
                        </table>



                    </div>

                </div>

                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-block btn-success btn-md">Finish</button>
                    </div>

                    <div class="col-md-2">

                        <button type="cancel" class="btn btn-block btn-danger btn-md">Cancel</button>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </form>
        <div class="col-md-2"></div>

    </div>

</section>
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












<?php include "../components/page_tail.php"; ?>