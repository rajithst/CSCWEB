<?php

require '../core/init.php';
include "../components/stud_head.php";

?>
    </head>

    <body>

    <!-- start of nav bar-->
    <nav class="navbar navbar-custom" role = "navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button style="background-color:white;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="home.php" class="logo pull-left"><img src="../public/dist/img/system/csclogo.png" style="width:auto; height:42px;"></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            </ul>
        </div>

    </nav>

    <?php
    $id = $_SESSION['id'];
    $subject = $stu_data['coursename'];
    $course = getcourse($id,$subject);


    ?>
    <div class="container-fluid">
        <div class="row content" id="row">

            <!-- start of course panel -->
            <div class="col-md-3 col-sm-12 col-xs-12" style="margin-top: 55px;">
                <div class="panel panel-default" id="course-panel">
                    <div class="panel-heading" >
                       <center><h3>COURSES</h3></center>
                    </div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" ><?php echo $course; ?></a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse">
                                    <ul class="list-group">
                                <?php
                                    $subjects = getsubjects($course);
                                    while ($row = mysqli_fetch_assoc($subjects)){
                                        $subid = $row['subjectid'];
                                        ?>

                                        <center><li class="list-group-item"><a href="subject.php?subject=<?php echo $subid; ?>"> <?php echo $row['subject']; ?></a></li></center>


                                        <?php    }

                                ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- start of news feed -->


            <div class="col-md-6 col-sm-12 col-xs-12">
                <div id="newsfeed">
                    <div class="col-sm-12 col-xm-12"> <center><h3>News Feed</h3></center></div>

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

            <!-- start of user profile -->
            <div class="col-md-3 col-sm-12 col-xs-12" style="margin-top: 55px;">
                <div class="panel panel-default" id="profile">
                    <div class="panel-heading" >
                        <center><h3> <?php echo $stu_data['name_w_initials']; ?></h3></center>
                    </div>
                    <div class="panel-body" id="user-profile" style="margin: 0 30%;">

                        <center>
                        <div class="user-profile-pic">
                            <img src="../public/dist/img/system/student.jpg" class="img-responsive" alt="profile picture is here" style="width:120px; height:130px;">
                        </div>
                        </center>

                        <div class="user-details" style="width: 130%;" >
                            <center>
                            <div><?php echo $stu_data['fullname']; ?></div>
                            <a href="" id="user-email"><?php echo $stu_data['email']; ?></a>
                            </center>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

<?php include "../components/stud_footer.php";

?>