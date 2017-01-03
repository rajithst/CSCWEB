<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../core/init.php';
require '../core/function/admin.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard</title>


    <link href="../public/css/custom.css" rel="stylesheet">
    <link href="../public/fontawesome/css/font-awesome.css" rel="stylesheet">
    <link href="../public/plugins/sweealert/sweetalert.css" rel="stylesheet">
    <link href="../public/dist/css/adminfull.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../public/plugins/dt/dataTables.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/plugins/monthly/monthly.css" />



    <script src="../public/plugins/jQuery/jquery.js"></script>
    <script src="../public/plugins/sweealert/sweetalert.min.js"></script>
    <script src="../public/plugins/monthly/monthly.js"></script>



    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

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
                                            <label class="checkbox-inline"><input type="checkbox" value="1" name="user[]" id="1" >Student</label>
                                            <label class="checkbox-inline"><input type="checkbox" value="2" name="user[]" id="2">Course Coordinator</label>
                                            <label class="checkbox-inline"><input type="checkbox" value="3" name="user[]" id="3">CSC Coordinator</label>
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


                'subject' => $_POST['subject'],
                'text' => $_POST['content'],
                'student' => $stu,
                'coursec' => $couc,
                'cscc' => $csc,
                'adminid' => $id,
                'type' => 1,
                'date' => $date
            );

            $confim = postdata($postdata);

        if ($confirm) {

       ?>

            <script>swal("Posted!", "Your have benn published a post successfully")</script>
            <?php

        }
            exit();

        }


        if(isset($_POST['draft']) === true) {

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


                'subject' => $_POST['subject'],
                'text' => $_POST['content'],
                'student' => $stu,
                'coursec' => $couc,
                'cscc' => $csc,
                'adminid' => $id,
                'type' => 1,
                'date' => $date
            );

            $confim = putdraft($postdata);
            if ($confirm) {

                ?>

                <script>swal("Drafted!", "Your have benn Draft a post")</script>
                <?php
            }
           exit();


        }
        ?>
