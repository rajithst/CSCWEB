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

	$sql = "DELETE FROM submissions WHERE id= $assid";
	$res = mysqli_query($con,$sql);

	if ($res) {
		
	return true;
}
}