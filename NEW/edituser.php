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
    <li class=""><a href="chat.php"><span class="fa fa-comments"></span> Messages</a></li>

    <li class="xn-openable active">
        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
        <ul>
            <li><a href="allusers.php"><span class="fa fa-heart"></span> All Users</a></li>
            <li><a href="adduser.php"><span class="fa fa-cogs"></span> Add User</a></li>
            <li class="active"><a href="edituser.php"><span class="fa fa-square-o"></span> Edit User</a></li>

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
        <h2><span class="fa fa-arrow-circle-o-left"></span> Draft Posts</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">

        <div class="col-md-6">

            <!-- CONTACTS WITH CONTROLS -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Users</h3>
                </div>
            <?php
                $result=allusers($con);
                while($row = $result->fetch_assoc()) { ?>
                <div class="panel-body list-group list-group-contacts">
                    <a href="#" class="list-group-item">
                        <img src="<?php echo $row['profile']; ?>" class="pull-left" alt="Nadia Ali"/>
                        <span class="contacts-title"><?php echo  $row["first_name"] . " ".  $row["last_name"]; ?></span>
                        <p><?php echo $row['role']; ?></p>
                        <div class="list-group-controls">
                            <button class="btn btn-warning edit" id="<?php echo $row['id']; ?>"><span class="fa fa-pencil"></span></button>
                            <button class="btn btn-danger delete" id="<?php echo $row['id']; ?>"><span class="fa fa-minus"></span></button>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
            <!-- END CONTACTS WITH CONTROLS -->

        </div>
            <div class="col-md-6">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Edit User Details Here</h3>
                </div>
                    <form class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-body" id="userdata">

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                            <input type="text" class="form-control" readonly/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                            <input type="text" class="form-control" readonly/>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">E-mail</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                            <input type="text" class="form-control" readonly/>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Telephone</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                            <input type="text" class="form-control" readonly/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Address</label>
                                    <div class="col-md-6 col-xs-12">
                                        <textarea class="form-control" rows="5" readonly> </textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Select Role</label>
                                    <div class="col-md-6 col-xs-12">
                                        <select class="form-control select" disabled>
                                            <option value="CSC Staff">CSC Staff</option>
                                            <option value="CSC Cordinator">CSC Coordinator</option>
                                            <option value="Course Coordinator">Course Coordinator</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Set Default Password </label>
                                    <div class="col-md-6 col-xs-12">
                                        <label class="check"><input type="checkbox" class="icheckbox" disbaled/>Password (csc)</label>

                                    </div>
                                </div>


                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default">Clear Form</button>
                                <button class="btn btn-primary pull-right" disabled>Submit</button>
                            </div>
                        </div>
                    </form>

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

$(document).ready(function () {
	var postid;
    $('button.edit').click(function () {
    	 var postid = this.id;

            $.ajax({

                url:"getuserdata.php?id="+postid,
                type:"GET",
                success:function (data) {
                    if(data){

                        $('div#userdata').html("");
                        $('div#userdata').html(data);
                    
                    	
                    }
                }

            })



    });


    $('button.delete').click(function () {
   	 var postid = this.id;

   	swal({
   	  title: 'Are you sure?',
   	  text: "You won't to delete this user",
   	  type: 'warning',
   	  showCancelButton: true,
   	  confirmButtonColor: '#3085d6',
   	  cancelButtonColor: '#d33',
   	  confirmButtonText: 'Yes, Delete it!',
   	  cancelButtonText: 'No, cancel!',
   	  confirmButtonClass: 'btn btn-success',
   	  cancelButtonClass: 'btn btn-danger',
   	  buttonsStyling: false
   	}).then(function () {

           $.ajax({

               url:"deleteuser.php?id="+postid,
               type:"GET",
               success:function (data) {
                   if(data){
                   	 swal(
                          	    'Deleted!',
                          	    'This user has been removed.',
                          	    'success'
                          	  )
                   	setTimeout(
                   			  function() 
                   			  {
                   				 
                                     location.reload();
                   			  }, 2000);
                   	
                   }
               }

           })


       	
   	  
   	}, function (dismiss) {

   	  if (dismiss === 'cancel') {
   	    swal(
   	      'Cancelled',
   	      'User is not deleted',
   	      'error'
   	    )
   	  }
   	})



   });  

});
</script>



