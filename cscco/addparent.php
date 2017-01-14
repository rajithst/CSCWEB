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
<body>

<?php include "comp/navbar.php"; ?>

</br>