<?php

if (isset($_GET['pub'])) {
    $id = $_GET['pub'];
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "DELETE FROM staff WHERE id=$id";
    echo $sql;
    die();
    mysqli_query($con,$sql);
    echo true;


}







?>
