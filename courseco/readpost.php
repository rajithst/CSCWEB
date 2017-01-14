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

</head>

<body>

    <?php include "comp/navbar.php"; ?>





<?php

$subj = $_GET['id'];

$post = getentire($con,$subj);

$data = mysqli_fetch_row($post);
?>


    <div class="container">

        <center> <h2>Read post here</h2></center>
        <div class="col-md-12">
            <h1><?php echo  $data[2];?></h1>
            <p>
                <?php echo  $data[3];?>

            </p>
            <div>
                <span class="badge">Posted <?php echo  $data[8];?></span><div class="pull-right"><a href="allposts.php"><button class="btn btn-info">Go back</button></a></div>
            </div>
            <hr>
        </div>
    </div>






<?php include "../components/cscordinator_footer.php"; ?>


