<?php include 'components/admust.php' ?>
<?php include 'components/ad_head.php' ?>


<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <?php include "components/ad_sidebar.php";?>

    <li class="xn-title">Menu</li>
    <li class="">
        <a href="home.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
    </li>

    <li class="active">
        <a href="calander.php"><span class="fa fa-desktop"></span> <span class="xn-text">Calander</span></a>
    </li>

    <li class="xn-openable ">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
        <ul>
            <li><a href="post.php"><span class="fa fa-image"></span> New Post</a></li>
            <li class=""><a href="published.php"><span class="fa fa-user"></span> Published</a></li>
            <li class=""><a href="draft.php"><span class="fa fa-users"></span> Draft</a></li>

        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
        <ul>
            <li><a href="inbox.php"><span class="fa fa-inbox"></span> Inbox</a></li>
            <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
            <li><a href="compose.php"><span class="fa fa-pencil"></span> Compose</a></li>
        </ul>
    </li>


    <li class="xn-openable ">
        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
        <ul>
            <li><a href="allusers.php"><span class="fa fa-heart"></span> All Users</a></li>
            <li><a href="adduser.php"><span class="fa fa-cogs"></span> Add User</a></li>
            <li class=""><a href="edituser.php"><span class="fa fa-square-o"></span> Edit User</a></li>

        </ul>
    </li>

    <li>
        <a href="backup.php"><span class="fa fa-map-marker"></span> <span class="xn-text">Data Backups</span></a>
    </li>

    <li>
        <a href="coursesettings.php"><span class="fa fa-map-marker"></span> <span class="xn-text">Course Settings</span></a>
    </li>

    <li class="xn-openable">
        <a href=""><span class="fa fa-user"></span> <span class="xn-text">System Settings</span></a>
        <ul>
            <li><a href="profilesettings.php"><span class="fa fa-heart"></span> Profile Setings</a></li>
            <li><a href="generalsettings.php"><span class="fa fa-cogs"></span> General Settings</a></li>

        </ul>
    </li>

    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- PAGE CONTENT -->
