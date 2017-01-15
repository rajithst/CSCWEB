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


<script>

    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var path= baseUrl+'/CSC-Admin/coursecoevents.xml';

    $(document).ready(function () {

        $('#mycalendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: path
        });
    });
</script>

</head>
<body>

<?php
if (isset($_GET['assid'])) {
    $assid = $_GET['assid'];
    $subid = $_GET['subid'];

    $res = getslides($con,$subid);
    while ($row = mysqli_fetch_assoc($res)) {

        $subname = $row['subject'];
        $subid = $row['subjectid'];


    }
    $res2 = getSubmissionData_to_edit($con,$assid);
    while($row2 = mysqli_fetch_assoc($res2)){
      $old_linktitle = $row2['linktitle'];
      $old_end_date_time = gmdate("F j, Y, g:i a", $row2['edateandtime']);
      $old_description = $row2['description'];
    }
}


?>

<!--start of the navbar<!-->
<?php include "comp/navbar.php"; ?>

</br>

<div class="container-fluid">
    <br>
    <center><h3 style="margin-top: -15px;"><?php echo $subname; ?></h3></center>
    <hr>
    <div class="sidenav col-md-2 col-sm-3 col-xs-12" style="margin-top: 0px;">

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


    <div class="col-md-10 col-sm-9 col-xs-12" style="margin-top: -20px;">

        <div class="panel panel-default" style="margin-top: 20px;">
          <div class="panel-heading" style="background-color: ; color: black;"><center><h4>Edit Submission link</h4></center> </div>
          <div class="panel-body" style="height: 375px;">


            <form action="" name="submissionform" method="post"  id="">
              <label for="comment">link Title</label>
              <input type="text" class="form-control" name="title" value="<?php echo $old_linktitle?>">
              <label for="comment">Old end date and time</label>
              <input type="text" class="form-control" name="old" value="<?php echo $old_end_date_time?>">
              <label for="comment">New end  Date and Time</label>
              <input  type="text" class="form-control time" value="" readonly name="edtime">
              <label for="comment">Submission Description</label>
              <textarea class="form-control" rows="5" name="description" value=""><?php echo $old_description ?></textarea><br>

              

              <br>
              <!--<label for="comment">make directory for assignment</label>
              <input  type="text" class="form-control" value=""  name="path">

              <br>-->

              <center><button class="btn btn-info" name="submission" onclick="">Edit link</button></center>

            </form>

            <?php
               if (isset($_POST['submission'])){

                  $foldername = $_POST['title'];
                  if(!file_exists("../uploads/".$foldername."_updated")){
                      mkdir("../uploads/".$foldername."_updated", 0777 );
                      $folderpath = '../uploads/'.$foldername."_updated";
                      $dtime = strtotime($_POST['edtime']);

                      $regdata = array(

                          'linktitle'=>$_POST['title'],
                          'description'=>$_POST['description'],
                          'edateandtime'=>$dtime,
                          'path' => $folderpath


                      );


                      if(empty($regdata['linktitle']) && empty($regdata['edateandtime'])){
                        echo "<script type=text/javascript>swal('Link title and End date should be mentioned!')</script>";
                      }else{
                        $edit = edit_submission($con,$regdata,$assid);
                        echo "<script type=text/javascript>swal('Assignment link was updated successfully!')</script>";
                      }

                      
                  }else if(empty($regdata['linktitle']) && empty($regdata['edateandtime'])){
                    echo "<script type=text/javascript>swal('Link title and End date should be mentioned!')</script>";
                    
                  }else{
                    echo "<script type=text/javascript>swal('Assignment link with this name already exists try giving another name!')</script>";
                  }
                  


                }


                ?>



            <br>

          </div>
        </div>
      </div>


    </div>


<?php include '../components/course_footer.php'; ?>
<script>
    $(document).ready(function () {

        $( "#datepicker" ).datepicker({

            dateFormat: 'yy-mm-dd'
        });






    });
    $(".time").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

</script>


