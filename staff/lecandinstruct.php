<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/staff.php';
include '../components/page_head.php'; ?>

<?php include "comp/navbar.php"; ?>


    </head>
<?php

$subid = $_GET['subid'];

?>

    <body style="overflow-x:hidden; ">
<br>
<br>
<section class="content-header">


    <div class="row">

        <div class="col-md-2"></div>

        <form action="" method="post">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">Date <input type="date" name="lecdate" required class="form-control"></div>
                    <div class="col-md-3">Time <input type="time" name="lectime" required class="form-control"></div>
                    <div class="col-md-3">Hall <input type="text" name="lechall" required class="form-control"></div>

                </div>

                <br>

                <div class="box" style="width:75%;">
                    <div class="box-header">
                        <h3 class="box-title">Lecturer and Instructure Attendance</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                        <h3> Lecturers</h3>

                        <table class="table table-hover">

                            <tr>
                                <th>Lecturer Name</th>
                                <th><center>Mark Attendance</center</th>

                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername"  class="form-control"></td>

                                <td><center><input type="checkbox" checked name="lecattendance"></center></td>



                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername" class="form-control"></td>

                                <td><center><input type="checkbox" checked name="lecattendance" ></center></td>



                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername" class="form-control"></td>

                                <td><center><input type="checkbox" checked name="lecattendance" ></center></td>



                            </tr>
                        </table>

                        <hr>

                        <h3> Instructions</h3>

                        <table class="table table-hover">

                            <tr>
                                <th>Instructure Name</th>
                                <th><center>Mark Attendance</center></th>

                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername"  class="form-control"></td>

                                <td><center><input type="checkbox" checked name="lecattendance" ></center></td>



                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername" class="form-control"></td>

                                <td><center><input type="checkbox" checked name="lecattendance" ></center></td>



                            </tr>

                            <tr>
                                <td><input type="text" name="lecturername" class="form-control"></td>

                                <td><center><input type="checkbox" checked name="lecattendance" ></center></td>



                            </tr>
                        </table>



                    </div>

                </div>

                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-block btn-success btn-md">Finish</button>
                    </div>

                    <div class="col-md-2">

                        <button type="reset" class="btn btn-block btn-danger btn-md">Cancel</button>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </form>
        <div class="col-md-2"></div>

    </div>

</section>

<?php include "../components/page_tail.php"; ?>