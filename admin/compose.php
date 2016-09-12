
<?php
require '../core/init.php';
error_reporting(0);

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}

require  '../components/page_head.php'; ?>

<script>
    $(function () {

        $("#compose-textarea").wysihtml5();
    });

</script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <a href="index2.html" class="logo">

            <span class="logo-mini"><b>CSC</span>

            <span class="logo-lg"><b>CSC</b>  UCSC</span>
        </a>

        <?php include "../components/navbar.php";?>
    </header>

    <aside class="main-sidebar">


        <section class="sidebar">

            <?php include '../components/sidebar_head.php'?>

            <?php include '../components/sidebar.php'?>

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Compose Email

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Email</a></li>
                        <li class="active">compose</li>
                    </ol>
                </section>

                <section class="content">


<div class="row">
    <div class="col-md-3">
        <a href="inbox.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

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
                    <li><a href="inbox.php"><i class="fa fa-inbox"></i> Inbox
                            <span class="label label-primary pull-right">12</span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>

                </ul>
            </div>
            <!-- /.box-body -->
        </div>

    </div>



    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Compose New Email</h3>
            </div>
            <form action="" method="post">
                    <div class="box-body">

                            <div class="form-group">
                                <input class="form-control" placeholder="To:" name="to" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Subject:" name="subject" type="text">
                            </div>
                            <div class="form-group">
                            <textarea id="compose-textarea" class="form-control" style="height: 300px" name="body" type="text" required>

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

                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                                <button type="submit" class="btn btn-primary" name="mail"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                        </div>
            </form>
        </div>

    </div>

</div>

            </div>

            <?php include "../components/footer.php"; ?>
            <?php include "components/activity_bar.php"; ?>

            <div class="../control-sidebar-bg"></div>
</div>

<?php require  '../components/page_tail.php'; ?>

<?php

if (isset($_POST['mail'])) {



    if (empty($_POST['to']) === true) {
        $errors[]= 'Send email required';

    }

    if (empty($_POST['body']) === true) {
        $errors[]= 'body required';

    }

    if (empty($errors) === true) {

        email($_POST['to'],$_POST['subject'],strip_tags($_POST['body'])); ?>

                <script>swal("Email Sent!", "Email has been sent")</script> 
                <?php

        exit();

    } else {

        echo 'hellop';

    }
}


?>
