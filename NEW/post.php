<?php include 'components/admust.php' ?>
<?php include 'components/ad_head.php' ?>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">


    <!-- START PAGE SIDEBAR -->
    <?php include "components/ad_sidebar.php";?>
    <!-- END PAGE SIDEBAR -->
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
            <li class="active"><a href="post.php"><span class="fa fa-image"></span> New Post</a></li>
            <li><a href="published.php"><span class="fa fa-user"></span> Published</a></li>
            <li><a href="draft.php"><span class="fa fa-users"></span> Draft</a></li>

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
    <li class=""><a href="chat.php"><span class="fa fa-comments"></span> Messages</a></li>

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


        <!-- START X-NAVIGATION VERTICAL -->
        <?php include "components/ad_xnav.php";?>
        <!-- END X-NAVIGATION VERTICAL -->


        <!-- START BREADCRUMB -->
        <ul class="breadcrumb push-down-0">
            <li><a href="#">Home</a></li>
            <li><a href="#">Mailbox</a></li>
            <li class="active">Compose</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- START CONTENT FRAME -->
        <div class="content-frame">
            <!-- START CONTENT FRAME TOP -->
            <div class="content-frame-top">
                <div class="page-title">
                    <h2><span class="fa fa-pencil"></span> Compose</h2>
                </div>

            </div>
            <!-- END CONTENT FRAME TOP -->

            <!-- START CONTENT FRAME LEFT -->
            <div class="content-frame-left">
                <div class="block">

                    <div class="list-group border-bottom">

                        <a href="#" class="list-group-item"><span class="fa fa-flag"></span>Mail list</a>
                        <a href="#" class="list-group-item"><span class="fa fa-flag"></span>Mail list</a>
                        <a href="#" class="list-group-item"><span class="fa fa-flag"></span>Mail list</a>
                        <a href="#" class="list-group-item"><span class="fa fa-flag"></span>Mail list</a>

                    </div>
                </div>

            </div>
            <!-- END CONTENT FRAME LEFT -->

            <!-- START CONTENT FRAME BODY -->
            <div class="content-frame-body">
                <div class="block">
                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Student:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" checked value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">CSC Coordinator:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" checked value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Course Coordinator:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" checked value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group hidden" id="mail-cc">
                            <label class="col-md-2 control-label">Cc:</label>
                            <div class="col-md-10">
                                <input type="text" class="tagsinput" value="" data-placeholder="add email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Subject:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="Re: Lorem ipsum dolor sit amet"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                    <textarea class="summernote_email" placeholder="message herr">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger"><span class="fa fa-envelope"></span> Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- END CONTENT FRAME BODY -->
        </div>
        <!-- END CONTENT FRAME -->

    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<?php include "components/ad_messagebox.php";?>
<!-- END MESSAGE BOX-->


<!-- START SCRIPTS -->
<?php include 'components/ad_foot.php'; ?>





