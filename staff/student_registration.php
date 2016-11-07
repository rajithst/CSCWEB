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
$course_name=$_POST['course_name'];

$title=$_POST['title'];

$full_name=$_POST['full_name'];

$full_name_with_initials=$_POST['full_name_with_initials'];

$date_of_birth=$_POST['DOB'];

$gender=$_POST['optradio'];

$NIC=$_POST['NIC'];

$home_address=$_POST['home_addr'];

$home_telephone=$_POST['home_tel'];

$mobile=$_POST['mobile'];

$personel_email=$_POST['personel_email'];

$office_address=$_POST['office_addr'];

$office_telephone=$_POST['office_tel'];

$office_email=$_POST['office_email'];

$work_place_and_designation=$_POST['work_pl_&_desig'];

$vehicle_number=$_POST['veh_num'];

$method_of_being_informed=$_POST['method'];

$description_of_other_method=$_POST['other_des'];



$payment_method=$_POST['pay_method'];
$payed_ammount=$_POST['amm'];
$payment_received_day=$_POST['rec_date'];
$person_rec=$_POST['person_received'];
$payment_referrence=$_POST['ref'];


$sql="INSERT INTO 
student(name_title,fullname,coursename,name_w_initials,dob,gender,nic,home_address,home_tel,home_mobile,email,work_place_addr,work_place_tel,work_place_email,workplace_designation,vehicle_no,howknow,description_howknow) 
VALUES ('$title','$full_name','$course_name','$full_name_with_initials','$date_of_birth','$gender','$NIC','$home_address','$home_telephone','$mobile','$personel_email','$office_address','$office_telephone','$office_email','$work_place_and_designation','$vehicle_number','$method_of_being_informed','$description_of_other_method')";

$sqlp="INSERT INTO
course_income(student_NIC,subject_name,payment_method,amount,received_date,person_rec,refference_no)
VALUE('$NIC','$course_name','$payment_method','$payed_ammount','$payment_received_day','$person_rec','$payment_referrence')";
if(!mysqli_query($con,$sql))
{
	echo "student details not registered<br>";
}
else
	//
{
	echo "student details registered<br>";
}
if(!mysqli_query($con,$sqlp))
{
	echo "payment not registered\n<br>";
}
else
	//
{
	echo "payment registered\n<br>";
}
header("refresh:4; url=index.php");
?>