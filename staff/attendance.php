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
include '../components/page_head.php';?>



    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="edit_report.php">INPUT DATA</a></li>
        <li class="completed"><a href="select_course.php">SELECT COURSE</a></li>
        <li class="active"><a href="">INPUT ATTENDANCE</a></li>

    </ul>

</head>

<body background="">

    <div class="container-fluid">

        <div class="row">



            <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-8 col-xs-12" style="padding-left: 10%">
				<?php
    $subid = $_GET['subid'];
    $res = getstudents($con,$subid);
    $subdata = getsubdata($con,$subid);
?>
            <center>
        <section class="content-header">

                <form action="" method="post">
                <div class="col-md-10">

                   <h4><b>Subject : <?php echo $subdata[2]; ?></b></h4>
					<b>Subject id : </b><?php echo $subid?>
					<br>
                    <b> Course Id : </b><?php echo $subdata[1];?>
					<hr>


                    <div class="box" style="width:75%;">
                        <div class="box-header">
                            <h3 class="box-title">Input Attendance</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">


                            <table class="table table-hover">
                                <tr>
                                    <th>Subject ID</th>
                                    <th>Student Name</th>
                                    <th>mark Attendance</th>
                                    <th>Additional Infromation</th>
                                </tr>
                                <?php


                                while ($row= mysqli_fetch_assoc($res)) {

                                ?>
                                <tr>
                                    <td><?php  echo  $subid; ?></td>
                                    <td><?php  echo  $row['fullname']; ?></td>
                                    <td><center><input type="checkbox" checked name="attendance[]" value="<?php  echo  $row['fullname']; ?>"></center></td>
                                    <td><input type="text" name="addtional" class="form-control"></td>

                                </tr>

                                    <?php } ?>
                            </table>





                        </div>

                    </div>

                            <button type="submit" class="btn btn-block btn-success btn-md" name="next">Record Marks</button>
                            <button type="cancel" class="btn btn-block btn-danger btn-md">Cancel</button>
                        </div>
                </form>
            </section>
            </center>
        </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">

            <div class="col-md-4"></div>



<?php
    if(isset($_POST['next']) === true) {
        foreach ($_POST['attendance'] as $index => $val) {

            $sql1 = "SELECT attendance FROM student WHERE fullname='$val'";
            $res = mysqli_query($con,$sql1);
            $dd = mysqli_fetch_array($res);
            $current= $dd[0];
            $new = $current+ 1;
            $sql = "UPDATE student SET attendance=$new WHERE fullname = '$val'" ;
            $res = mysqli_query($con,$sql);

        }

        ?>

            <div class="col-md-4">

                <br>
        <div class="alert alert-info">
            <strong><center>Recorded!</center></strong>
        </div>

                <form action="lecandinstruct.php" method="GET"> <center><button class="btn btn-info" type="submit" name="subid" value="<?php echo $subid; ?>">Process to next page</button></center> </form>

        <?php


    } ?>

            </div>
            <div class="col-md-4"></div>

        </div>

			</div>






<?php include "../components/page_tail.php";?>
