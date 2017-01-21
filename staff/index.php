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
<?php
	if(isset($_POST['next']) === true)
	{
		$y=$_POST['year'];
		echo $y;
	}
	else
	{
		$y=2017;
	}
	
	$t1=0;
	$sql1="SELECT amount,given_date FROM expenses";
	$r1=mysqli_query($con,$sql1);
	while ($row1= mysqli_fetch_assoc($r1)) 
	{
		if(date('Y',strtotime($row1['given_date']))==$y)
		{
			$t1=$t1+$row1['amount'];
		}
	}
	$t2=0;
	$sql2="SELECT * FROM project_income";
	$r2=mysqli_query($con,$sql2);
	while ($row2= mysqli_fetch_assoc($r2)) 
	{
		if(date('Y',strtotime($row2['received_date']))==$y)
		{
			$t2=$t2+$row2['amount'];
			
		}
	}
	
	$t3=0;
	$sql3="SELECT * FROM cus_course_income";
	$r3=mysqli_query($con,$sql3);
	while ($row3= mysqli_fetch_assoc($r3)) 
	{
		if(date('Y',strtotime($row3['received_date']))==$y)
		{
			$t3=$t3+$row3['amount'];
		}
	}
	$t4=0;
	$sql4="SELECT * FROM course_income";
	$r4=mysqli_query($con,$sql4);
	while ($row4= mysqli_fetch_assoc($r4)) 
	{
		if(date('Y',strtotime($row4['received_date']))==$y)
		{
			$t4=$t4+$row4['amount'];
		}
	}
	$t_in=$t2 + $t3 + $t4;
?>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'Amount'],
          ['Expenses', <?php echo $t1; ?>],
          ['Income',  <?php echo $t_in; ?>]
        ]);

        var options = {
          title: "<?php echo "Distribution of income against expenses for ".$y;?>"
		  };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	<script>


    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var path= baseUrl+'/CSC-Admin/csccoevents.xml';

    $(document).ready(function () {

        $('#mycalendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: path
        });

        $('.helpbutton').click(function () {


            $('#joyRideTipContent').joyride({
                autoStart : false,
                postStepCallback : function (index, tip) {
                    if (index == 2) {
                        $(this).joyride('set_li', false, 1);
                    }
                },
                modal:false,
                expose: false
            });

        });




    });
</script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'Amount'],
          ['Project income', <?php echo $t2; ?>],
          ['Customized course income',  <?php echo $t3; ?>],
		  ['Course income',  <?php echo $t4; ?>]
		  
        ]);

        var options = {
          title: "<?php echo "Distribution of income for ".$y;?>"
		  };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>

    </br>

</head>

<body background="">

    <div class="container-fluid">
        <div class="sidenav col-md-2 col-sm-3 col-xs-12">

            <center>
                <h3>Main menu</h3>
            </center>
            <div class="panel-group" id="accordion">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Account</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="profile.php">Change Password</a>
                                    </td>
                                </tr>
                                
                           
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span>Reports</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil"></span><a href="edit_report.php">Edit reports</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-th-list"></span><a href="generate_report.php">Generate reports</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <center><h3> Event Calender</h3></center>
            <div class="monthly" id="mycalendar"></div>

        </div>



        <div class="col-sm-9 col-md-9">


        </div>

		
        <div class="col-md-8 col-sm-6 col-xs-12">
			<center>
			
				<div class="well" id="jrnewsfeed">
				<form action="" method="post">
					<table>
					<tr>
						<td style="margin-right:5px;">Enter year :</td>
						<td><input class="form-control" name="year" placeholder="Please enter the year"></input></td>
						<td><button style="margin-left:5px;" class='btn btn-primary' type="submit" name="next"><span class='glyphicon glyphicon-ok'></span> Create</button></td>
					</tr>
					</table>
				</form>
				</div>
			</center>
			<div class="well">
				<div id="piechart" style="width:100%; height: 100%;"></div>
				<br>
			</div>
			<div class="well">
				<div id="piechart2" style="width:100%; height: 100%;"></div>
				<br>
			</div>
        </div>
		
        <div class="col-md-2 col-sm-3 col-xs-12">
            <div class="profile-sidebar">

                <div class="profile-userpic">
                    <img src="<?php echo $staff_data['profile']; ?>" class="img-responsive" alt="">
                </div>

                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo $staff_data['role']; ?>
                    </div>
                </div>

                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Profile</button>
                    <a href="logout.php"><button type="button"  class="btn btn-danger btn-sm">Sign Out</button></a>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="index.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Home </a>
                        </li>
                        <li>
                            <a href="profile.php">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>

                        <li class="helpbutton">
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>


    </div>
    <br>
    <br>
    </div>
    </div>
    </div>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <div class="container-fluid well span6">
                <div class="row">
                    <div class="col-md-4" >
                        <img src="<?php echo $staff_data['profile']; ?>" class="img-circle">
                    </div>

                    <div class="col-md-8" >
                        <h3><?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?></h3>
                        <h5><?php echo $staff_data['email']; ?></h5>
                        <h5><?php echo $staff_data['role']; ?></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php include "../components/page_tail.php";?>
