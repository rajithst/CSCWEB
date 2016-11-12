<?php
require '../core/init.php';
require 'function/admin.php';
error_reporting(0);
if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}


require '../components/page_head.php';

$var =basename($current_file,".php");
?>

<script>

    $(function () {

        $("#compose-textarea").wysihtml5();
    });

</script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>CSC</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CSC</b>  UCSC</span>
        </a>

        <!-- Header Navbar -->
        <?php include "../components/navbar.php";?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?php include '../components/sidebar_head.php' ?>
            <?php include '../components/sidebar.php'?>
            <!-- Sidebar Menu --

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Add New post

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Posts</a></li>
                <li class="active">New</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <div class="row">
        <div class="col-md-3">
          <a href="published.php" class="btn btn-primary btn-block margin-bottom">Back to Published Posts</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Options</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">

                <li><a href="published.php"><i class="fa fa-envelope-o"></i> Published</a></li>
                <li><a href="draft.php"><i class="fa fa-file-text-o"></i> Drafts</a></li>

                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>




        </div>


        <div class="col-md-9">
            <form action="" method="post" id="idForm">
                      <div class="box box-primary" id="2">
                        <div class="box-header with-border">
                          <h3 class="box-title">Compose New post</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="form-group">

                              <label><input type="checkbox" value="student" id="student" name="user[]" >     Student</label> <br>
                              <label><input type="checkbox" value="coursec" id="coursec" name="user[]" >     Course Cordinator</label> <br>
                              <label><input type="checkbox" value="cscc" id="cscc" name="user[]">     CSC Cordinator</label>


                          </div>
                          <div class="form-group">
                            <input class="form-control" placeholder="Subject:" name="subject" type="text" required>
                          </div>
                          <div class="form-group">
                                <textarea id="compose-textarea" class="form-control" style="height: 300px" name="content" type="text" required>

                                </textarea>
                          </div>
                          <div class="form-group">
                            <div class="btn btn-default btn-file">
                              <i class="fa fa-paperclip"></i> Attachment
                              <input type="file" name="attachment">
                            </div>
                            <p class="help-block">Max. 32MB</p>
                          </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <div class="pull-right">
                            <button type="submit" id= "draft" class="btn btn-default" name="draft"><i class="fa fa-pencil"></i> Draft</button>
                            <button type="submit" class="btn btn-primary" name="postdata"><i class="fa fa-envelope-o"></i> Post</button>
                          </div>
                          <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                        </div>
                        <!-- /.box-footer -->
                      </div>
            </form>
        </div>
        <!-- /.col -->
      </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
            <?php include "../components/footer.php"; ?>
    <?php include "../components/activity_bar.php"; ?>

    <div class="control-sidebar-bg"></div>
</div>

<?php require  '../components/page_tail.php';

                $id = $user_data['id'];
                if(isset($_POST['postdata']) === true){

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


                if(isset($_POST['draft']) === true){

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
                        'type' => 2,
                        'date'=> $date
                    );

                    putdraft($postdata); ?>

                    <script>swal("Drafted!", "Your have benn Draft a post")</script>
                    <?php
                    exit();
                }

                ?>












