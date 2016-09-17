<?php require '../core/init.php';

include '../components/course_head.php'; ?>

    </head>
    <body>

    <!--start of the navbar<!-->
    <nav class="navbar navbar-custom" role = "navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button style="background-color:white;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#"><img src="../public/dist/img/system/csclogo.png" style="width:170px;"></a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="margin-right: 40px;">


                    <!-- "Course" Nested-drop-down for courses begins from here. Line 29-94><!-->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Course<span class="caret">
                        </a>
                        <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" style="padding: 0;">

                            <li class="dropdown-submenu">
                                <?php

                                $id = 2;
                                $res = getcourse_cord($id);

                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <a tabindex="-1" href="#"><?php echo $row ['coursename']; ?></a>
                                <ul class="dropdown-menu dropdown-color">

                                    <?php
                                    $course = $row ['coursename'];
                                    $subs = getsubs_cord($course);
                                    ?>

                                    <li style="padding: 0;"><a tabindex="-1" href="upload.html">Subject 1</a></li>
                                    <li><a href="upload.html">Subject 2</a></li>
                                    <li><a href="upload.html">Subject 3</a></li>
                                </ul>
                                    <?php } ?>

                            </li>

                        </ul>
                    </li>

                    <!-- End of "Course" Nested-drop-down><!-->

                    <!-- drop-down for notifications><!-->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notifications<span class="caret">
                        </a>
                    </li>

                    <!-- end of notifications drop-down><!-->



                    <!-- drop-down for attendance><!-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Attendance<span class="caret">
                        </a>
                        <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                            <li><a tabindex="-1" href="#">Attendance of Course No 1</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a tabindex="-1" href="#">Attendance of Course No 2</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a tabindex="-1" href="#">Attendance of Course No 3</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a tabindex="-1" href="#">Attendance of Course No 4</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a tabindex="-1" href="#">Attendance of Course No 5</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a tabindex="-1" href="#">Attendance of Course No 6</a></li>
                        </ul>
                    </li>

                    <!-- end of attendance drop-down><!-->
                </ul>

            </div>
        </div>
    </nav>

    <!-- end of the navbar><!-->


    <div class="container-fluid">
        <div class="row content" style="margin-top: 50px;">
            <!--start of leftbar><!-->
            <div class="sidenav col-md-2 col-sm-3 col-xs-12">
                <div class="well">
                    <p><a href="#"><strong>Upcoming Events</strong></a></p>

                </div>

                <div class="panel panel-default" id="message-panel">
                    <div class="panel-heading" style="background-color:#66B9BF;"><strong>Notifications & E-mails</strong></div>
                    <div class="panel-body">
                        <ul>
                            <li><span class="glyphicon glyphicon glyphicon-comment"></span><a href="notifications.html"><strong> Students</strong></a></li>
                            <li><span class="glyphicon glyphicon-envelope"></span><a href=""><strong> Lecturers</strong></a></li>

                        </ul>
                    </div>
                </div>

            </div>
            <!--end of leftbar><!-->


            <!-- start of News feed><!-->
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="container-fluid" id="news-feed-div">
                    <h3 id="NEWS">News</h3>
                    <?php

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
                                            <div style="width: 6%; margin-left: 90%;margin-top: -3%;height: 70px;"><img src="<?php echo $data['profile']; ?>" alt="" style="width: 100%; height: 100%;"></div>

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
            <!-- end of News feed><!-->


            <!-- start of rightbar><!-->

            <!-- profile picture image-component><!-->
            <div class="sidenav col-md-2  col-sm-3 col-xs-12">
                <div class="panel panel-default" id="profpic-panel">
                    <div class="panel-heading" style="background-color:#66B9BF;"><strong>Logged in as (name)</strong></div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="thumbnail"></div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div id="profpic-well">

                                        <strong>L.P</strong></br>
                                        <strong>Jayasinghe</strong></br>
                                        <strong>Country</strong></br>
                                        Sri Lanka</br>
                                    </div>
                                </div>
                            </div>
                            <a href="#" id="logout"><strong>(Log Out)</strong></a></h3>
                        </div>
                    </div>
                </div>
                <div class="well">
                    <p><a href="#">Calendar</a></p>
                </div>



            </div>
        </div>
    </div>

<?php include '../components/course_footer.php'; ?>