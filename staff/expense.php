<?php
<<<<<<< HEAD
$con = mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo "Not connected to database";
}
if(!mysqli_select_db($con,'csc'))
{
	echo "database not selected";
}
=======
include "../core/init.php";
require 'function/staff.php';
include '../components/page_head.php'; ?>
>>>>>>> 40a4eff3ac0990e059781df86273c2b6e028ddc2

$type=$_POST['meth'];

$description=$_POST['desc'];

$given_to=$_POST['g_to'];

$given_by=$_POST['g_by'];

$given_date=$_POST['g_date'];

$amount=$_POST['amm'];

$sql="INSERT INTO 
expenses(expense_type,description,given_to,given_by,given_date,amount)
values('$type','$description','$given_to','$given_by','$given_date','$amount')";

if(!mysqli_query($con,$sql))
{
	echo "payment not registered<br>";
}
else
	//
{
	echo "payment registered<br>";
}

header("refresh:4; url=index.php");
?>
