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
  var response = event.target.responseText;
  if(response==1){


    swal("<h3><strong>File was Uploaded successfully !</strong></h3>");

    swal('Uploaded successfully!');

swal("<h3><strong>.File was Uploaded successfully !</strong></h3>");
  }else if(response==2){
    swal("Uploaded successfully");
  }else{
    swal("You should select a file to upload, Try again !");
  }
  //swal("You should select a file to upload!! Try again");
  //swal(response);
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

<div class="row">
  <ul class="breadcrum">
        <li class="completed"><a href="index.php">Home</a></li>
        <li class="active"><a href="fileupload.php?id=<?php echo $subid; ?>">Add Learning materials</a></li>

    </ul>
</div>


<div class="container-fluid">
  <br>
  <center><h3 style="margin-top: -5px;"><?php echo $subname; ?></h3></center>
  <hr>
  <div class="sidenav col-md-2 col-sm-3 col-xs-12" style="margin-top: 0px;">

    <center>
      <h3>Main menu</h3>
    </center>
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
          <div class="panel-heading">
              <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><center><span class="glyphicon glyphicon-folder-close" style="color: blue; font-size: 20px;">
              </span> Content</center></a>
              </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body" style="padding: 0;">
                  <table class="table" style="margin-bottom: 0px;">
                      <tr>
                          <td style="padding-left: 15px;">
                              <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px; color: blue; font-size: 40px;" ></span><a href="courseassignments.php?id=<?php echo $subid?>">View Assignments</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px; color: blue; font-size: 40px;"></span><a href="addnewassignment.php?id=<?php echo $subid?>">Add new Assignment</a>
                          </td>
                      </tr>
                      <!--<tr>
                          <td>
                              <span class="glyphicon glyphicon-file text-success" style="margin-right: 10px;"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
                          </td>
                      </tr>-->
                      <tr>
                      </tr>
                  </table>
              </div>
          </div>
      </div>


    </div>



    <!--<center><h3> Event Calender</h3></center>
    <div class="monthly" id="mycalendar"></div>-->

  </div>




  


  <div class="col-md-8 col-sm-6 col-xs-12" style="margin-top: -18px; margin-left: 3%;">

        <div class="panel panel-default" style="margin-top: 20px;">
        <div class="panel-heading" style="background-color: ; color: black; height: 50px;"><center><h4>Add Learning Materials</h4></center></div>
        <div class="panel-body">


          

          <!-- Standar Form -->



          <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <label for="comment">Title</label> 
            <input type="text" class="form-control" id="title">
            <label for="comment">Description</label>
            <textarea class="form-control" rows="5" id="comment"></textarea><br>

            <label for="comment">File Name </label>
            <input type="text" class="form-control" id="fname">
            <br>
            <div class="row">
              <div class="col-md-8">
                <div class="form-inline">
                  <div class="form-group">
                    <input type="file" name="file1" id="file1" multiple>
                  </div>
                  <input type="button" value="Upload File" onclick="uploadFile()">
                  <!--<button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit" onsubmit="uploadFile()">Upload files</button>-->
                  </div>
                </div>
                <div class="col-md-4">
                  <p style="font-size: 20px;"><strong>Date : <?php echo $today = date("F j, Y"); ?></strong></a></p>
                  <p id="status"></p>
                </div>
            </div>
          </form>

         

          
        </div>
      </div>
      </div>


    </div>
  </div><!-- /container -->

<?php include '../components/course_footer.php'; ?>

