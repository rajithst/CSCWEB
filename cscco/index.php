<?php 
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/cscco.php';
include '../components/cscordinator_head.php'; ?>


<script>


    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var path= baseUrl+'/CSC-Admin/csccoevents.xml';

    $(document).ready(function () {

        $('#mycalendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: path
        });

        $('.helpbutton').click(function () {


            $('#joyRideTipContent').joyride({
                autoStart : false,
                postStepCallback : function (index, tip) {
                    if (index == 2) {
                        $(this).joyride('set_li', false, 1);
                    }
                },
                modal:false,
                expose: false
            });

        });




    });
</script>

</head>
<body>

<?php include "comp/navbar.php"; ?>

</br>

<div class="container-fluid">
<div class="sidenav col-md-2 col-sm-3 col-xs-12">

    <center>
        <h3>Main menu</h3>
    </center>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
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
                                            <span class="glyphicon glyphicon-user text-success" style="margin-right: 10px;"></span><a href="alluser.php">All Users</a>
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
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span>Reports</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-usd"></span><a href="http://www.jquery2dotnet.com">Sales</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-user"></span><a href="http://www.jquery2dotnet.com">Customers</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-tasks"></span><a href="http://www.jquery2dotnet.com">Products</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-shopping-cart"></span><a href="http://www.jquery2dotnet.com">Shopping Cart</a>
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


<div class="col-md-8 col-sm-6 col-xs-12" >

    <center><h2 >News Feed</h2></center>

    <?php

    $posts = getpostss($con);

    $count = 1;

        while ($row = mysqli_fetch_assoc($posts)) {

            if ($count <=4) {
                $id = $row['adminid'];

                $admindata = getadmins($con,$id);
                while ($data = mysqli_fetch_assoc($admindata)) {
                    ?>


                    <div class="alert-message alert-message-notice" id="jrnewsfeed">

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
                    <button type="button" class="btn btn-danger btn-sm" id="jrlogout">Sign Out</button>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="index.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Home </a>
                        </li>
                        <li id="jraccsettings">
                            <a href="profile.php">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>

                        <li class="helpbutton">
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

<ol id="joyRideTipContent">
    <li data-id="jrnewsfeed" data-text="Next" class="custom">
        <h2>News Feed</h2>
        <p>This Section will display all the News related to Course Coordinator Publish by Administrator</p>
    </li>
    <li data-id="jrnavbar" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Main Naviation Bar</h2>
        <p>This Section Includes All the operations Which can perform by Course Coordinator</p>
    </li>
    <li data-id="jrreporttab" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Reports Section</h2>
        <p>This Section You can view and Download All the reports Generate by System</p>
    </li>

    <li data-id="jrcourse" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Add and Edit Courses</h2>
        <p>This Section You can Add and Edit All the Courses Regarding to system</p>
    </li>

    <li data-id="jrlecturer" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Add Lecturer</h2>
        <p>This Section You can Add Lecturer and edit All the Details Lecturers</p>
    </li>



    <li data-id="jrlectures" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Add Lectures</h2>
        <p>This Section You can Add Lectures and timeslots according to Lectures</p>
    </li>

    <li data-id="jrmessages" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Message and Emails</h2>
        <p>This Section You can Access to instance Messanging and Email sending</p>
    </li>

    <li data-id="mycalendar" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Event Calander</h2>
        <p>All the events publish here</p>
    </li>



    <li data-id="jraccsettings" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Change your Account Settings</h2>
        <p>All the Settings can be change and save</p>
    </li>
    <li data-id="jrlogout" data-button="Next" data-options="tipLocation:left;tipAnimation:fade">
        <h2>Logout</h2>
        <p>Logout Button</p>
    </li>
</ol>

<?php include "../components/cscordinator_footer.php"; ?>


