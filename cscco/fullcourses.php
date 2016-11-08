<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/cscco.php';
include '../components/cscordinator_head.php'; ?>


<script>
    $( function() {
        $( "#accordion" ).accordion();
    } );
</script>

</head>
<body>

<?php include "comp/navbar.php"; ?>

</br>

<?php

$course = getcoursefor();

?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center><h3 class="panel-title">See All Courses Here</h3></center>
        </div>

        <div id="accordion">
        <?php  while ($row = mysqli_fetch_assoc($course)) { ?>

                <h3> <?php echo $row['coursename']; ?> </h3>
            <div>


                            <?php
                            $id = $row['courseid'];
                            $subs = getsubsbyid($id);
                            while ($rows = mysqli_fetch_assoc($subs)) { ?>
                            <div>
                                <span><?php echo $rows['subject']; ?> </span>
                            </div>
                            <?php } ?>
                        </div>

        <?php } ?>
                    </div>




                </div>

    <center>
        <a href="editcourse.php"><button class="btn btn-info">Edit Courses Here</button></a>
        <a href="course.php"><button class="btn btn-info">Back</button></a>
    </center>

    </div>



<?php include "../components/cscordinator_footer.php"; ?>

