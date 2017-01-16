<?php 
session_start();

require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}

require '../core/init.php';
require '../core/function/coursecode.php';
include '../components/course_head.php'; ?>
<script>

    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var path= baseUrl+'/CSC-Admin/coursecoevents.xml';

    $(document).ready(function () {

        $('#mycalendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: path
        });
    });
</script>
    </head>
<body>

    <!--start of the navbar<!-->
    <?php include "comp/navbar.php"; ?>

    </br>

<div class="container-fluid">

<div class="col-md-3 col-sm-3 col-xs-12">

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h2 class="panel-title"><strong>Course Subjects</strong></h2></center>
            </div>
            <div class="panel-body">
                <?php
                $id = $staff_data['id'];
                $res = getcourses($con,$id); ?>
                <ul class="" role="menu" style="list-style: none;">
                    <?php while ($row = mysqli_fetch_assoc($res)) {
                        $sid= $row['subjectid'];
                        ?>

                        <li id=""><a tabindex="-1" href="fileupload.php?id=<?php echo $sid; ?>"><span class="glyphicon glyphicon-education"></span><?php echo "  ".$row['subject']; ?></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>


    <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><h2 class="panel-title">

                                    
                                </h2></center>
                        </div>

                        <center><h3> Event Calender</h3></center>
                        <div class="monthly" id="mycalendar"></div>

                    </div>




                    <div class="col-sm-9 col-md-9">
                    
                </div>

            </div>

</div>




<!--            <div class="col-sm-9 col-md-9">


</div>-->


    <div class="col-md-7 col-sm-6 col-xs-12">

        <center><h2>News Feed</h2></center>

        <?php

        $posts = getpostss($con);

        $count = 1;

        while ($row = mysqli_fetch_assoc($posts)) {

            if ($count <=4) {
                $id = $row['adminid'];

                $admindata = getadmins($con,$id);
                while ($data = mysqli_fetch_assoc($admindata)) {
                    ?>


                    <div class="alert-message alert-message-notice">

                        <h4><?php echo $row['subject']; ?> </h4>
                        <span class="badge">Posted By Admin <?php echo $data['name']; ?></span>
                        <div style="width: 6%; margin-left: 90%;margin-top: -3%;height: 70px;">

                            <img src="<?php echo $data['profile']; ?>" alt="" style="width: 100%; height: 100%;">
                        </div>

                        <hr>

                        <p><?php echo htmlspecialchars_decode($row['text']); ?></p>

                        <span class="badge" style="float: right;"> on <?php echo $row['date']; ?></span>

                    </div>


                <?php }
            }else{

                ?>
                <a href="allposts.php">Click here for Older Posts</a>

                <?php
                break;
            }

            $count++;


        }?>

    </div>
    
    <br>



        <div class="col-md-2 col-sm-3 col-xs-12">
            <div class="profile-sidebar">

                <div class="profile-userpic">
                    <img src="<?php echo $staff_data['profile']; ?>" class="img-responsive" alt="">
                </div>

                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo $staff_data['role']; ?>
                    </div>
                </div>

                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Profile</button>
                    <a href="logout.php"><button type="button" class="btn btn-danger btn-sm">Sign Out</button></a>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="index.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Home </a>
                        </li>
                        <li>
                            <a href="profile.php">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>


</div>
<br>
<br>
</div>
</div>
</div>
</div>


<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <div class="container-fluid well span6">
                <div class="row">
                    <div class="col-md-4" >
                        <img src="<?php echo $staff_data['profile']; ?>" class="img-circle">
                    </div>

                    <div class="col-md-8" >
                        <h3><?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?></h3>
                        <h5><?php echo $staff_data['email']; ?></h5>
                        <h5><?php echo $staff_data['role']; ?></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include '../components/course_footer.php'; ?>

  