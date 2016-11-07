<?php


include '../components/page_head.php'; ?>

<link rel="stylesheet" href="../public/dist/css/staff_css.css">
<link rel="stylesheet" href="staff.css">
</head>


    <body background="">
    <!-- header-->
    <nav class="navbar navbar-inverse" id="myNavbar" >
    <div class="container-fluid" >
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="../public/dist/img/system/csclogo.png"class="img-responsive csc-logo" id="logo">
        </div>
        <div class="collapse navbar-collapse"  >

            <ul class="nav navbar-nav navbar-right" id="navbar_txt" >
                <li>
					<a href="index.php" style="color:white;" class="glyphicon glyphicon-home"> Home</a>
				</li>
                <li class="dropdown" style="margin-right:4px" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;padding-top:18px;" >
					<span class="glyphicon glyphicon-globe"></span>
					Notifications
					<span class="caret">
					</span>
					</a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                        <li><a tabindex="-1" href="" id="task_txt">Emails</a></li>
                    </ul>
                </li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;padding-top:18px;">
					<span class="glyphicon glyphicon-list-alt"> Reports</span>
                        <span class="caret">
						</span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                        <li><a tabindex="-1" href="edit_rep.php" id="task_txt">Edit Report</a></li>
						<li><a tabindex="-1" href="report_gen.php" id="task_txt">Generate report</a></li>
                    </ul>
                </li>
				<li>
					<a href="select_course_reg.php" style="color:white;padding-top:18px;"><span class="glyphicon glyphicon-edit"></span> Registration</a>
				</li>
                <li>
					<a href="#" style="color:white;padding-top:18px;"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
				</li>
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
            $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
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
<footer class="container-fluid" id="footer">
        <div class = "container-fluid">
            <div class="row">
                <div col-md-5 class="footer-content">
                     <ul class="footer-nav">
                        <li>C</li> <li>O</li> <li>M</li> <li>P</li> <li>U</li> <li>T</li> <li>I</li> <li>N</li><li>G</li><li></li>           
                        <li>S</li> <li>E</li> <li>R</li> <li>V</li> <li>I</li> <li>C</li> <li>E</li> <li>S</li><li></li>
                        <li>C</li><li>E</li> <li>N</li> <li>T</li> <li>R</li> <li>E</li>
                    </ul>
               </div>
            </div>
        </div>
    </footer>








<?php include "../components/page_tail.php"; ?>