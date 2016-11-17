<?php
session_start();
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
$res = getsubname($subid);
while ($rowsi = mysqli_fetch_assoc($res)) {
    $subname = $rowsi['subject'];
    $duration = $rowsi['duration'];
}
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

<div class="container-fluid">
    <div class="row" style="padding: 10px;">
    <div class="sidenav col-md-2 col-sm-3 col-xs-12" style="background-color: white;padding: 10px;margin-top: 4%">

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
                                    <a href="http://www.jquery2dotnet.com">Change Password</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Notifications</a> <span class="label label-info">5</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="http://www.jquery2dotnet.com">Import/Export</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-trash text-danger"></span><a href="http://www.jquery2dotnet.com" class="text-danger">
                                        Delete Account</a>
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
        <?php $res = getassignmentdata($subid,$assid);
        $data = mysqli_fetch_array($res);

        ?>
            <center><h3><?php echo $data[2]; ?></h3></center>
            <hr/>
        <center>

            <div class="assignment" style="padding: 20px;background-color: white">
                    <p><?php echo $data[3]; ?></p>
                </div>

        <hr/>


                <div class="col-md-8 col-md-offset-2" style="background-color: white;padding: 10px;">


                            <legend>Submission Status</legend>

                    <table class="table table-striped">

                        <tbody>
                        <tr>
                            <td><center>Submission Status</center></td>
                            <td>Attempted</td>

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
                            <?php

                            $rem= dateDiff(time()-$timestamp, 2);


                            ?>
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

                        </tbody>
                      <tfoot>
                      <tr>
                          <br>

                          <td colspan="2"><center><button class="btn btn-info " data-toggle="collapse" data-target="#demo">Make submission</button></center></td>
                      </tr>
                      </tfoot>
                    </table>


                    <div id="demo" class="collapse">

                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Upload Files</strong></div>
                                <div class="panel-body">

                                    <!-- Standar Form -->

                                    <form action="upload.php" method="post" enctype="multipart/form-data" id="js-upload-form">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <input type="file" name="file_upload" id="js-upload-files" multiple>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- /container -->
                    </div>

            </div><!-- /.row -->





            </div>



    </div>
</div>


<?php include "../components/stud_footer.php"; ?>
<script>

    $(document).ready(function(){
        $('#counter').countdown({date:'<?php echo $date; ?>'},
            function(){
                $('#counter').text('We\'re live');
            });
    });


</script>
