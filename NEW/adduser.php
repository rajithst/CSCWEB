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
            <li><a href="compose.php"><span class="fa fa-image"></span> New Post</a></li>
            <li class=""><a href="published.php"><span class="fa fa-user"></span> Published</a></li>
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

    <li class="xn-openable active">
        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
        <ul>
            <li><a href="allusers.php"><span class="fa fa-heart"></span> All Users</a></li>
            <li class="active"><a href="adduser.php"><span class="fa fa-cogs"></span> Add User</a></li>
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
        <li><a href="#">Users</a></li>
        <li class="active">Add User</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Add New User</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
            
            
            
            
            <?php 
            
           
               if(isset($_POST['adduser']) === true){
										$password = 'csc';
                                        $postdata = array(
                                            'first_name' =>  filter_var($_POST['first_name'],FILTER_SANITIZE_STRING),
                                            'last_name' =>  filter_var($_POST['last_name'],FILTER_SANITIZE_STRING),
                                            'email' =>  filter_var($_POST['email'],FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL),
                                        	'telephone'=>preg_replace('/[^0-9]/', '', $_POST['telephone']),
                                            'address' => filter_var($_POST['address'],FILTER_SANITIZE_STRING),
                                        	'password'=>md5($password),
                                            'role' => $_POST['role']
                                        );

                                        $result = adduser($con,$postdata); 
                                        
                                        if ($result=='true'){
                                        ?>
                                    <script>swal("Added!", "Your have benn added a user successfully")</script>

                                        <?php
                                        
                                        }
                                        
                                        }

                                        ?>
                                        

                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control" name="first_name" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control" name="last_name" required/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">E-mail</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="email" class="form-control" name="email" required/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Telephone</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                        <input type="text" class="form-control" name="telephone" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Address</label>
                                <div class="col-md-6 col-xs-12">
                                    <textarea class="form-control" rows="5" name="address" required></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Select Role</label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control select" name="role" required>
                                        <option value="CSC Staff">CSC Staff</option>
                                        <option value="CSC Cordinator">CSC Coordinator</option>
                                        <option value="Course Coordinator">Course Coordinator</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label"> Default Password </label>
                                <div class="col-md-6 col-xs-12">
                                    <label class="check"><strong>csc</strong></label>

                                </div>
                            </div>


                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-default" type="reset">Clear Form</button>
                            <button class="btn btn-primary pull-right" type="submit" name="adduser">Submit</button>
                        </div>
                    </div>
                </form>

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





