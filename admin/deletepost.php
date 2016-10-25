<?php 

    require ' ../core/init.php';
    error_reporting(0);

    if(logged_in() === false){

        session_destroy();
        header('Location:index.php');
        exit();

    }

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $sql = "DELETE FROM posts WHERE id= $id";
    mysqli_query($con,$sql);
    echo true;

                                    
}







 ?>