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

    <li class="xn-openable active">
        <a href=""><span class="fa fa-user"></span> <span class="xn-text">System Settings</span></a>
        <ul>
            <li><a href="profilesettings.php"><span class="fa fa-heart"></span> Profile Setings</a></li>
            <li class="active"><a href="generalsettings.php"><span class="fa fa-cogs"></span> General Settings</a></li>

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
        <h2><span class="fa fa-arrow-circle-o-left"></span> General Settings</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">


            <div class="row">
                <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading ui-draggable-handle">
                                <h3 class="panel-title"><strong>Change Course Coordinator subject enrolement</strong></h3>

                            </div>
                            <div class="panel-body">
                                <p><strong>Select Course Coordinater to view the current enroled subjects.</strong></p>
                                <div class="row">
                                    <form action="" method="post">
                                    <div class="col-md-4">

                                        <div class='form-group'>
                                            <label class='col-md-3 col-xs-12 control-label'>Course Coordinator</label>
                                            <div class='col-md-6 col-xs-12'>
                                                <select class='form-control select' name='coursecid' id="subs">
                                                    <option value="">--SELECT COURSE COORDINATOR--</option>
                                                    <?php
                                                    $subs = getcoursecodinators($con);

                                                    while ($data = $subs->fetch_assoc()) {

                                                    echo "<option value='" . $data['id'] . "'>" . $data['first_name'] . " " . $data['last_name'] . "</option>";

                                                   } ?>
                                                   </select>
                                            </div>
                                        </div>



                                    </div>


                                    <?php

                                    if (isset($_POST['submit'])){

                                        $ccid=$_POST['subs'];


                                    if (!empty($_POST["user"])) {
                                        foreach ($_POST["user"] as $user) {

                                           $sql = "UPDATE sujects SET coursecid=$ccid WHERE subjectid='$user'";
                                           echo $sql.'<br>';


                                        }


                                    }

                                    }

                                    ?>
                                    <div class="col-md-8" id="subs">



                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>Enrole Statement</th>

                                            </tr>
                                            </thead>

                                            <tbody id="subs">

                                            </tbody>
                                        </table>

                                            <div class="panel-footer">
                                                <button class="btn btn-default">Clear Form</button>
                                                <button class="btn btn-primary pull-right" type="submit" name="submit">Submit</button>
                                            </div>



                                    </div>

                                    </form>
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

<script>
    $(document).ready(function () {

        $('#subs').change(function () {

            cid = $( "#subs option:selected" ).val();

            $.ajax({

                url:'getenroledsubs.php?cid='+cid,
                type:"GET",
                success:function (data) {
                    $('tbody#subs').html("");
                    $('tbody#subs').html(data);


                }


            });


        });

    });
</script>



