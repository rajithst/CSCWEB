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

            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
                <ul>
                    <li><a href="compose.php"><span class="fa fa-image"></span> New Post</a></li>
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
            <li class="active"><a href="chat.php"><span class="fa fa-comments"></span> Messages</a></li>

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
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li class="active">Messages</li>
                </ul>
                <!-- END BREADCRUMB -->                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">                                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-comments"></span> Messages</h2>
                        </div>                                                    
                        <div class="pull-right">                            
                            <button class="btn btn-danger"><span class="fa fa-book"></span> Contacts</button>
                            <button class="btn btn-default content-frame-right-toggle"><span class="fa fa-bars"></span></button>
                        </div>                           
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME RIGHT -->
                    <div class="content-frame-right">
                        <?php
                        $res = allusers($con);
                        while ($row = mysqli_fetch_assoc($res)) { ?>

                        <div class="list-group list-group-contacts border-bottom push-down-10 chatdiv " id="<?php echo $row['id']; ?>">
                            <a href="#" class="list-group-item">                                 
                                <div class="list-group-status status-online"></div>
                                <img src="<?php echo $row['profile']; ?>" class="pull-left" alt="Dmitry Ivaniuk">
                                <span class="contacts-title"><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                <p><?php echo $row['role']; ?></p>
                            </a>                                

                        </div>
                        <?php } ?>

                        
                    </div>
                    <!-- END CONTENT FRAME RIGHT -->
                
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body content-frame-body-left" id="aa">
                        
                        <div class="messages messages-img" id="chatbody">
                            
                        </div>                        
                        
                        <div class="panel panel-default push-up-10">
                            <div class="panel-body panel-body-search">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default"><span class="fa fa-camera"></span></button>
                                        <button class="btn btn-default"><span class="fa fa-chain"></span></button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Your message..."/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- END CONTENT FRAME BODY -->      
                </div>
                <!-- END PAGE CONTENT FRAME -->
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

$(document).ready(function(){
		var userid;
	$('div.chatdiv').click(function(){
		userid = this.id;
	     $.ajax({
             type: 'get',
             url: 'getmessages.php?id=' + userid + '&adminid=' +<?php echo $user_data['id']; ?>,
             success: function (data) {
                 $('div#aa>div#chatbody').html("");
                 $('div#aa>div#chatbody').html(data);

             }

         });
	})

	
});
</script>




