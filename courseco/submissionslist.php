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
  <h1>Students submissions</h1><br>


<center><h3 style="margin-top: -15px;"><?php echo $subname; ?></h3></center>  <div class="row">
    <div class="col-md-12">
  <table class="table table-hover">
  <thead class="">
    <tr>
      <th>Student Id</th>
      <th>Student Name</th>
      <th>Submission</th>
      <th>Submitted Date</th>
      <th>Submitted Time</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">cs111</th>
      <td>Suneth</td>
      <td></td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
      <td><label><input type="checkbox" value="" id="cb" class="selectbox"></label></td>
      <td><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>        Download</button></td>
    </tr>
    
    <tr>
      <th scope="row">cs111</th>
      <td>Suneth</td>
      <td></td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
      <td><label><input type="checkbox" value="" id="cb1" class="selectbox"></label></td>
      <td><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>        Download</button></td>
    </tr>
    <tr>
      <th scope="row">cs111</th>
      <td>Suneth</td>
      <td></td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
      <td><label><input type="checkbox" value="" id="cb2" class="selectbox"></label></td>
      <td><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>        Download</button></td>
    </tr>
    <tr>
      <th scope="row">cs111</th>
      <td>Suneth</td>
      <td></td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
      <td><label><input type="checkbox" value="" id="cb3" class="selectbox"></label></td>
      <td><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>        Download</button></td>
    </tr>
    <tr>
      <th scope="row">cs111</th>
      <td>Suneth</td>
      <td></td>
      <td>2016-12-19</td>
      <td>11.55 pm</td>
      <td><label><input type="checkbox" value="" id="cb4" class="selectbox"></label></td>
      <td><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>        Download</button></td>
    </tr>
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