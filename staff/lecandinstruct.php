<?php

include "../core/init.php";
require 'function/staff.php';
include '../components/page_head.php'; ?>

    <link rel="stylesheet" href="../public/dist/css/staff_css.css">

    </head>


    <body background="">
<!-- header-->
<nav class="navbar navbar-default" id="myNavbar">
    <div class="container-fluid" >
        <div class="navbar-header" style="margin: 17px;" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="../public/dist/img/system/csclogo.png"class="img-responsive csc-logo" id="logo" >


        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right" id="navbar_txt" style="margin: 12px;">
                <li><a href="index.php" style="color:white;" >Home</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;"><span>Notifications</span>
                        <span class="caret">
						</span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                        <li><a tabindex="-1" href="inbox_Email.html" id="task_txt">Emails</a></li>

                    </ul>
                </li>

                <li><a href="#" style="color:white;"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-inverse" id="myNavbar">
    <div class="container-fluid" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>



        </div>
        <div class="collapse navbar-collapse" style="background-color: rgb(102, 185, 191)">

            <ul class="nav navbar-nav navbar-right" id="navbar_txt">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color:white;font-size:17px;" >Edit Reports
                        <span class="caret">
						</span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                        <li><a tabindex="-1" href="select_course.php" id="task_txt">Attendence</a></li>
                        <li><a tabindex="-1" href="income.php" id="task_txt">Income</a></li>
                        <li><a tabindex="-1" href="expense.php" id="task_txt">Expences</a></li>
                        <li><a tabindex="-1" href="select_course_marks.html" id="task_txt">Student Marks</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="report_generating.html"  style="color:white;font-size:17px;">Generate Report
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color:white;font-size:17px;">Send
                        <span class="caret">
						</span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                        <li><a tabindex="-1" href="inbox_Email.html" id="task_txt" >Email</a></li>
                    </ul>
                </li>
                <li>
                    <a href="student_registration.html"   style="color:white;font-size:17px;">Register Students
                    </a>
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













<?php include "../components/page_tail.php"; ?>