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
  <center><h1>Students submissions</h1></center><br>


<center><h3 style="margin-top: -15px;"><?php echo $subname; ?></h3></center>  <div class="row">


  <div class="row">
    <div class="sidenav col-md-2 col-sm-12 col-xs-12" style="margin-top: 0px;">

        <center>
            <h3>Main menu</h3>
        </center>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
              </span>Content</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body" style="padding: 0;">
                        <table class="table" style="margin-bottom: 0px;">
                            <tr>
                                <td style="padding-left: 15px;">
                                    <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px;" ></span><a href="courseassignments.php?id=<?php echo $subid; ?>">All Assignment</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px;"></span><a href="addnewassignment.php?id=<?php echo $subid?>">Add new Assignment</a>
                                </td>
                            </tr>
                            <!--<tr>
                                <td>
                                    <span class="glyphicon glyphicon-file text-success" style="margin-right: 10px;"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
                                </td>
                            </tr>-->
                        </table>
                    </div>
                </div>
            </div>


        </div>



        <center><h3> Event Calender</h3></center>
        <div class="monthly" id="mycalendar"></div>

    </div>
     <div class="col-md-10 col-sm-12 col-xs-12" >
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

          <td><!--<label><input type="checkbox" value="" id="cb" class="selectbox"></label>-->
          <a href="download-multiple.php?file=<?php echo $row['filename']; ?>&path=<?php echo $row['path']; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>Download</button></a> </td>
      </tr>

<?php
  }


  ?>

    

  </tbody>
</table>

<!--<button type="button" class="btn btn-primary" id="cbmaster" onclick="select_all(this,'selectbox')">Select All</button>-->
<!--<input type="checkbox" id="cbmaster" name="" onchange="select_all(this,'selectbox')"> <strong style="font-size: 20px;">Select All</strong>-->
<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>        Download All</button>

    </div>
  </div>
    

   
  </div>


</div>  

<?php include '../components/course_footer.php'; ?>
<!--<script type="text/javascript">
    function select_all(master,cn){
        var cbarray = document.getElementsByClassName(cn);
        for(var i = 0; i < cbarray.length; i++){
            var cb = document.getElementById(cbarray[i].id);
            cb.checked = master.checked;
        }
    }
</script>-->