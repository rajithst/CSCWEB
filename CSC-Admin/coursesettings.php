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

    <li class="active">
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
        <li><a href="#">Course Settings</a></li>

    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Course Settings</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">

            <div class="col-md-6">

                <form role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Select Course</label>
                        <div class="col-md-9">
                            <select class="form-control select" id="subs">
                                <option>--SELECT COURSE--</option>
                                <?php
                                $subs = getsubjects($con);

                                while ( $subjects = $subs->fetch_assoc()){ ?>

                                <option value="<?php echo $subjects['id']; ?>"><?php echo $subjects['subject']; ?></option>

                                <?php	}



                                ?>
                                </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6" id="fromdata">

                <?php

               if (isset($_POST['update'])){

                   $id = $_POST['id'];


                   if (empty($_POST['checkval']) === true){

                       $_POST['checkval'] = 0;
                   }
                   $postdata = array(


                       'subject' => filter_var($_POST['subject'],FILTER_SANITIZE_STRING),
                       'batch' =>$_POST['batch'],
                       'coursecid' => $_POST['coursecid'],
                       'active' => $_POST['checkval'],
                       'year' =>  $_POST['year'],
                   );


                   $confim = updatedata($con,$postdata,$id);
                   if ($confim=='true') {
                       ?>

                       <script>swal("Updated!", "Course details updated")</script>
                       <?php

                   }

               }




                ?>

                <form class='form-horizontal'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'><strong>Course Settings</strong> </h3>
                        </div>
                        <div class='panel-body form-group-separated'>

                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Course Name</label>
                                <div class='col-md-6 col-xs-12'>
                                    <div class='input-group'>
                                        <span class='input-group-addon'><span class='fa fa-pencil'></span></span>
                                        <input type='text' readonly class='form-control'/ >
                                    </div>

                                </div>
                            </div>


                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Curent Year</label>
                                <div class='col-md-6 col-xs-12'>
                                    <div class='input-group'>
                                        <span class='input-group-addon'><span class='fa fa-calendar'></span></span>
                                        <input type='text' class='form-control' readonly value='<?php echo date('Y'); ?>'>
                                    </div>

                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Batch Number</label>
                                <div class='col-md-6 col-xs-12'>
                                    <div class='input-group'>
                                        <span class='input-group-addon'><span class='fa fa-pencil'></span></span>
                                        <input type='number' readonly class='form-control'/>
                                    </div>

                                </div>
                            </div>


                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Course Coordinator</label>
                                <div class='col-md-6 col-xs-12'>
                                    <select class='form-control select'>
                                        <option value="">--SELECT--</option>
                                    </select>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Current Status</label>
                                <div class='col-md-6 col-xs-12'>
                                    <div class='input-group'>

                                        <button class='btn btn-info btn-block' disabled>Status</button>
                                    </div>

                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Mark as Active course</label>
                                <div class='col-md-6 col-xs-12'>
                                    <label class='check'><input type='checkbox' class='icheckbox' disabled checked='checked'/> Set Active</label>
                                    <span class='help-block'>This action will set as currently running Course</span>
                                </div>
                            </div>

                        </div>
                        <div class='panel-footer'>
                            <button class='btn btn-default' disabled>Clear Form</button>
                            <button class='btn btn-primary pull-right' disabled>Submit</button>
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
<?php include 'components/ad_foot.php'; ?>

<script>
    $(document).ready(function () {

        $('#subs').change(function () {

            cid = $( "#subs option:selected" ).val();

            $.ajax({

                url:'getsubsdata.php?cid='+cid,
                type:"GET",
                success:function (data) {
                    $('#fromdata').html("");
                    $('#fromdata').html(data);

                }


            });


        });

    });
</script>



