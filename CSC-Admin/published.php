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

                <?php include "components/ad_xnav.php";?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Posts</a></li>
                    <li class="active">Published</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Published Posts</h2>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Published Posts</h3>

                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th style="display: none;">id</th>
                                                <th>Published By</th>
                                                <th>Post Title</th>
                                                <th>Date</th>
                                                <th>Category</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $result=published($con);

                                        while($row = $result->fetch_assoc()) {
                                        $adminid =  $row['adminid'];
                                        $adname = adminusers($con,$adminid);
                                        $res = mysqli_fetch_array($adname);
                                        $name = $res[1]; ?>

                                        <tr>
                                            <td style="display: none;"><?php echo $row['id']; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><a href="readpost.php?id=<?php echo $row['id']; ?>"><?php echo $row['subject']; ?></a></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php

                                                if ($row['student']==1)
                                                echo "<span class='label label-info label-form'>Student</span>". "  ";
                                                if ($row['coursec']==1)
                                                    echo "<span class='label label-info label-form'>Course Coordinator</span>" . "  ";
                                                if ($row['cscc']==1)
                                                    echo "<span class='label label-info label-form'>CSC Coordinator</span>";
                                                ?></td>
                                            <td><button class="btn btn-danger delete" id="<?php echo $row['id']; ?>">Delete</button> </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->



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

    $(document).ready(function () {
    	var postid;
        $('button.delete').click(function () {
        	 var postid = this.id;

        	swal({
        	  title: 'Are you sure?',
        	  text: "You won't be able to revert this!",
        	  type: 'warning',
        	  showCancelButton: true,
        	  confirmButtonColor: '#3085d6',
        	  cancelButtonColor: '#d33',
        	  confirmButtonText: 'Yes, delete it!',
        	  cancelButtonText: 'No, cancel!',
        	  confirmButtonClass: 'btn btn-success',
        	  cancelButtonClass: 'btn btn-danger',
        	  buttonsStyling: false
        	}).then(function () {


               
                console.log(postid);

                $.ajax({

                    url:"deletepost.php?id="+postid,
                    type:"GET",
                    success:function (data) {
                        if(data){
                        	 swal(
                               	    'Deleted!',
                               	    'Your file has been deleted.',
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
        	      'Your ipost is safe',
        	      'error'
        	    )
        	  }
        	})



        });

    });
</script>



