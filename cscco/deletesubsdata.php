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


if (isset($_GET)) {

    $cid = $_GET['cid'];


    $sql = " DELETE  from subjects WHERE subjectid = '$cid'";
    $res = mysqli_query($con, $sql);

}