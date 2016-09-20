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

<div class="container-fluid text-center">
    <div class="row content">
        <div class="well" style="background: rgb(203, 205, 206);">
            <div id="info">
                <p>
                    Subject Code<input type="number" class="form-control">
                </p>
                <p>
                    (Assignment/Exam)
                <div class="checkbox">
                    <label><input type="checkbox" value=""><b>Assignment</b></label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value=""><b>Exam</b></label>
                </div>
                </p>
                <p>
                    Assingment Number<input type="number" class="form-control">
                </p>
                <p>
                    Date(dd/mm/yy)<input type="number" class="form-control">
                </p>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Index Number</th>
                    <th>Name</th>
                    <th>Grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr><tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                <tr>
                    <td>******</td>
                    <td>xxxxxxxx</td>
                    <td><input type="number" class="form-control"></td>
                </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>

<?php include "../components/page_tail.php";