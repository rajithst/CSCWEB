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
<?php include '../components/adminnavbar.php';?>



<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>Post Read</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inbox Design<small>User Mail</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
                        <button id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</button>
                        <a href="#">
                          <div class="mail_list">
                            <div class="left">
                              <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                            </div>
                            <div class="right">
                              <h3>Dennis Mugo <small>3.00 PM</small></h3>
                              <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                            </div>
                          </div>
                        </a>
                        
                      
                        <?php
                            $sub = $_GET['post'];
                          $sql = "SELECT * FROM posts WHERE subject= '$sub'";
                          $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
                        $res = mysqli_query($con,$sql);

                        while($rowsi = mysqli_fetch_assoc($res)) {

                            $sub = $rowsi['subject'];
                            $text = $rowsi['text'];
                            $date = $rowsi['date'];
                        }

                            ?>
                      </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                      <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                              <div class="btn-group">
                          
                                <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                                <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
                              </div>
                            </div>
                            <div class="col-md-4 text-right">
                              <p class="date"> <?php echo $date; ?></p>
                            </div>
                  
                            <div class="col-md-12">
                              <h4> <?php echo $sub; ?></h4>
                            </div>
                          </div>
                    
                          <div class="view-mail">
                            <p> <?php echo $text; ?>
                           </p>
                          </div>
                          
                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
 <?php include '../components/adminfooter.php'; ?>
