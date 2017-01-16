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

    <li class="">
        <a href="calander.php"><span class="fa fa-desktop"></span> <span class="xn-text">Calander</span></a>
    </li>

    <li class="xn-openable active">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
        <ul>
            <li><a href="post.php"><span class="fa fa-image"></span> New Post</a></li>
            <li class="active"><a href="published.php"><span class="fa fa-user"></span> Published</a></li>
            <li class=""><a href="draft.php"><span class="fa fa-users"></span> Draft</a></li>

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

    <div class="content-frame">
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">
            <div class="page-title">
                <h2><span class="fa fa-file-text"></span> Read Post</h2>
            </div>

        </div>
        <!-- END CONTENT FRAME TOP -->

        <!-- START CONTENT FRAME LEFT -->
        <div class="content-frame-left" style="height: 796px;">
            <div class="block">
                <a href="post.php" class="btn btn-danger btn-block btn-lg"><span class="fa fa-edit"></span> COMPOSE</a>
            </div>
        </div>
        <!-- END CONTENT FRAME LEFT -->


        <?php
        $id = $_GET['id'];
        $res = readpost($con,$id);
        $ro = mysqli_fetch_array($res);
        $adminid = $ro[1];

        $ad = admindataforposts($con,$adminid);
       ?>

        <div class="content-frame-body" style="height: 856px;">

            <div class="panel panel-default">

                <?php
                while($rowsi = mysqli_fetch_assoc($ad)) {
                ?>
                <div class="panel-heading ui-draggable-handle">
                    <div class="pull-left">
                        <img src="<?php echo $rowsi['profile']; ?>" class="panel-title-image" alt="John Doe">
                        <h3 class="panel-title"><?php echo $rowsi['name']; ?> <small><?php echo $rowsi['email']; ?></small></h3>
                    </div>
                </div>
                <?php } ?>
                <div class="panel-body">
                    <h3><?php echo $ro[2]; ?> <small class="pull-right text-muted"><span class="fa fa-clock-o"></span> <?php echo $ro[9]; ?> ,<?php echo $ro[8]; ?> </small></h3>
                    <p><?php echo htmlspecialchars_decode($ro[3]); ?></p>

                </div>
                <div class="panel-body panel-body-table">
                    <h6>Tags</h6>
                    <?php

                    if ($ro[4]==1)
                        echo "<span class='label label-info label-form' style='margin-left: 10px; margin-bottom: 20px;'>Student</span>". "  ";
                    if ($ro[5]==1)
                        echo "<span class='label label-info label-form'>Course Coordinator</span>" . "  ";
                    if ($ro[6]==1)
                        echo "<span class='label label-info label-form'>CSC Coordinator</span>";
                    ?>
                </div>
            </div>
        </div>
        <?php /*} */?>
        <!-- END CONTENT FRAME BODY -->
    </div>

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

