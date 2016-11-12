<?php 

    require '../core/init.php';
    require 'function/admin.php';
    error_reporting(0);

    if(logged_in() === false){

        session_destroy();
        header('Location:index.php');
        exit();

    }


    if (isset($_GET['pub'])) {
    $id = $_GET['pub'];

    $sql = "DELETE FROM posts WHERE subject= '$id'";

        $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    mysqli_query($con,$sql);
    echo true;

                                    
}







 ?>
