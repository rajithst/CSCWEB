<?php
include "../core/init.php";
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


<form action="expense_report.php" method="post">
    <div class="container-fluid text-center">
        <div class="row content">

            <div class="col-sm-8 text-left">
                <div class="well" id="news">
                    <h2><u>Expense invoice</u></h2>
                    <p><b>Select the type of Expense:</b></p>
                    <select class="form-control" id="selecting" name="type">
                        <option value="Donations">Donations</option>
                        <option value="Advertisments">Advertisments</option>
                        <option value="Other">other</option>
                    </select>
                    </br>
                    <p><b>Describe the expense type in brief:</b></p>
                    <textarea class="form-control" rows="1"required id="enter_details" name="desc"></textarea>
                    </br>
                    <p><b>Name of the receiving person or Company:</b></p>
                    <textarea class="form-control" rows="1"required id="enter_details" name="rec_pty"></textarea>
                    </br>
                    <p><b>Eneter the Date(yyyy/mm/dd):</b></p>
                    <textarea class="form-control" rows="1"required id="fill_area" name="date"></textarea>
                    </br>
                    <p><b>Payment paying person's name:</b></p>
                    <textarea class="form-control" rows="1"required id="enter_details" name="pay_person"></textarea>
                    </br>
                    <p><b>Select the payment method:</b></p>
                    <select class="form-control" id="selecting" name="method">
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Other">Other</option>
                    </select>
                    </br>
                    <p><b>Ammount</b></p>
                    <textarea class="form-control" rows="1"required id="fill_area" name="amm"></textarea>
                    </br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>
</form>

<?php include "../components/page_tail.php";