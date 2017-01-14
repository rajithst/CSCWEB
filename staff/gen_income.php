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
$table=$_POST['type'];

$s_date=$_POST['start_date'];

$e_date=$_POST['end_date'];

$query = "SELECT * FROM $table WHERE received_date BETWEEN '$s_date' AND '$e_date'"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

echo "<table>"; // start a table tag in the HTML
echo "<tr><td>received date</td><td>Amount</td></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['received_date'] . "</td><td>" . $row['amount'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($con); //Make sure to close out the database connection


header("refresh:40; url=index.php");
?>