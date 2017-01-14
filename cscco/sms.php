<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/cscco.php';

include '../components/cscordinator_head.php'; ?>



</head>
	<body>

	<?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="sms.php">MESSAGES</a></li>
        <li class="active"><a href="#">SMS</a></li>

    </ul>

    </br>
    
   <div class="container">
   	<div class="container">
   		<h3><center>Send SMS Notifications</center></h3>
   		<hr>
   	</div>
   	<div class="container">

    <?php

    $crseid=getcourseid($con);
    $sbid=getsubid($con);

    while ($row=mysqli_fetch_array($crseid)) {
      $courseid[]= $row[0];
    }

    while ($row1=mysqli_fetch_array($sbid)) {
      $subid[]= $row1[0];
    }

    $subjectid=$msg='';
    $courseidErr=$subidErr=$msgErr='';

    if(isset($_POST['send'])){
      if (empty($_POST['courseid'])) {
        $courseidErr='Invalid Input';
      }

      if (empty($_POST['subid'])) {
        $subidErr='Invalid Input';
      }

      if (empty($_POST['message'])) {
        $msgErr='Invalid Input';
      }
    }

    ?>

   	
   		<form action="text.php" method="post">
   		   
   			<div class="col-sm-12" style="margin-bottom: 20px;">
   				<div class="col-sm-4 col-xs-4" align="right"> <span class="glyphicon glyphicon-education"> </span><label style="margin-left: 5px;"> Course ID :</label></div>
   				<div class="col-sm-8 col-xs-8">
   					<div class="form-group">
  						<select class="form-control" name="courseid" style="width:200px;">
              <?php
              
              for ($i=0; $i <sizeof($courseid) ; $i++) { 
            
              ?>

                <option style="width:50px;"><?php echo $courseid[$i] ; ?></option>

              <?php

              }

              ?>
    						</select>
   					</div>
   				</div>
   			
        <br>

        <div class="col-sm-12" style="margin-bottom: 20px;margin-left: -4px;"">
          <div class="col-sm-4 col-xs-4" align="right"> <span class="glyphicon glyphicon-education"> </span><label style="margin-left: 5px;"> Subject ID :</label></div>
          <div class="col-sm-8 col-xs-8" >
            <div class="form-group">
              <select class="form-control" name="subid" style="width:200px;">
              <?php
              
              for ($i=0; $i <sizeof($subid) ; $i++) { 
            
              ?>

                <option style="width:50px;"><?php echo $subid[$i] ; ?></option>

              <?php

              }

              ?>
                </select>
            </div>
          </div>

   			<div class="col-sm-12" style="margin-bottom: 20px; margin-left: -6px;"> 
   				<div class="col-sm-4 col-xs-4" align="right"> <span class="glyphicon glyphicon-envelope"> </span><label style="margin-left: 5px;"> Message :</label></div>
   				<div class="col-sm-8 col-xs-8"><input type="text" name="message" class="form-control" style=" height: 150px; width:60% "> </div>
   			</div>
   			<div style="margin-bottom: 30px;">
   				<center><button type="submit" name="send" class="btn btn-success">Send <span class="glyphicon glyphicon-send"></span></button></center>
   			</div>
   		   
   		</form>
   		<hr>
   	</div>
   </div>


<?php include "../components/cscordinator_footer.php"; ?>

<script>

$(document).ready( function () {
	$('#lectable').DataTable();
} );

</script>
