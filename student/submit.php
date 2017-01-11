<?php
session_start();
ob_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../core/init.php';
require '../components/stud_head.php';
require '../core/function/student.php';
?>



<?php

if (isset($_GET['id']) and isset($_GET['asid'])){

    $assid = $_GET['asid'];


}

$subid = $stu_data['coursename'];
$res = getsubname($con,$subid);
while ($rowsi = mysqli_fetch_assoc($res)) {
    $subname = $rowsi['subject'];
    $duration = $rowsi['duration'];

}

$res = getassignmentdata($con,$subid,$assid);
$data = mysqli_fetch_array($res);

?>


<style>
    h2.bg-success{
        padding: 15px;
    }

    .required-lbl{
        color: red;
    }

    label[for="billinginformation"]{
        display: inline;
        float: left;
        margin:0px 45px 0px 0px;
    }

    .card-expiry{
        padding-left: 0px;
    }

    .confirm-btn{
        float:right;
    }

    .bg-primary{
        padding: 10px;
    }

    label{
        margin-bottom :0px;
    }
</style>

<body style="background-color: #f0f0f0;overflow-x:hidden;">

<?php include "comp/navbar.php"; ?>

<div style="margin-left:20px;">
    <ol class="breadcrumb breadcrumb-arrow" >
        <li ><a href="home.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
        <li ><a href="subject.php?id=<?php echo $stu_data['coursename']; ?> "><?php echo $subname; ?></a></li>
        <li class="active" ><?php echo $data[2]; ?></li>
    </ol>
</div>

<div class="container-fluid">
    <div class="row" style="padding: 10px;">
    <div class="sidenav col-md-2 col-sm-3 col-xs-12" style="background-color: white;padding: 10px;margin-top: 0%">

        <center>
            <h3>Main menu</h3>
        </center>
        <hr>
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

                                    <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px;" ></span><a href="subject.php?id=<?php echo $stu_data['coursename']; ?> "> <?php echo $subname; ?></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

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
                                    <a href="http://www.jquery2dotnet.com">Change Settings</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <hr>


    </div>


    <div class="col-md-10 col-sm-6 col-xs-12 ">
        
            <center><h3><?php echo $data[2]; ?></h3></center>
            <hr/>
        <center>

            <div class="assignment" style="padding: 20px;background-color: white">
                    <p><?php echo $data[3]; ?></p>
                </div>

        <hr/>


                <div class="col-md-8 col-md-offset-2" style="background-color: white;padding: 10px; margin-bottom: 40px;">


                            <legend>Submission Status</legend>

                    <table class="table table-striped">

                        <tbody>
                        <tr>
                            <?php
                            $name = $stu_data['fullname'];
                            $assdata = getsubmissionattempt($con,$name,$subid,$assid);
                            $assignmentatt = mysqli_fetch_array($assdata);
                            ?>
                            <td><center>Submission Status</center></td>
                            <td><?php if ($assignmentatt[7]==1){

                                echo  "Attempted";

                                } else {
                                    echo  "Not Attempted";

                                }?></td>

                        </tr>
                        <tr>
                            <?php
                            $timestamp=$data[4];
                            $date = gmdate("F j, Y, g:i a", $timestamp);
                            ?>
                            <td><center>Due date</center></td>
                            <td><?php echo $date; ?></td>

                        </tr>
                        <tr>

                            <td><center>Remaining Time</center></td>
                            <td>

                                <div id="counter">
                                    <span class="days">00   </span><em>days</em>
                                    <span class="hours">00   </span><em>hours</em>
                                    <span class="minutes">00   </span><em>minutes</em>
                                    <span class="seconds">00   </span><em>seconds</em>
                                </div>

                            </td>

                        </tr>

                        <?php if ($assignmentatt[7]==1){ ?>

                            <tr>

                                <td><center>Uploaded File</center></td>
                                <td>
                                    <img src="../public/dist/img/system/pdf.png" alt="">
                                </td>

                            </tr>

                      <?php  }

                        ?>

                        </tbody>
                      <tfoot>
                      <?php if ($assignmentatt[7]==0){ ?>
                      <tr>
                          <br>

                          <td colspan="2"><center><button class="btn btn-info " data-toggle="collapse" data-target="#demo">Make submission</button></center></td>
                      </tr>

                      <?php  }

                      ?>
                      </tfoot>
                    </table>


                    <div id="demo" class="collapse">

                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Upload Files</strong></div>

                                    <!-- Standar Form -->
                                    <div class="panel-body">

                                    <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <input type="file" name="file_upload" id="js-upload-files" multiple>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit" name="submitass">Upload files</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- /container -->
                    </div>

            <?php

            if (isset($_POST['submitass'])) {
                if ($_FILES['file_upload']['error'] > 0) {
                    die('An error ocurred when uploading.');
                }

                /*if(!getimagesize($_FILES['file_upload']['tmp_name'])){
                    die('Please ensure you are uploading an image.');
                }*/

                // Check filetype
                /*if($_FILES['file_upload']['type'] != 'image/png'){
                    die('Unsupported filetype uploaded.');
                }*/

                // Check filesize
                /*if($_FILES['file_upload']['size'] > 500000){
                    die('File uploaded exceeds maximum upload size.');
                }*/

                // Check if the file exists
                /*if(file_exists('upload/' . $_FILES['file_upload']['name'])){
                    die('File with that name already exists.');
                }*/

                // Upload file
                if (!move_uploaded_file($_FILES['file_upload']['tmp_name'], $data[5] . $_FILES['file_upload']['name'])) {
                    die('Error uploading file - check destination is writeable.');
                }

                $name = $stu_data['fullname'];
                $date = time();
                $path = $data[5];

               $sql = "INSERT INTO assignmentsubmissions(subid,assid,studentname,filename,date,path,attempt) VALUES('$subid','$assid','$name','rr','$date','$path',1)";
                mysqli_query($con,$sql);
                header("Refresh:0");
                ob_end_flush();
            }
            ?>

            </div>





            </div>



    </div>
</div>


<?php include "../components/stud_footer.php"; ?>
<script>

    $(document).ready(function(){
        $('#counter').countdown({date:'<?php echo $date; ?>'},
            function(){
                $('#counter').text('link is expired');
            });
    });


</script>
