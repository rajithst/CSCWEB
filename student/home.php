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
    <center><h3> Event Calender</h3></center>
    <div class="monthly" id="mycalendar"></div>

            </div>


<div class="col-md-8 col-sm-6 col-xs-12">

    <center><h2>News Feed</h2></center>

    <?php

    $posts = getpostss($con);

    $count = 1;

        while ($row = mysqli_fetch_assoc($posts)) {

            if ($count <=4) {
                $id = $row['adminid'];

                $admindata = getadmins($con,$id);
                while ($data = mysqli_fetch_assoc($admindata)) {
                    ?>

                      <div class="alert-message alert-message-notice">

                        <h4><?php echo $row['subject']; ?> </h4>
                        <span class="badge">Posted By Admin <?php echo $data['name']; ?></span>
                        <div style="width: 6%; margin-left: 90%;margin-top: -3%;height: 70px;">

                          <img src="<?php echo $data['profile']; ?>" alt="" style="width: 100%; height: 100%;">
                        </div>

                        <hr>

                        <p><?php echo $row['text']; ?></p>

                        <span class="badge" style="float: right;"> on <?php echo $row['date']; ?></span>

                    </div>


                <?php }
            }else{

                ?>
                <a href="allposts.php">Click here for Older Posts</a>

                <?php
                break;
            }

            $count++;


    }?>

</div>

<div class="col-md-2 col-sm-3 col-xs-12" style="background-color: white;margin-top: 4%">
    <center><h3>CURRENT ATTENDANCE</h3></center>
    <hr>
    <div class="alert alert-info">
  <strong>You need complete minimum 80% of the attendance</strong>
</div>
<?php 
$cur = $stu_data['attendance'];
$tot = $duration;

$value = ($cur/$tot)*100; ?>
    <div class="caption">
              
              <p><?php echo $subname; ?></p>
            </div>
            <div class="modal-footer" style="text-align: left">
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $value; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value; ?>%;">
                    <span class=""><?php echo $value; ?> Complete</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4"><b><?php echo $value; ?>%</b><br/><small>COMPLETE</small></div>
                <div class="col-md-4"><b><?php echo $stu_data['attendance']; ?> Days</b><br/><small>DONE</small></div>
                <div class="col-md-4"><b><?php echo $duration ?>  Days</b><br/><small>DURATION</small></div>
              </div>
            </div>


            <?php if ($value <= 80) { 
                $res = 80-$value; ?>

        <div class="alert alert-danger">
          <strong>Warning</strong> You need to complete minimum <?php echo $res; ?>% more
        </div>

        <?php } else { ?>

        <div class="alert alert-success">
          <strong>You have completed minimum attendance requirement</strong> 
        </div>

        <?php }
         ?>


</div>

        </div>


<?php include "../components/stud_footer.php"; ?>
