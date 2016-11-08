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

</br>








<?php include "../components/cscordinator_footer.php"; ?>
