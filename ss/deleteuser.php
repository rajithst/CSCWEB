<?php

/*require ' ../core/init.php';
error_reporting(0);

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}*/

    $id = $_GET['id'];
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "DELETE FROM staff WHERE id= $id";
echo $sql;
    mysqli_query($con,$sql);
    //echo true;







?>