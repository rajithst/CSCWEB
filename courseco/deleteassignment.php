<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}

require '../core/init.php';
require '../core/function/coursecode.php';


if (isset($_GET['assid'])) {
	
	$assid = $_GET['assid'];
	$subid = $_GET['subid'];

	$sql1 = "SELECT * FROM submissions WHERE id=$assid";
	$res1 = mysqli_query($con,$sql1);
	$row = mysqli_fetch_assoc($res1);
	$path = $row['path'];
	$sql2 = "DELETE FROM submissions WHERE id=$assid";
	$res2 = mysqli_query($con,$sql2);
<<<<<<< HEAD
	removefolder($path);
    /*$files = glob($path . '/*');
    foreach ($files as $file) {
        is_dir($file) ? removeDirectory($file) : unlink($file);
    }*/
    //rmdir($path);
=======

    rrmdir($path);
    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir."/".$object))
                        rrmdir($dir."/".$object);
                    else
                        unlink($dir."/".$object);
                }
            }
            rmdir($dir);
        }
    }

>>>>>>> 44371cac8626ebe47a1b3162d8f8d1af13748b41

}