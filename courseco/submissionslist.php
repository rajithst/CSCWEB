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
if (isset($_GET['assid']) and $_GET['subid']) {
    $assid = $_GET['assid'];
    $subid = $_GET['subid'];


}


?>

<!--start of the navbar<!-->
<?php include "comp/navbar.php"; ?>

</br>

<div class="container-fluid">    
  <h1>Students submissions</h1><br>


<center><h3 style="margin-top: -15px;"><?php echo $subname; ?></h3></center>  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" >
  <table class="table table-hover">
  <thead class="">
    <tr>

      <th>Student Name</th>
      <th>Submission</th>
      <th>Submitted Date and Time</th>
      <th>Download</th>

      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>

  <?php
  $res = getsubmitteddata($con,$subid,$assid);
  while ($row = mysqli_fetch_assoc($res)) {

      $timestamp=$row['date'];
      $date = gmdate("F j, Y, g:i a", $timestamp);
      ?>

      <tr>

          <td><?php echo $row['studentname']; ?></td>
          <td><?php echo $row['filename']; ?></td>
          <td><?php echo $date; ?></td>

          <td><label><input type="checkbox" value="" id="cb" class="selectbox"></label>
          <a href="download-multiple.php?file=<?php echo $row['filename']; ?>&path=<?php echo $row['path']; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>Download</button></a> </>
      </tr>

<?php
  }


  ?>

    

  </tbody>
</table>

<!--<button type="button" class="btn btn-primary" id="cbmaster" onclick="select_all(this,'selectbox')">Select All</button>-->
<input type="checkbox" id="cbmaster" name="" onchange="select_all(this,'selectbox')"> <strong style="font-size: 20px;">Select All</strong>
<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>        Download All</button>

    </div>
  </div>


</div>  

<?php include '../components/course_footer.php'; ?>
<script type="text/javascript">
    function select_all(master,cn){
        var cbarray = document.getElementsByClassName(cn);
        for(var i = 0; i < cbarray.length; i++){
            var cb = document.getElementById(cbarray[i].id);
            cb.checked = master.checked;
        }
    }
</script>