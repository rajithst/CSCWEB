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

$c_name=$_POST['course_name'];

$requesting_party=$_POST['req_party'];

$received_date=$_POST['rec_date'];

$received_by=$_POST['rec_by'];

$amount=$_POST['amm'];

$sql="INSERT INTO 
cus_course_income(course_name,requesting_party,received_date,received_by,amount)
values('$c_name','$requesting_party','$received_date','$received_by','$amount')";

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