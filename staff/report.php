<?php
include "../core/init.php";
require 'function/staff.php';
include '../components/page_head.php'; ?>

<link rel="stylesheet" href="../public/dist/css/staff_css.css">

</head>
<body background="">
<!-- header-->
<nav class="navbar navbar-inverse" id="myNavbar">
    <div class="container-fluid" >
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="images/logo.png"class="img-responsive csc-logo" id="logo" >


        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right" id="navbar_txt">
                <li><a href="index.php" style="color:white;" class="glyphicon glyphicon-home">Home</a></li>
                <li><a href="profile_csc_staff.html" style="color:white;" class="glyphicon glyphicon-user">Profile</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;"><span class="glyphicon glyphicon-globe">Notifications</span>
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
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>



        </div>
        <div class="collapse navbar-collapse">

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
                    <a href="report.php"  style="color:white;font-size:17px;">Generate Report
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
<!-- end of header-->
<div class="container-fluid text-center">
    <div class="row content">

        <div class="col-sm-8 text-left">
            <div class="well" id="news">
                <h2><u>Report Generating</u></h2>
                <p><b>Select the type of report:</b></p>
                <select class="form-control" id="selecting">
                    <option value="one">Attendence</option>
                    <option value="two">Income</option>
                    <option value="three">Expences</option>
                    <option value="four">Student marks</option>
                </select>
                </br>
                <p><b>Select the category of report:</b></p>
                <select class="form-control" id="selecting">
                    <option value="one">Monthly</option>
                    <option value="two">Quaterly</option>
                    <option value="three">Yearly</option>
                </select>
                </br>
                <p><b>Select the month:</b></p>
                <select class="form-control" id="selecting">
                    <option value="one">Jan</option>
                    <option value="two">Feb</option>
                    <option value="three">Mar</option>
                    <option value="one">Apr</option>
                    <option value="two">May</option>
                    <option value="three">Jun</option>
                    <option value="one">Jul</option>
                    <option value="two">Aug</option>
                    <option value="three">Sep</option>
                    <option value="one">Oct</option>
                    <option value="two">Nov</option>
                    <option value="three">Dec</option>
                </select>
                </br>
                <p><b>Eneter the Year(yyyy):</b></p>
                <textarea class="form-control" rows="1"required id="fill_area"></textarea>
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>

        </div>

    </div>

<?php include "../components/page_tail.php";