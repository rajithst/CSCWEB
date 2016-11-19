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
    <br>
    <center><h2><?php echo $subname; ?></center>
    <hr>
    <div class="sidenav col-md-2 col-sm-3 col-xs-12" style="margin-top: 3%;">

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


    <div class="col-md-8 col-sm-6 col-xs-12" style="margin-top: 2%;">

        <div class="panel panel-default" style="margin-top: 20px;">
          <div class="panel-heading" style="background-color: ; color: black;"><center><h4>Make Submission link</h4></center> </div>
          <div class="panel-body">


            <form action="" method="post"  id="">
              <label for="comment">link Title</label>
              <input type="text" class="form-control" name="title">
              <label for="comment">Submission Description</label>
              <textarea class="form-control" rows="5" name="description"></textarea><br>

              <label for="comment">End  Date and Time</label>
              <input  type="text" class="form-control time" value="" readonly name="edtime">

              <br>
              <label for="comment">make directory for assignment</label>
              <input  type="text" class="form-control" value=""  name="path">

              <br>

              <center><button class="btn btn-info" name="submission">Make link</button></center>

            </form>

            <?php
               if (isset($_POST['submission'])){

                  $foldername = $_POST['path'];
                   mkdir("../uploads/".$foldername, 0777 );
                  $folderpath = '../uploads/'.$foldername.'/';
                  $dtime = strtotime($_POST['edtime']);

                  $regdata = array(

                      'subid' =>$subid,
                      'linktitle'=>$_POST['title'],
                      'description'=>$_POST['description'],
                      'edateandtime'=>$dtime,
                      'path' => $folderpath


                  );

                  $submit = submission($con,$regdata);


                }


                ?>



            <br>

          </div>
        </div>
      </div>
    <div class="col-md-2 col-sm-3 col-xs-12" style="margin-top: 3%;">
        <div class="profile-sidebar">

            <center>
                <h3>Folder Structure</h3>
            </center>


            <?php
            echo '<ol>';

            function listFolderFiles($Mydir)
            {
                foreach (glob($Mydir . '*', GLOB_ONLYDIR) as $dir) {
                    $dir = str_replace($Mydir, '', $dir);
                    //echo $dir;

                        if ($dir != '.' && $dir != '..') {
                            echo '<li>' . $dir;
                            if (is_dir($Mydir . '/' . $dir)) listFolderFiles($Mydir . '/' . $dir);
                            echo '</li>';
                        }


                }
                echo '</ol>';
            }

            listFolderFiles('../uploads/');
            ?>



</div>


    </div>

    </div>


<?php include '../components/course_footer.php'; ?>


