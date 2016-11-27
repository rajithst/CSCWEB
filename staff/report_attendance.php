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
        <li class="completed"><a href="generate_report.php">SELECT REPORTS</a></li>
        <li class="completed"><a href="select_course_att.php">SELECT COURSE</a></li>
        <li class="active"><a href="">ATTENDANCE REPORT</a></li>

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

                
                <div class="col-md-10">

                   <h4><b>Subject : <?php echo $subdata[2]; ?></b></h4>
					<b>Subject id : </b><?php echo $subid?>
					<br>
                    <b> Course Id : </b><?php echo $subdata[1];?>
					<hr>


                    <div class="box" style="width:75%;">
                        <div class="box-header">
                            <h3 class="box-title">Attendance Report</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">


                            <table class='table table-bordered table-inverse'>
                                <tr>
                                    <th>Subject ID</th>
                                    <th>Student Name</th>
                                    <th>Attendance percentage</th>
                                    
                                </tr>
                                <?php

                                while ($row= mysqli_fetch_assoc($res)) 
								{
									$percentage=($row['attendance']/$row['total_attendance'])*100;
									if($percentage>=90 )
									{
									?>
									<tr style="background-color:#8ed191;" >
										<td><?php  echo  $subid; ?></td>
										<td><?php  echo  $row['fullname']; ?></td>
										<td><?php echo  $percentage ."%";?>
										

									</tr>
								<?php
								}
								else if(80<=$percentage)
								{?>
									<tr style="background-color:#fcd771;">
                                    <td><?php  echo  $subid; ?></td>
                                    <td><?php  echo  $row['fullname']; ?></td>
									<td><?php echo  $percentage ."%";?>
									

                                </tr>
								<?php
								}
								else if($percentage<80)
								{?>
									<tr style="background-color:#fc8067;">
                                    <td><?php  echo  $subid; ?></td>
                                    <td><?php  echo  $row['fullname']; ?></td>
									<td class="table-danger"><?php echo  $percentage ."%";?>
									

                                </tr>
								
								
								<?php 
								}
								} ?>
                            </table>





                        </div>

                
            </section>
            </center>
			</div>
			</div>

<?php include "../components/page_tail.php";?>
