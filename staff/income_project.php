<?php
$con = mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo "Not connected to database";
}
if(!mysqli_select_db($con,'csc'))
{
	echo "database not selected";
}

$p_name=$_POST['pro_name'];

$c_name=$_POST['client_name'];

$r_party=$_POST['res_party'];

$r_date=$_POST['rec_date'];

$d_date=$_POST['due_date'];

$r_by=$_POST['rec_by'];

$amount=$_POST['amm'];
/*
*/
$sql="INSERT INTO 
project_income(pro_name,client,responsible_party,received_date,due_date,received_by,amount)
values('$p_name','$c_name','$r_party','$r_date','$d_date','$r_by','$amount')";

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