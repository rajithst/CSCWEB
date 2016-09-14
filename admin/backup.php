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
            <?php include '../components/sidebar_head.php' ?>
            <?php include '../components/sidebar.php'?>

            <div class="content-wrapper">

                <section class="content-header">
                    <h1>
                        Data Backups

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Backups</a></li>
                        <li class="active">All</li>
                    </ol>
                </section>


                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Backups</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                    <table  class="table table-striped table-bordered">
                        <thead>

                        <tr>
                            <th style='text-align: center'>Table Name</th>
                            <th style='text-align: center'>Table Type</th>
                            <th style='text-align: center'>DataBackup</th>
                        </tr>

                        </thead>

                        <tbody>


                    <?php

                    $result = showtables($con);
                    while($row = $result ->fetch_assoc()){


                        echo "<tr>";
                        echo "<td style='text-align: center'>". $row['Tables_in_csc']. "</td>";
                        echo "<td style='text-align: center'><span class=\"label label-primary\">Primary Table</span></td>";
                        echo "<td style=\"text-align: center\"><button id='sql' type='button' class='btn btn-primary' >SQL Dump</button> <button id='csv' type='button' class='btn btn-danger' >CSV backup</button></td>";
                        echo " </tr>";

                    }


                    ?>

                    </tbody>


                </table>
                                </div>

                            </div>

                        </div>
                    </div>

                </section>

            </div>


            <?php include "../components/footer.php"; ?>
            <?php include "../components/activity_bar.php"; ?>

            <div class="control-sidebar-bg"></div>
</div>

<?php require '../components/page_tail.php'; ?>

    <script>
        $(document).ready(function (){

            $("button").click(function(){
                var id = this.id;
                    var table = $(this).closest('tr').find('td:nth-child(1)').text();

                $.ajax({
                   url:"backupdata.php?tablename="+table+id,
                    type:"get",
                    data:{tablename:table,id:id},
                    success: function (data) {

                        console.log(data);

                    }



                });




            });

        });



    </script>
