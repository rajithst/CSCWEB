
<?php include 'components/ad_head.php' ?>


    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <?php include "components/ad_sidebar.php";?>
            <li class="xn-title">Menu</li>
            <li class="active">
                <a href="home.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
            </li>

            <li class="">
                <a href="calander.php"><span class="fa fa-desktop"></span> <span class="xn-text">Calander</span></a>
            </li>

            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
                <ul>
                    <li><a href="post.php"><span class="fa fa-image"></span> New Post</a></li>
                    <li><a href="published.php"><span class="fa fa-user"></span> Published</a></li>
                    <li><a href="draft.php"><span class="fa fa-users"></span> Draft</a></li>

                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                <ul>
                    <li><a href="inbox.php"><span class="fa fa-inbox"></span> Inbox</a></li>

                    <li><a href="compose.php"><span class="fa fa-pencil"></span> Compose</a></li>
                </ul>
            </li>


            <li class="xn-openable">
                <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
                <ul>
                    <li><a href="allusers.php"><span class="fa fa-heart"></span> All Users</a></li>
                    <li><a href="adduser.php"><span class="fa fa-cogs"></span> Add User</a></li>
                    <li><a href="edituser.php"><span class="fa fa-square-o"></span> Edit User</a></li>

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
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
               <?php include "components/ad_xnav.php";?>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START WIDGETS -->
                    <div class="row">

                        <div class="col-md-4">

                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='chat.php';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <!--<div class="widget-data">

                                    <?php
/*                                    $staff = getstaff($con); */?>
                                    <div class="widget-int num-count"><?php /*echo $staff; */?></div>
                                    <div class="widget-title">CSC Staff</div>
                                    <div class="widget-subtitle">On CSC</div>
                                </div>-->
                            </div>
                            <!-- END WIDGET MESSAGES -->

                        </div>
                        <div class="col-md-4">

                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                               <!-- <div class="widget-data">
                                    <?php
/*                                    $students = getRegisteredStudents($con); */?>


                                    <div class="widget-int num-count"><?php /*echo $students; */?></div>
                                    <div class="widget-title">Registred Students</div>
                                    <div class="widget-subtitle">On CSC</div>
                                </div>-->

                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                        <div class="col-md-4">

                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>
                                <div class="widget-subtitle plugin-date">Loading...</div>

                            </div>
                            <!-- END WIDGET CLOCK -->

                        </div>
                    </div>
                    <!-- END WIDGETS -->
                    
                    <div class="row">
                        <div class="col-md-8">
                            
                            <!-- START SALES BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Calander Events</h3>

                                    </div>                                     

                                    
                                </div>
                                <div class="panel-body">                                    
                                    <div class="row stacked">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">

                                                <div class="panel-heading ui-draggable-handle">
                                                    <h3 class="panel-title">Calander Events</h3>
                                                </div>

                                                <div class="panel-body panel-body-table">

                                                    <div class="table-responsive">
                                                        <!--<table class="table table-bordered table-striped table-actions">
                                                            <thead>
                                                            <tr>

                                                                <th width="100" style="display: none;">id</th>
                                                                <th width="100">Event Name</th>
                                                                <th width="100">Current Status</th>
                                                                <th width="100">End Date</th>
                                                                <th width="100">Remaining Days</th>
                                                                <th width="100">Tags</th>
                                                                <th width="100">actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
/*                                                            $query = mysqli_query($con,"SELECT * FROM events ORDER BY id DESC ");
                                                            while($row = mysqli_fetch_array($query)){
                                                            */?>
                                                            <tr id="trow_1">

                                                                <td style="display: none;"><strong><?php /*echo $row[0]; */?></strong></td>
                                                                <td><strong><?php /*echo $row[1]; */?></strong></td>
                                                                <?php
/*                                                                $today = date("Y-m-d");
                                                                $expday= $row[3];
                                                                $today_dt = new DateTime($today);
                                                                $expire_dt = new DateTime($expday);
                                                                if ($expire_dt > $today_dt) {

                                                                */?>
                                                                <td><span class="label label-success">On going</span></td>
                                                                <?php /*} else{ */?>
                                                                    <td><span class="label label-danger">Expired</span></td>
                                                                <?php
/*                                                                }
                                                                */?>

                                                                <td><?php /*echo $row[3]; */?></td>

                                                                <?php
/*
                                                                $now = time();
                                                                $your_date = strtotime($row[3]);
                                                                $datediff = $your_date- $now;

                                                                $remdates= floor($datediff / (60 * 60 * 24));


                                                                */?>
                                                                <td><?php /*echo $remdates; */?></td>

                                                                <td>
                                                                    <?php
/*
                                                                    if ($row['student']==1)
                                                                        echo "<span class='label label-info label-form'>Student</span>". "  ";
                                                                    if ($row['coursec']==1)
                                                                        echo "<span class='label label-info label-form'>Course Coordinator</span>" . "  ";
                                                                    if ($row['cscc']==1)
                                                                        echo "<span class='label label-info label-form'>CSC Coordinator</span>";
                                                                    */?>

                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                                                    <a href="deleteevents.php?eventid=<?php /*echo $row[0]; */?>&name=<?php /*echo $row[1]; */?>"><button class="btn btn-danger btn-rounded btn-sm" ><span class="fa fa-times"></span></button></a>
                                                                </td>
                                                            </tr>

                                                            <?php /*} */?>
                                                            </tbody>
                                                        </table>-->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END SALES BLOCK -->

                        </div>
                        <div class="col-md-4">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Courses</h3>
                                        <span>Ongoing Courses</span>
                                    </div>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                       <!-- <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="50%">Course</th>
                                                    <th width="20%">Status</th>
                                                    <th width="30%">Days</th>
                                                    <th width="30%">Current Batch</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
/*                                            $query = mysqli_query($con,"SELECT * FROM subjects WHERE active=1 ");
                                            while($row = mysqli_fetch_array($query)){
                                            */?>

                                                <tr>
                                                    <td><strong><?php /*echo $row[2]; */?></strong></td>
                                                    <td><span class="label label-success">Running</span></td>
                                                    <td><?php /*echo $row[6]; */?></td>
                                                    <td><?php /*echo $row[7]; */?></td>
                                                </tr>
                                            <?php /*} */?>

                                            </tbody>
                                        </table>-->
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                    </div>
                    <!-- END DASHBOARD CHART -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
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

