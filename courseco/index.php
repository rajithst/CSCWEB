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


    $(document).ready(function () {

        $('#mycalendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: 'events.xml'
        });
    });
</script>
    </head>
<body>

    <!--start of the navbar<!-->
    <?php include "comp/navbar.php"; ?>

    </br>

<div class="container-fluid">
<div class="sidenav col-md-2 col-sm-3 col-xs-12">

    <center>
        <h3>Main menu</h3>
    </center>
                <div class="panel-group" id="accordion">
                    <!--<div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span>Content</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body" style="padding: 0;">
                                <table class="table" style="margin-bottom: 0px;">
                                    <tr>
                                        <td style="padding-left: 15px;">
                                            <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px;" ></span><a href="allposts.php">All Posts</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-user text-success" style="margin-right: 10px;"></span><a href="">All Users</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-file text-success" style="margin-right: 10px;"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
                                        </td>
                                    </tr>
                                    <tr>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span>Modules</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Orders</a> <span class="label label-success">$ 320</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Invoices</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Shipments</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Tex</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Account</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Change Password</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Notifications</a> <span class="label label-info">5</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Import/Export</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-trash text-danger"></span><a href="http://www.jquery2dotnet.com" class="text-danger">
                                                Delete Account</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span>My Files</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class=""></span><a href=>Attendance Reports</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=""></span><a href="">Other reports</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class=""></span><a href="">View Assignments</a>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



    <center><h3> Event Calender</h3></center>
    <div class="monthly" id="mycalendar"></div>

            </div>




            <div class="col-sm-9 col-md-9">


</div>


    <div class="col-md-8 col-sm-6 col-xs-12">

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

                        <p><?php echo $row['text']; ?></p>

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
                    <button type="button" class="btn btn-danger btn-sm">Sign Out</button>
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

  