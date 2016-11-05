<?php session_start();
include '..core/init.php';
include '../components/page_head.php';
?>


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
    <!-- end of header-->
    <div class="container-fluid text-center">
        <div class="row content">

                
            <div class="col-md-3 sidenav">
                <div class="well" style="height:200px;" id="calendar">
                    <p><strong>calender</strong></p>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div id="newsfeed">
                    <div class="col-sm-12 col-xm-12"> <center><h3>News Feed</h3></center></div>

                    <?php


                    print_r($_SESSION);

                    $posts = getposts();
                    while ($row = mysqli_fetch_assoc($posts)) {
                        $id = $row['adminid'];
                        $admindata = getadmin($id);
                        while ($data = mysqli_fetch_assoc($admindata)) {
                            ?>

                            <div class="col-sm-12 col-xm-12" >
                                <div id="nws">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" ><strong><?php echo $row['subject']; ?></strong> <br>
                                            <small>Posted by <?php echo $data['name']; ?></small>
                                            <div style="width: 10%; margin-left: 85%;margin-top: -5%;height: 70px;"><img src="<?php echo $data['profile']; ?>" alt="" style="width: 100%; height: 100%;"></div>

                                        </div>
                                        <div class="panel-body" id="newsbody">
                                            <?php echo $row['text']; ?>
                                            <div id="attach"><a href=""><?php echo $row['date']; ?></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                        }

                    } ?>
                </div>
            </div>

        <div class="col-md-3 sidenav">
            <!--profile-->
            <div class="well" style="height:200px;" id="proArea">
                <h4>Full Name</h4>
                <img src="images/propic.png" class="img-circle" height="100" width="100" alt="Avatar">
            </div>
            </div>

        </div>
        </div>

<?php include "../components/page_tail.php";
