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
                        <h3>Published Posts</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">


                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Published Posts</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box table-responsive">
                                                        <?php $id = $user_data['id']; ?>
                                                        <table id="datatable-keytable" class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th style='text-align: center; display: none;'>ID</th>
                                                                <th style='text-align: center'>User Name</th>
                                                                <th style='text-align: center'>Role</th>
                                                                <th style='text-align: center'>Title</th>
                                                                <th style='text-align: center'>Date</th>
                                                                <th style='text-align: center'>Delete</th>

                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $result=published($id);

                                                            while($row = $result->fetch_assoc()) {
                                                                $sub =  $row['subject'];

                                                                echo "<tr>";
                                                                echo "<td style='text-align: center; display: none;'>" . $row["adminid"] . "</td>";
                                                                echo "<td style='text-align: center'>" . $row["name"] . '</td>';
                                                                echo '<td style="text-align: center">' . $row['role'] . '</td>';
                                                                echo "<td style='text-align: center'><a href='postread.php?post=$sub' style='color: blue;'> " . $row['subject'] . "</a></td>";
                                                                echo '<td style="text-align: center">' . $row['date'] . '</td>';
                                                                echo '<td style="text-align:center"> <button id="delete" type="" class="btn btn-danger" >Delete</button></td>';


                                                                echo '</tr>';




                                                            }

                                                            ?>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>


        <?php include '../components/adminfooter.php'; ?>




<script type="text/javascript">

    $(document).ready(function() {

        $('#datatable-keytable').DataTable();


        $('tbody>tr>td>button#delete').click(function() {
            //var table = $(this).closest('tr').find('td:nth-child(4)').text();
            console.log('j');

            swal({
             title: "Are you sure?",
             text: "You will not be able to recover this action!",
             type: "warning",
             showCancelButton: true,
             confirmButtonColor: "#DD6B55",
             confirmButtonText: "Yes, delete it!",
             cancelButtonText: "No, cancel ",
             closeOnConfirm: false,   closeOnCancel: false },

             function(isConfirm){
             if (isConfirm) {
             swal("removing!", "Your imaginary file has been deleted.", "success");

             $.ajax({
             url: 'deleteposted.php?pub='+table,
             type: 'get',
             success:function (data) {

             if (data == true) {

             location.reload(true);
             }

             }
             });
             } else{
             swal("Cancelled", "Your post is safe :)", "error");
             }
        });



    });





</script>




