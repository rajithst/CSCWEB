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

    <li class="xn-openable ">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
        <ul>
            <li><a href="post.php"><span class="fa fa-image"></span> New Post</a></li>
            <li class=""><a href="published.php"><span class="fa fa-user"></span> Published</a></li>
            <li class=""><a href="draft.php"><span class="fa fa-users"></span> Draft</a></li>

        </ul>
    </li>
    <li class="xn-openable active">
        <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
        <ul>
            <li class="active"><a href="inbox.php"><span class="fa fa-inbox"></span> Inbox</a></li>

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
        <li><a href="#">Mailbox</a></li>
        <li class="active">inbox</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Inbox</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
                <div class="content-frame">
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">
                        <div class="page-title">
                            <h2><span class="fa fa-inbox"></span> Inbox</h2>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME TOP -->

                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
                        <div class="block">
                            <a href="pages-mailbox-compose.html" class="btn btn-danger btn-block btn-lg"><span class="fa fa-edit"></span> COMPOSE</a>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME LEFT -->

                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">

                        <div class="panel panel-default">
                            <div class="panel-body mail">

                                <div class="mail-item mail-unread mail-info">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">Dmitry Ivaniuk</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">Product development</a>
                                    <div class="mail-date">Today, 11:21</div>
                                </div>

                                <div class="mail-item mail-unread mail-danger">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">John Doe</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">New Windows 9 App</a>
                                    <div class="mail-date">Today, 10:36</div>
                                </div>

                                <div class="mail-item mail-success">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">Nadia Ali</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">Check my new song</a>
                                    <div class="mail-date">Yesterday, 20:19</div>
                                </div>

                                <div class="mail-item mail-warning">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star starred">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">Brad Pitt</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">How are you? Need some work?</a>
                                    <div class="mail-date">Sep 15</div>
                                </div>

                                <div class="mail-item mail-info">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">Dmitry Ivaniuk</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">Can you check this docs?</a>
                                    <div class="mail-date">Sep 14</div>
                                    <div class="mail-attachments">
                                        <span class="fa fa-paperclip"></span> 11Kb
                                    </div>
                                </div>

                                <div class="mail-item">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star starred">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">HTC</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">New updates on your phone HD7</a>
                                    <div class="mail-date">Sep 13</div>
                                    <div class="mail-attachments">
                                        <span class="fa fa-paperclip"></span> 58Mb
                                    </div>
                                </div>

                                <div class="mail-item mail-unread">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">Unknown</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">You won $15,000,000</a>
                                    <div class="mail-date">Sep 13</div>
                                </div>

                                <div class="mail-item mail-success">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">Nadia Ali</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">Your tickets</a>
                                    <div class="mail-date">Sep 11</div>
                                    <div class="mail-attachments">
                                        <span class="fa fa-paperclip"></span> 1.2Mb
                                    </div>
                                </div>

                                <div class="mail-item mail-info">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">Dmitry Ivaniuk</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">New bug founded</a>
                                    <div class="mail-date">Sep 11</div>
                                </div>

                                <div class="mail-item">
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user">Darth Vader</div>
                                    <a href="pages-mailbox-message.html" class="mail-text">Where drawings of the new spaceship?</a>
                                    <div class="mail-date">Sep 10</div>
                                </div>

                            </div>
                            <div class="panel-footer">

                                <button class="btn btn-default"><span class="fa fa-warning"></span></button>
                                <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>

                                <ul class="pagination pagination-sm pull-right">
                                    <li class="disabled"><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- END CONTENT FRAME BODY -->
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




