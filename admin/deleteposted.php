<?php 

    require '../core/function/admin.php';
    error_reporting(0);


    if (isset($_GET['pub'])) {
    $id = $_GET['pub'];

    $sql = "DELETE FROM posts WHERE subject= '$id'";

        echo $sql;

        die();

        $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    mysqli_query($con,$sql);
    echo true;

                                    
}







 ?>