<div class="page-content">

    <?php include "components/ad_xnav.php";?>
    <!-- END X-NAVIGATION VERTICAL -->

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Posts</a></li>
        <li class="active">Draft</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>Events Clander</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">

            <div class="col-md-6" id="table">

                <!-- CONTACTS WITH CONTROLS -->
                <div class="panel panel-default">
                    <div class="monthly" id="mycalendar"></div>

                </div>
                <!-- END CONTACTS WITH CONTROLS -->

            </div>
            <div class="col-md-6">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Edit User Details Here</h3>
                </div>

                <?php


                /*
                 * get request from the submit button
                 *
                 * */
                if(isset($_POST['addevent']) === true) {



                $xml = new DOMDocument("1.0","UTF-8");  //create new DOMDocument object
                $xml->load('events.xml');        //load events.xml file

                        $name =  filter_var($_POST['name'],FILTER_SANITIZE_STRING);  //sanitizing inputed data
                        $sdate =  $_POST['sdate'];
                        $enddate =  $_POST['enddate'];
                        $starttime=$_POST['starttime'];
                        $endtime = $_POST['endtime'];

                        /*
                         * writing to add data to xml file
                         *
                         * */
                        $rootTag = $xml->getElementsByTagName("monthly")->item(0);
                        $infoTag = $xml->createElement("event");
                            $nameTag = $xml->createElement("name",$name);
                            $sdateTag = $xml->createElement("startdate",$sdate);
                            $edateTag = $xml->createElement("enddate",$enddate);
                            $stimeTag = $xml->createElement("starttime",$starttime);
                            $etimeTag = $xml->createElement("endtime",$endtime);



                            $infoTag->appendChild($nameTag);
                            $infoTag->appendChild($sdateTag);
                            $infoTag->appendChild($edateTag);
                            $infoTag->appendChild($stimeTag);
                            $infoTag->appendChild($etimeTag);

                    $rootTag->appendChild($infoTag);
                    $xml->save('events.xml');


                            $stu = 0;
                            $couc = 0;
                            $csc = 0;
                            if (!empty($_POST["user"])) {
                                foreach ($_POST["user"] as $user) {
                                    if ($user == 1) {

                                        /*
                                           * writing to add data to xml file if $user=1
                                           *
                                            * */
                                        $xml = new DOMDocument("1.0","UTF-8");
                                        $xml->load('stuevents.xml');

                                        $name =  filter_var($_POST['name'],FILTER_SANITIZE_STRING);
                                        $sdate =  $_POST['sdate'];
                                        $enddate =  $_POST['enddate'];
                                        $starttime=$_POST['starttime'];
                                        $endtime = $_POST['endtime'];

                                        $rootTag = $xml->getElementsByTagName("monthly")->item(0);
                                        $infoTag = $xml->createElement("event");
                                        $nameTag = $xml->createElement("name",$name);
                                        $sdateTag = $xml->createElement("startdate",$sdate);
                                        $edateTag = $xml->createElement("enddate",$enddate);
                                        $stimeTag = $xml->createElement("starttime",$starttime);
                                        $etimeTag = $xml->createElement("endtime",$endtime);



                                        $infoTag->appendChild($nameTag);
                                        $infoTag->appendChild($sdateTag);
                                        $infoTag->appendChild($edateTag);
                                        $infoTag->appendChild($stimeTag);
                                        $infoTag->appendChild($etimeTag);

                                        $rootTag->appendChild($infoTag);
                                        $xml->save('stuevents.xml');




                                    } else if ($user == 2) {

                                        /*
                                        * writing to add data to xml file if $user=2
                                        *
                                         * */

                                        $xml = new DOMDocument("1.0","UTF-8");
                                        $xml->load('coursecoevents.xml');

                                        $name =  filter_var($_POST['name'],FILTER_SANITIZE_STRING);
                                        $sdate =  $_POST['sdate'];
                                        $enddate =  $_POST['enddate'];
                                        $starttime=$_POST['starttime'];
                                        $endtime = $_POST['endtime'];

                                        $rootTag = $xml->getElementsByTagName("monthly")->item(0);
                                        $infoTag = $xml->createElement("event");
                                        $nameTag = $xml->createElement("name",$name);
                                        $sdateTag = $xml->createElement("startdate",$sdate);
                                        $edateTag = $xml->createElement("enddate",$enddate);
                                        $stimeTag = $xml->createElement("starttime",$starttime);
                                        $etimeTag = $xml->createElement("endtime",$endtime);



                                        $infoTag->appendChild($nameTag);
                                        $infoTag->appendChild($sdateTag);
                                        $infoTag->appendChild($edateTag);
                                        $infoTag->appendChild($stimeTag);
                                        $infoTag->appendChild($etimeTag);

                                        $rootTag->appendChild($infoTag);
                                        $xml->save('coursecoevents.xml');



                                    } else if ($user == 3) {


                                        /*
                                        * writing to add data to xml file if $user=3
                                        *
                                         * */
                                        $xml = new DOMDocument("1.0","UTF-8");
                                        $xml->load('csccoevents.xml');

                                        $name =  filter_var($_POST['name'],FILTER_SANITIZE_STRING);
                                        $sdate =  $_POST['sdate'];
                                        $enddate =  $_POST['enddate'];
                                        $starttime=$_POST['starttime'];
                                        $endtime = $_POST['endtime'];

                                        $rootTag = $xml->getElementsByTagName("monthly")->item(0);
                                        $infoTag = $xml->createElement("event");
                                        $nameTag = $xml->createElement("name",$name);
                                        $sdateTag = $xml->createElement("startdate",$sdate);
                                        $edateTag = $xml->createElement("enddate",$enddate);
                                        $stimeTag = $xml->createElement("starttime",$starttime);
                                        $etimeTag = $xml->createElement("endtime",$endtime);



                                        $infoTag->appendChild($nameTag);
                                        $infoTag->appendChild($sdateTag);
                                        $infoTag->appendChild($edateTag);
                                        $infoTag->appendChild($stimeTag);
                                        $infoTag->appendChild($etimeTag);

                                        $rootTag->appendChild($infoTag);
                                        $xml->save('csccoevents.xml');
                                    }


                                }
                            }

                    $stu = 0;
                    $couc = 0;
                    $csc = 0;
                    if (!empty($_POST["user"])) {
                        foreach ($_POST["user"] as $user) {
                            if ($user == 1) {
                                $stu = 1;
                            } else if ($user == 2) {
                                $couc = 1;
                            } else if ($user == 3) {
                                $csc = 1;
                            }


                        }


                    }

                    /*
                     * create postdata array
                     * */

                    $postdata = array(
                        'name' =>  filter_var($_POST['name'],FILTER_SANITIZE_STRING),
                        'sdate' =>  $_POST['sdate'],
                        'enddate' =>  $_POST['enddate'],
                        'starttime'=>$_POST['starttime'],
                        'endtime' => $_POST['endtime'],
                        'student' => filter_var($stu,FILTER_VALIDATE_INT),
                        'coursec' => filter_var($couc,FILTER_VALIDATE_INT),
                        'cscc' => filter_var($csc,FILTER_VALIDATE_INT)
                    );


                    /*
                     * call addevent function to pass postdata to the function
                     *
                     * */
                    $result = addevent($con,$postdata);

                    if ($result=='true'){

                        ?>

                        <script>swal("Added!", "Your have been published a new event successfully")</script>
                        <?php
                    }

                }

                ?>




                <form class="form-horizontal" action="" method="post">
                    <div class="panel panel-default">
                        <div class="panel-body" id="userdata">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Event  Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control"  name="name"  required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Start Date</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group" id="datepicker">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" class="form-control datepicker" name="sdate"  required />
                                    </div>
                                 </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">End Date</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" class="form-control datepicker" name="enddate"  required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Start time</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
                                        <input type="text" class="form-control" id="timepicker1" name="starttime" required  />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">End time</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
                                        <input type="text" class="form-control" id="timepicker2" required name="endtime" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Student</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label class="switch">
                                            <input type="checkbox" name="user[]" id="1"  value="1"/>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Course Coordinators</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label class="switch">
                                            <input type="checkbox" name="user[]" id="1"  value="2"/>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">CSC Coordinators</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label class="switch">
                                            <input type="checkbox" name="user[]" id="1"  value="3"/>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <button class="btn btn-default">Clear Form</button>
                                <button class="btn btn-primary pull-right" name="addevent" >Submit</button>
                            </div>

                        </div>

                    </div>
                </form>
                <div class="panel panel-default">
                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title">Event Detailsl</h3>
                    </div>
                    <div class="panel-body panel-body-table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="display: none;">id</th>
                                <th>Event Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Tags</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $query = mysqli_query($con,"SELECT * FROM events ORDER BY id DESC ");
                            while($row = mysqli_fetch_array($query)){
                            ?>
                            <tr>

                                <td style="display: none;"><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <td>
                                    <?php

                                    if ($row['student']==1)
                                        echo "<span class='label label-info label-form'>Student</span>". "  ";
                                    if ($row['coursec']==1)
                                        echo "<span class='label label-info label-form'>Course Coordinator</span>" . "  ";
                                    if ($row['cscc']==1)
                                        echo "<span class='label label-info label-form'>CSC Coordinator</span>";
                                    ?>

                                </td>

                                <td><a href="deleteevent.php?eventid=<?php echo $row[0]; ?>&name=<?php echo $row[1]; ?>"><button class="btn btn-danger delete">Delete</button></a></td>
                            </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<?php include "components/ad_messagebox.php";?>
<!-- END MESSAGE BOX-->


<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<?php include 'components/ad_foot.php'; ?>


<script>
    $(document).ready(function() {


        $('.datepicker').datepicker();
        $('#timepicker1').timepicker();
        $('#timepicker2').timepicker();

        $('#mycalendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: 'events.xml'
        });
    });

</script>