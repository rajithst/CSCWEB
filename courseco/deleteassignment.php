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
	//echo $row;
	$sql2 = "DELETE FROM submissions WHERE id= $assid";
	$res2 = mysqli_query($con,$sql2);

	if ($res1 && $res2) {
		
	return true;
	}
	removefolder($path);
}