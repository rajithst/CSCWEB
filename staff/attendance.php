<?php

include "../core/init.php";
include '../components/page_head.php'; ?>

<link rel="stylesheet" href="../public/dist/css/staff_css.css">

</head>


    <body background="">
    <!-- header-->
    <nav class="navbar navbar-inverse" id="myNavbar">
        <div class="container-fluid" >
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>



            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="navbar_txt">
                    <li><img src="images/logo.png"class="img-responsive csc-logo" id="logo" ></li>
                    <li><a href="index.php" style="color:white;">Home</a></li>
                    <li><a href="profile_csc_staff.html" style="color:white;">Profile</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">Notifications
                            <span class="caret">
						</span>
                        </a>
                        <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                            <li><a tabindex="-1" href="inbox_Email.html" id="task_txt">Emails</a></li>
                            <li><a tabindex="-1" href="notification_csc_staff.html" id="task_txt">Notifications</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" style="color:white;"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


<?php
    $subid = $_GET['subid'];
    $res = getstudents($subid);
    $subdata = getsubdata($subid);
?>
        <section class="content-header">


            <div class="row">

                <div class="col-md-2"></div>

                <form action="" method="post">
                <div class="col-md-10">

                   <h2><?php echo $subdata[2]; ?>  -  <?php echo $subid?></h2><br>

                    <h3> Course Id - <?php echo $subdata[1];?></h3> <br><br>


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
                                    <td><input type="checkbox" checked name="attendance[]" value="<?php  echo  $row['fullname']; ?>"></td>
                                    <td><input type="text" name="addtional" ></td>

                                </tr>

                                    <?php } ?>
                            </table>





                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-block btn-success btn-md" name="next">Next Page</button>
                        </div>

                        <div class="col-md-2">

                            <button type="cancel" class="btn btn-block btn-danger btn-md">Cancel</button>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>
                    </div>
                </form>
                <div class="col-md-2"></div>

                </div>

            </section>

<?php
    if(isset($_POST['next']) === true) {
        foreach ($_POST['attendance'] as $index => $val) {
            $con = mysqli_connect('localhost', 'root', '',  'csc');
            $sql1 = "SELECT attendance FROM student WHERE fullname='$val'";
            $res = mysqli_query($con,$sql1);
            $dd = mysqli_fetch_array($res);
            $current= $dd[0];
            $new = $current+ 1;
            $sql = "UPDATE student SET attendance=$new WHERE fullname = '$val'" ;
            $res = mysqli_query($con,$sql);

        }
        ?>
        <script>
            swal("Submited!", "Your have been submit attendance");

            setTimeout(function () {
                window.location.href = "lecandinstruct.php";
            }, 2000);


        </script>


        <?php
        exit();
    }

?>









<?php include "../components/page_tail.php"; ?>