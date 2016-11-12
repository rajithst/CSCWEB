<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../core/init.php';
require '../core/function/admin.php';
require '../components/adminhead.php'; ?>

</head>
    <body class="nav-md" style="overflow-y:hidden;">
<div class="container body">
    <div class="main_container">
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <?php include '../components/adminmenuprofile.php'; ?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include '../components/adminsidebar.php'; ?>
        </div>
    </div>

    <!-- top navigation -->
<?php include '../components/adminnavbar.php';



?>

        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add New Post</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">

                                <form  action="" method="post" class="form-horizontal form-label-left" >

                                    <div class="form-group">

                                        <label class="control-label col-md-2 col-sm-3" for="first-name">Select User  <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                            <label class="checkbox-inline"><input type="checkbox" value="" name="user[]">Student</label>
                                            <label class="checkbox-inline"><input type="checkbox" value="" name="user[]">Course Coordinator</label>
                                            <label class="checkbox-inline"><input type="checkbox" value="" name="user[]">CSC Coordinator</label>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-3" for="first-name"> Post Subject  <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" id="first-name2" name="subject" required="required" class="form-control col-md-7 col-xs-12" >
                                        </div>
                                    </div>

                                    <br>

                            <div class="form-group">
                                    <textarea name="content" id="textarea" cols="20" rows="10" class="" style="height: 300px"></textarea>
                            </div>

                                    <div class="form-group">
                            <center>


                                <button type="submit" class="btn btn-primary" name="postdata">Post</button>
                            <button type="reset" class="btn btn-primary">Cancel</button>
                            <button id="send" type="submit" class="btn btn-success" name="draft">Draft</button></center>


    </div>
                                </form>




                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>



        <?php include '../components/adminfooter.php'; ?>


        <?php

        $id = $user_data['id'];
        if(isset($_POST['postdata'])){


            if(!empty($_POST["user"]))
            {
                foreach($_POST["user"] as $user)
                {
                    $row[] = $user;
                }


            }

            $date = date("Y/m/d");
            $postdata = array(


                'subject' =>  $_POST['subject'],
                'text' =>  $_POST['content'],
                'adminid'   =>  $id,
                'type' => 1,
                'date'=> $date
            );

            postdata($postdata);  ?>

            <script>swal("Posted!", "Your have benn published a post successfully")</script>
            <?php
            exit();

        }


        if(isset($_POST['draft']) === true) {

            if (!empty($_POST["user"])) {
                foreach ($_POST["user"] as $user) {
                    $row[] = $user;
                }


            }

            $date = date("Y/m/d");
            $id = $user_data['id'];
            $postdata = array(


                'subject' => $_POST['subject'],
                'text' => $_POST['content'],
                'adminid' => $id,
                'type' => 2,
                'date' => $date
            );

            putdraft($postdata); ?>

            <script>swal("Drafted!", "Your have benn Draft a post")</script>
            <?php
            exit();


        }
        ?>


