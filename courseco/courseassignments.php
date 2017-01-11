<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}

require '../core/init.php';
require '../core/function/coursecode.php';
include '../components/course_head.php'; ?>


</head>
<body>

<?php
if (isset($_GET['id'])) {
    $subid = $_GET['id'];

    $res = getslides($con,$subid);
    while ($row = mysqli_fetch_assoc($res)) {

        $subname = $row['subject'];
        $subid = $row['subjectid'];


    }
}


?>

<!--start of the navbar<!-->
<?php include "comp/navbar.php"; ?>

</br>

<div class="container-fluid">    
  <h1>Assignment Details</h1><br>
  <center><h3 style="margin-top: -15px;"><?php echo $subname; ?></h3></center>  <div class="row">
    <div class="col-md-12">
  

<?php


  $submissionDetails = getSubmissionData($con,$subid);
  if(mysqli_num_rows($submissionDetails) > 0){
    echo '<table class="table table-condensed table-hover">
  <thead class="">
  <tr>
      <th>Link Title</th>
      <th>Submitted Date</th>
      <th>Due Date</th>
      <th>Due Time</th>
    </tr>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($submissionDetails)){
      echo '<tr>';
      echo "<th><a href=submissionslist.php?assid=".$row['id']."&subid=".$subid.">" .$row['linktitle']."</a></th>";
      echo '<td>'.$row["submitted_date"].'</td>';
      echo '<td>'.$row["edateandtime"].'</td>';
      echo '<td>'."endtime".'</td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  }else{ ?>
   
   <center>
   
   
            <div class="alert alert-info">
            <strong>Warning!</strong> <br/> No Assignment created for this subject
            </div>
   
   
   </center>
   
 <?php  
  }
  

?>


  <!--<table class="table table-condensed table-hover">
  <thead class="">
    <tr>
      <th>Link Title</th>
      <th>Submitted Date</th>
      <th>Due Date</th>
      <th>Due Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th> scope="row">1</th>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>2016-12-1</td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
    </tr>
  </tbody>
</table>-->










    </div>
  </div>
</div>

   

<?php include '../components/course_footer.php'; ?>


