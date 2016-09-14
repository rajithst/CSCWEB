<?php 

    require '../core/init.php';
    error_reporting(0);

    if(logged_in() === false){

        session_destroy();
        header('Location:index.php');
        exit();

    }


    if (isset($_GET['pub'])) {
    $id = $_GET['pub'];

    $sql = "DELETE FROM posts WHERE subject= '$id'";
    mysqli_query($sql);
    echo true;

                                    
}







 ?>