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
                        <h3>Edit User</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Select User</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="col-xs-3">
                                    <!-- required for floating -->
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tabs-left">
                                        <li class="active"><a href="#home" data-toggle="tab" style="width:135px;">CSC Staff</a>
                                        </li>
                                        <li><a href="#profile" data-toggle="tab" style="width:135px;">CSC Coordinators</a>
                                        </li>
                                        <li><a href="#messages" data-toggle="tab" style="width:135px;">Course Coordinators</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-xs-9">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" style="margin-left: 50px;">
                                        <?php $staff = getallstaff(); 
                                        while ($row = mysqli_fetch_assoc($staff)) { ?>
                                        <ul>
                                            <a href=""><li id="<?php echo $row['id']; ?>"><?php echo $row['first_name']." ". $row['last_name']; ?></li></a>
                                        </ul>
                                            
                                      <?php  }
                                        ?>

                                        

                                        </div>
                                        <div class="tab-pane" id="profile" style="margin-left: 50px;">

                                        <?php $cscco = getallcscco(); 
                                        while ($row = mysqli_fetch_assoc($cscco)) { ?>
                                        <ul>
                                            <a href=""><li id="<?php echo $row['id']; ?>"><?php echo $row['first_name']." ". $row['last_name']; ?></li></a>
                                        </ul>
                                            
                                      <?php  }
                                        ?></div>
                                        <div class="tab-pane" id="messages" style="margin-left: 50px;">
                                            <?php $csco = getallcourseco(); 
                                        while ($row = mysqli_fetch_assoc($csco)) { ?>
                                        <ul>
                                            <a href=""><li id="<?php echo $row['id']; ?>"><?php echo $row['first_name']." ". $row['last_name']; ?></li></a>
                                        </ul>
                                            
                                      <?php  }
                                        ?>


                                        </div>

                                    </div>
                                </div>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>






                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Edit User </h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E mail</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Role <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include '../components/adminfooter.php'; ?>

