
<?php
require 'core/init.php';
error_reporting(0);

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}

require  'components/page_head.php';
$var =basename($current_file,".php");?>
<script>

    $(document).ready(function() {
        $('#myDatatable').DataTable();
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
        <?php include "components/navbar.php";?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?php include 'components/sidebar_head.php'?>
            <?php include 'components/sidebar.php'?>
            <!-- Sidebar Menu --

    <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Draft Posts

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Posts</a></li>
                        <li class="active">Draft</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Draft Posts</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">

                                    <?php $id = $user_data['id']; ?>
                                    <table class="table table-striped table-bordered" id="">
                                        <thead>
                                        <tr>
                                            <th style='text-align: center'>Admin ID</th>
                                            <th style='text-align: center'>Post ID</th>

                                            <th style='text-align: center'>Title</th>
                                            <th style='text-align: center'>Date</th>
                                            <th style='text-align: center'>Status</th>


                                        </tr>

                                        </thead>
                                        <tbody>
                                        <?php

                                        $result =draftpost($con);

                                        while($row = $result->fetch_assoc()) {

                                            echo "<tr>";
                                            echo "<td style='text-align: center'>" . $row["adminid"] . "</td>";
                                            echo "<td style='text-align: center'>" . $row["id"] . "</td>";
                                            echo "<td style='text-align: center'>" . $row["subject"] . '</td>';
                                            echo '<td style="text-align: center">' . $row['date'] . '</td>';
                                            echo "<td style=\"text-align: center\"><button id='approve' type='button' class='btn btn-success' >Post</button> <button id='approve' type='button' class='btn btn-primary' >Edit</button> <button type='button' class='btn btn-danger'>Delete</button></td>";


                                            echo '</tr>';




                                        }

                                        ?>


                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php include "components/footer.php"; ?>
            <?php include "components/activity_bar.php"; ?>

            <div class="control-sidebar-bg"></div>
</div>

<?php require  'components/page_tail.php'; ?>