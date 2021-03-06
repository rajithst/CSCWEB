<?php include 'components/admust.php' ?>
<?php include 'components/ad_head.php';
ob_start();		
?>
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

                        <a href="#" class="list-group-item">Posts Will display on Selected users newsfeed</a>
                        <a href="published.php" class="list-group-item"><span class="fa fa-flag"></span>Published</a>
                        <a href="draft.php" class="list-group-item"><span class="fa fa-flag"></span>Draft</a>


                    </div>
                </div>

            </div>
            <!-- END CONTENT FRAME LEFT -->

            <!-- START CONTENT FRAME BODY -->
            
            <?php 
            if ( empty($_GET['mode'])==FALSE){
            	
            	$id = $_GET['id'];
            	$res = readpost($con,$id);
            	$data = mysqli_fetch_array($res); ?>
            	
            	
            	<div class="content-frame-body">
                <div class="block">
                    <form role="form" class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Student:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" name="user[]" id="1"  value="1"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">CSC Coordinator:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" name="user[]"  value="2" id="2"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Course Coordinator:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" name="user[]"  value="3" id="3"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Subject:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="subject" required value="<?php echo $data[2]; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                    <textarea class="summernote_email" required name="content" value="">
                                    <?php echo htmlspecialchars_decode($data[3]); ?>
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <button class="btn btn-default" name="draft"><span class="fa fa-trash-o"></span> Move to Draft</button>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger" type="submit" name="postdata"><span class="fa fa-envelope"></span> Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            	
            	
            	
            	<?php 
            }
            
            
            
            ?>
            
            
            <div class="content-frame-body">
                <div class="block">
                    <form role="form" class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Student:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" name="user[]" id="1"  value="1"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">CSC Coordinator:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" name="user[]"  value="2" id="2"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Course Coordinator:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" name="user[]"  value="3" id="3"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Subject:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="subject" required value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                    <textarea class="summernote_email" required name="content">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <button class="btn btn-default" name="draft"><span class="fa fa-trash-o"></span> Move to Draft</button>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger" type="submit" name="postdata"><span class="fa fa-envelope"></span> Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>



            <?php

            $id = $user_data['id'];
            if(isset($_POST['postdata'])) {

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

                $date = date("Y/m/d");
                $postdata = array(


                    'subject' => filter_var($_POST['subject'],FILTER_SANITIZE_STRING),
                    'text' => htmlspecialchars($_POST['content']),
                    'student' => filter_var($stu,FILTER_VALIDATE_INT),
                    'coursec' => filter_var($couc,FILTER_VALIDATE_INT),
                    'cscc' => filter_var($csc,FILTER_VALIDATE_INT),
                    'adminid' => filter_var($id,FILTER_VALIDATE_INT),
                    'type' => 1,
                    'date' => $date
                );
				
                	
                $confim = postdata($con,$postdata);
                

                if ($_GET['mode'] == "edit"){
                	
                	$postid = $_GET['id'];
                
                	$confim = postdraftedited($con,$postdata,$postid);
                	
                	if ($confim=='true') {
                		?>
                	
                	                  	<script>swal("Posted!", "Your have benn published a post successfully")</script>
                	                    <?php
                	                    
                	                    header('location:published.php');
                	                    ob_end_flush();
                	
                	            		}
                
                }
              
                
               if ($confim=='true') {
                    ?>

                  	<script>swal("Posted!", "Your have benn published a post successfully")</script>
                    <?php

            		}
            
            }
            


            if(isset($_POST['draft']) === true) {

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

                $date = date("Y/m/d");
                $id = $user_data['id'];
                $postdata = array(


                    'subject' => filter_var($_POST['subject'],FILTER_SANITIZE_STRING),
                    'text' => htmlspecialchars($_POST['content']),
                    'student' => filter_var($stu,FILTER_VALIDATE_INT),
                    'coursec' => filter_var($couc,FILTER_VALIDATE_INT),
                    'cscc' => filter_var($csc,FILTER_VALIDATE_INT),
                    'adminid' => filter_var($id,FILTER_VALIDATE_INT),
                    'type' => 0,
                    'date' => $date
                );

                $confirm = putdraft($con,$postdata);
                
                
                
                if ($_GET['mode'] == "edit"){
                	 
                	$postid = $_GET['id'];
                
                	$confim = savedraftedited($con,$postdata,$postid);
                	 
                	if ($confim =='true') {
                		?>
                                	
                                	                  	<script>swal("Drafted!", "Your have been save this post to Draft")</script>
                                	                    <?php
                                	                    
                                	                    header('location:draft.php');
                                	                    ob_end_flush();
                                	
                                	            		}
                                
                                }
                
                
                
             
                if ($confirm == 'true') {

                    ?>

                    <script>swal("Drafted!", "Your have benn Draft a post")</script>
                    <?php
                }
                


            }
            ?>
        </div>
    </div>

</div>

<?php include "components/ad_messagebox.php";?>

<?php include 'components/ad_foot.php'; ?>





