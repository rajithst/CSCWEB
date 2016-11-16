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

    <script>


        $(document).ready(function () {

            $('#mycalendar').monthly({
                mode: 'event',
                //jsonUrl: 'events.json',
                //dataType: 'json'
                xmlUrl: 'events.xml'
            });



                $( "#datepicker" ).datepicker({

                    dateFormat: 'yy-mm-dd'
            });

            $( "#datepickertwo" ).datepicker({

                dateFormat: 'yy-mm-dd'
            });



        });

    </script>

</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <?php include '../components/adminmenuprofile.php'; ?>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <?php include '../components/adminsidebar.php'; ?>
            </div>
        </div>

        <!-- top navigation -->
        <?php include '../components/adminnavbar.php'; ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="height: 100%;">
            <!-- top tiles -->
            <div class="row tile_count">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                    <div class="count">2500</div>
                    <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
                    <div class="count">123.50</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
                    <div class="count green">2,500</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
                    <div class="count">4,567</div>
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
                    <div class="count">2,315</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                    <div class="count">7,325</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
            </div>
            <!-- /top tiles -->

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="dashboard_graph">

                        <div class="row x_title">
                            <div class="col-md-6">
                                <h3>Event Calender</h3>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-8 col-xs-12" id="cal">
                            <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                            <div style="width: 100%;" id="cal2">
                                <div id="mycalendar" class="monthly" ></div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-4 col-xs-12 " style="">
                            <div class="x_title">
                                <center><h2>Add events</h2></center>
                                <div class="clearfix">

                                    <form class="form-horizontal" action=" " method="post"  id="contact_form">

                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Event Name</label>
                                            <div class="col-md-6 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input  name="first_name" placeholder="Event Name" class="form-control"  type="text" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" >Start Date</label>
                                            <div class="col-md-6 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    <input type="text"  id="datepicker" name="last_name"  class="form-control"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" >End Date</label>
                                            <div class="col-md-6 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    <input type="text"  id="datepickertwo" name="last_name"  class="form-control"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" >Start Time</label>
                                            <div class="col-md-6 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                    <input type="text"  id="datepickertwo" name="last_name"  class="form-control"  >
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Text input-->





                                        <center><div class="form-group">
                                                <label class="col-md-4 control-label"></label>
                                                <div class="input-group bootstrap-timepicker timepicker">
                                                    <button type="submit" class="btn btn-info" name="submit">Add <span class="glyphicon glyphicon-send"></span> </button>
                                                    <button type="reset" class="btn btn-info" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
                                                </div>
                                            </div>

                                        </center>

                                    </form>

                                </div>
                            </div>


                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
           </div>
        </div>
                    <?php include '../components/adminfooter.php'; ?>


