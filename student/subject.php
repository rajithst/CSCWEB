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

<script>


    $(document).ready(function () {

        $('#mycalendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: 'events.xml'
        });
    });
</script>

    </head>

        <?php
              $subid = $stu_data['coursename'];
              $res = getsubname($subid);
              while ($rowsi = mysqli_fetch_assoc($res)) {
                  $subname = $rowsi['subject'];
                  $duration = $rowsi['duration'];
              }


                                         ?>




    <body style="background-color: #f0f0f0;overflow-x:hidden;">

    <?php include "comp/navbar.php"; ?>


    <div class="container-fluid">
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

                                            <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px;" ></span><a href="allposts.php"><?php echo $subname; ?></a>
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
    </div>

    <?php

    $id = $_GET['id'];
    $slides =getslides($id); ?>

    <div class="col-md-8 col-sm-12 col-xs-12" style="margin-top: 4%;">
        <div id="lecture-schedule">

<?php    while ($row= mysqli_fetch_assoc($slides)) {
    ?>





                    <div class="well">
                        <div class="text-head"><h4><?php echo $row['title']; ?></h4></div>
                        <p><?php echo $row['description']; ?></p>
                        <ul class="topics">
                            <div class="contents"><a href="<?php echo $row['file']; ?>" download target="_blank"><span class="glyphicon glyphicon-folder-open" style="margin-right:10px;"></span><img
                                        src="../public/dist/img/system/pdf.png" alt=""><?php echo $row['filename']; ?></a></div>

                        <ul>
                    </div>
                </div>

<?php } ?>
        </div>



        <div class="col-md-2 col-sm-3 col-xs-12" style="background-color: white;margin-top: 4%">
            <center><h3>Submission Links</h3></center>
            <hr>
            <div class="caption">
                
            </div>
            <div class="modal-footer" style="text-align: left">
                <div class="progress">

                </div>

            </div>

        </div>

</div>
    <?php include "../components/stud_footer.php"; ?>

