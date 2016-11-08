<?php

require '../core/function/cscco.php';


if (isset($_GET)) {

    $cid = $_GET['cid'];

    $con = mysqli_connect('localhost', 'root', 'rajith', 'csc');
    $sql = " DELETE  from subjects WHERE subjectid = '$cid'";
    $res = mysqli_query($con, $sql);

}