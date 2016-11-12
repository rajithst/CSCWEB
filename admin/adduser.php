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

        <div class="right_col" role="main" style="height: 100%;">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add User</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                <div class="col-md-2"></div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add User </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                 
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />

                            <?php


                                if(isset($_POST['adduser']) === true){

                                        $postdata = array(
                                            'first_name' =>  $_POST['first_name'],
                                            'last_name' =>  $_POST['last_name'],
                                            'email' =>  $_POST['email'],
                                            'password' =>  md5($_POST['password']),
                                            'role' => $_POST['role']
                                        );

                                        adduser($postdata); ?>
                                    <script>swal("Added!", "Your have benn added a user successfully")</script>

                                        <?php
                                        }

                                        ?>
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="first_name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="last-name" name="last_name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E mail</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="password">
                                        </div>
                                    </div>

                                      <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="role" id="" class="form-group">
                                        <option value="CSC Staff">CSC Staff</option>
                                        <option value="CSC Cordinator">CSC Coordinator</option>
                                        <option value="Course Coordinator">Course Coordinator</option>
                                    </select>
                                    </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button type="submit" class="btn btn-success" name="adduser">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2"></div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include '../components/adminfooter.php';


