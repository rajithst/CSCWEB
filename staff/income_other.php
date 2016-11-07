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

$description=$_POST['desc'];

$received_from=$_POST['rec_from'];

$received_by=$_POST['rec_by'];

$received_date=$_POST['rec_date'];

$amount=$_POST['amm'];

$sql="INSERT INTO 
other_income(description,received_from,received_by,received_date,amount)
values('$description','$received_from','$received_by','$received_date','$amount')";

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