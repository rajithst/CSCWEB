<?php
require '../core/init.php';
//error_reporting(0);
if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../components/page_head.php'; ?>




    </head>


    <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">


        <a href="dashboard.php" class="logo">

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

                <section class="content-header">
                    <h1>
                        General Settings

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Settings</a></li>
                        <li class="active">General</li>
                    </ol>
                </section>


                <section class="content">


                </section>

            </div>


            <?php include "../components/footer.php"; ?>
            <?php include "../components/activity_bar.php"; ?>

            <div class="control-sidebar-bg"></div>
</div>

<?php require '../components/page_tail.php'; ?>