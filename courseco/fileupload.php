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
<script>


/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */




function _(el){
  return document.getElementById(el);
}
function uploadFile(){
  var title = _("title");
  var desc = _("comment");
  var fname = _("fname");
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  formdata.append("title",title.value);
  formdata.append("desc", desc.value);
  formdata.append("fname", fname.value);
  console.log(fname.value);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php?id=<?php echo $subid ?>&name=<?php echo $subname; ?>&fname="+fname.value);
  ajax.send(formdata);
}
function progressHandler(event){
  _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progress1").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
  _("status").innerHTML = event.target.responseText;
  _("progress1").value = 0;
}
function errorHandler(event){
  _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("status").innerHTML = "Upload Aborted";
}

</script>
  </head>
<body>

<?php include "comp/navbar.php"; ?>


<div class="container-fluid">
  <br>
  <center><h2><?php echo $subname; ?></center>
  <hr>
  <div class="sidenav col-md-2 col-sm-3 col-xs-12" style="margin-top: 4%;">

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
                              <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px;" ></span><a href="allposts.php">All Assignment</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px;"></span><a href="addnewassignment.php?id=<?php echo $subid?>">Add new Assignment</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <span class="glyphicon glyphicon-file text-success" style="margin-right: 10px;"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
                          </td>
                      </tr>
                      <tr>

                      </tr>
                  </table>
              </div>
          </div>
      </div>


    </div>



    <center><h3> Event Calender</h3></center>
    <div class="monthly" id="mycalendar"></div>

  </div>




  <div class="col-sm-9 col-md-9" >


  </div>


  <div class="col-md-8 col-sm-6 col-xs-12" style="margin-top: 3%; margin-left: 3%;">

        <div class="panel panel-default" style="margin-top: 20px;">
        <div class="panel-heading" style="background-color: ; color: black;"><center><h4>Add Learning Materials</h4></center></div>
        <div class="panel-body">


          <div class="container">
          <div class="row">

          </div>
         <!-- <div class="container">
            <div class="row">
            <div class="col-md-12" style="padding-left: 0px; margin-left: -15px">
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Attendance</a></p>
            </div>
            </div>
          </div>-->

          
        </div>

          <!-- Standar Form -->



          <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <label for="comment">Title</label> 
            <input type="text" class="form-control" id="title">
            <label for="comment">Description</label>
            <textarea class="form-control" rows="5" id="comment"></textarea><br>

            <label for="comment">File Name to show</label>
            <input type="text" class="form-control" id="fname">
            <br>
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="file1" id="file1" multiple>
              </div>
              <input type="button" value="Upload File" onclick="uploadFile()">
              <!--<button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit" onsubmit="uploadFile()">Upload files</button>-->
            </div>
          </form>

          <br>
          <div class="container">
            <div class="row">
            <div class="col-md-12" style="padding-left; margin-left: -12px;">
            <p style="font-size: 20px;"><strong>Date : <?php echo $today = date("F j, Y"); ?></strong></a></p>
            </div>
            </div>
          </div>
          <!-- Drop Zone -->
          <!--<h4>Or drag and drop files below</h4>
          <div class="upload-drop-zone" id="drop-zone">
            Just drag and drop files here
          </div>-->

          <!-- Progress Bar -->
           <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-6 col-xs-6" style="padding-left: 0px;">
                <progress id="progress1" value="0" max="100" style="width:1109px;"></progress>
                <h3 id="status"></h3>
                <p id="loaded_n_total"></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      </div>


    </div>
  </div><!-- /container -->

<?php include '../components/course_footer.php'; ?>

<script>
  $(document).ready(function () {

    $( "#datepicker" ).datepicker({

      dateFormat: 'yy-mm-dd'
    });






  });
  $(".time").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

</script>
