<?php
include 'components/admust.php';


if (isset($_GET['id'])){

	$id = $_GET['id'];

	$sql = "UPDATE posts SET type=1 WHERE id = $id";
	echo $sql;
	$res = mysqli_query($con, $sql);
	if ($res ) {
		return true;
	} else {
		return false;
	}

}