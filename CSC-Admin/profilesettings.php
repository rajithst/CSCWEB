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
            <li class=""><a href="published.php"><span class="fa fa-user"></span> Published</a></li>
            <li class="active"><a href="draft.php"><span class="fa fa-users"></span> Draft</a></li>

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
        <li class="active">Dtaft</li>
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
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-body profile" style="background-color:#000000; ">
                        <div class="profile-image">
                            <img src="<?php echo $user_data['profile']; ?>" alt="Nadia Ali"/>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?php echo $user_data['name']; ?></div>
                            <div class="profile-data-title" style="color: #FFF;"><?php echo $user_data['role']; ?></div>
                        </div>

                    </div>
                    <div class="panel-body">
                        <form action="profileimage.php" method="post" enctype="multipart/form-data" id="myform">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" value="upload image" name="profile">
                            </div>
                            <div class="col-md-6">


                                <button class="btn btn-info btn-rounded btn-block " type="submit"> <span class="fa fa-check"></span> Change profile picture</button>
                            </div>

                        </div>

                        </form>
                    </div>

                </div>

            </div>

            <div class="col-md-9">

                    <form class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Profile Settings</strong> </h3>
                            </div>
                            <div class="panel-body form-group-separated">

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Email</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input  class="form-control" type="email" value="<?php echo $user_data['email']; ?>">
                                        </div>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Password</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input class="form-control"  value="2017" type="password" value="<?php echo $user_data['password']; ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Name</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input  class="form-control" type="name" value="<?php echo $user_data['name']; ?>">
                                        </div>

                                    </div>
                                </div>



                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default" disabled="">Clear Form</button>
                                <button class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                    </form>

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


        $('button.publish').click(function () {
            var postid = this.id;

            swal({
                title: 'Are you sure?',
                text: "You won't to publish this post",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, publish it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {



                console.log(postid);

                $.ajax({

                    url:"publishpost.php?id="+postid,
                    type:"GET",
                    success:function (data) {
                        if(data){
                            swal(
                                'published!',
                                'Your post has been publihsed.',
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
                        'Your post is safe',
                        'error'
                    )
                }
            })



        });

    });
</script>



