
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
    <li class=""><a href="chat.php"><span class="fa fa-comments"></span> Messages</a></li>

    <li class="xn-openable ">
        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
        <ul>
            <li class=""><a href="allusers.php"><span class="fa fa-heart"></span> All Users</a></li>
            <li><a href="adduser.php"><span class="fa fa-cogs"></span> Add User</a></li>
            <li><a href="edituser.php"><span class="fa fa-square-o"></span> Edit User</a></li>

        </ul>
    </li>

    <li class="active">
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
        <li class="active">All</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> All Users</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
       <div class="row">

           <div class="col-md-12">
               <div class="panel panel-default">

        
     

                   <div class="panel-heading">
                       <h3 class="panel-title">Select export Type</h3>
                   </div>

                   <div class="panel-body" id="exportTable" style="display: ;">
                   <div class="row">
                       <div class="col-md-3">
                           <div class="list-group border-bottom">
                               Backup current Database as SQL file

                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="list-group border-bottom">

                               <a href="sqldump.php" class="list-group-item" onClick =""><img src='img/icons/sql.png' width="24"/> SQL</a>
                           </div>
                       </div>

                   </div>
                
               </div>

           </div>
           
           
                  <div class="row">

           <div class="col-md-12">
               <div class="panel panel-default">

        
     

                   <div class="panel-heading">
                       <h3 class="panel-title">Import Data</h3>
                   </div>

                   <div class="panel-body" id="exportTable" style="display: ;">
                   <div class="row">
                       <div class="col-md-3">
                           <div class="list-group border-bottom">
                            
                               <a href="" class="list-group-item" onClick ="event.preventDefault();"><img src='img/icons/sql.png' width="24"/> SQL</a>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="list-group border-bottom">
                           
                   <form action="upload.php" method="post" enctype="multipart/form-data">
                         <input class="fileinput" name="fileToUpload" id="" style="left: -168.667px; top: 7.39999px;" type="file">
 						<input type="submit" value="upload">
                                          
                   </form>      
                   
                    
                           </div>
                       </div>
                       
                            <div class="col-md-3">
                           <div class="list-group border-bottom">
                           
                  <div class="alert alert-danger">
  <strong>Warning!</strong> <br> importing data to current database will overwritten all the tables in the database.this action cannot be reverse!!!
</div>
                    
                           </div>
                       </div>
              
                   </div>
                
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


