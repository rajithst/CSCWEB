<?php require '../core/init.php';

include "../components/stud_head.php"; ?>

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
                <li><a href="Login.html"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            </ul>
        </div>
        </div>
    </nav>
    <?php
    $id = $_SESSION['id'];
    $subject = $stu_data['coursename'];
    $course = getcourse($id,$subject);


    ?>
    <!-- start of body -->
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
                                    <ul class="list-group active">
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

            <!-- start of lecture schedule -->
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div id="lecture-schedule" style="margin-top: 75px;">

                        <?php
                        $subid = $_GET['subject'];
                        $res = getslides($subid);

                        while ($row= mysqli_fetch_assoc($res)) {

                        ?>
                        <div class="well">
                        <div class="text-head"><h3> <?php echo $row['topic']; ?></h3></div>
                            <hr style="border-top: 3px double #8c8b8b;">

                            <p><?php echo $row['content']; ?></p>
                        <ul class="topics">
                            <div class="contents"><a href="">Lecture Note 1</a></div>
                            <div class="contents"><a href="">Lecture Note 2</a></div>
                            <div class="contents">
                                <a href="">Tutorial</a>
                                <ul><a href="" style="font-size:13px">Submission Link</a></ul>
                            </div>
                            <div class="contents">
                                <a href="">Assignment</a>
                                <ul><a href="" style="font-size:13px">Submission Link</a></ul>
                            </div>
                            </ul>

                    </div>
                            <hr style="	height: 10px;
                                    border: 0;
                                    box-shadow: 0 10px 10px -10px #8c8b8b inset;">
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>


<?php include "../components/stud_footer.php"; ?>