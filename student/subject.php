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
              $res = getsubname($con,$subid);
              while ($rowsi = mysqli_fetch_assoc($res)) {
                  $subname = $rowsi['subject'];
                  $duration = $rowsi['duration'];
              }


        ?>




    <body style="background-color: #f0f0f0;overflow-x:hidden;">

    <?php include "comp/navbar.php"; ?>

    <div style="margin-left:20px;">
        <ol class="breadcrumb breadcrumb-arrow" >
            <li ><a href="home.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
            <li class="active"><?php echo $subname; ?></li>
        </ol>
    </div>


    <div class="container-fluid">
        <div class="row" style="padding-left:10px;padding-right: 10px;">
<div class="sidenav col-md-2 col-sm-3 col-xs-12" style="background-color: white;padding: 5px;margin-top: 0%">

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

                                            <span class="glyphicon glyphicon-pencil text-success" style="margin-right: 10px;" ></span><a href="subject.php?id=<?php echo $stu_data['coursename']; ?> "><?php echo $subname; ?></a>
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
    </div>

    <?php

    $id = $_GET['id'];
    $slides =getslides($con,$id); ?>

    <div class="col-md-8 col-sm-12 col-xs-12" style="margin-top: 0%;">
        <div id="lecture-schedule">

<?php    
while ($row= mysqli_fetch_assoc($slides)) {
?>
                    <div class="well">
                        <div class="text-head"><h4><?php echo $row['title']; ?></h4></div>
                        <p><?php echo $row['description']; ?></p>
                        <ul class="topics">
                            <div class="contents"><a href="<?php echo $row['file']; ?>" download target="_blank"><span class="glyphicon glyphicon-folder-open" style="margin-right:10px;"></span><img
                                        src="../public/dist/img/system/pdf.png" alt=""><?php echo $row['filename']; ?></a></div>

                        <ul>
                    </div>


<?php } ?>
        </div>
        </div>



        <div class="col-md-2 col-sm-3 col-xs-12" style="background-color: white;margin-top: 0%">
            <center><h3>Submission Links</h3></center>
            <hr>
            <?php
            $submits = getsubmissionlinks($con,$subid);

            while ($row = mysqli_fetch_assoc($submits)) {

            ?>
            <div class="caption" style="margin-left: 20px;" >
                <a href="submit.php?id=<?php echo $subid; ?>&asid=<?php echo $row['id']?>"><h4><?php  echo $row['linktitle']; ?> </h4></a>
            </div>
            <div class="modal-footer" style="text-align: left">

                <div class="progress">
                  <?php

                $timestamp=$row['edateandtime'];
                echo gmdate("F j, Y, g:i a", $timestamp);


                   ?>
                </div>

            </div>
            <?php } ?>

        </div>

</div>
        </div>
    <?php include "../components/stud_footer.php"; ?>

