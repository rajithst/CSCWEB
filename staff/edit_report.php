<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/staff.php';
include '../components/page_head.php';

include "comp/navbar.php"; ?>

    </br>

</head>



<body background="">

        <div class="container">

            <center><h2>Input Data</h2></center>
            <br><br>
            <?php include "comp/uppermenu.php"; ?>
        </div>



<?php include "../components/page_tail.php";?>
