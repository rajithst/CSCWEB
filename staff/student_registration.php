<?php
session_start();
	require '../core/base.php';

	if(logged_in() === false){

		session_destroy();
		
		exit();

	}
	require '../core/init.php';
	require '../core/function/staff.php';
	include '../components/page_head.php'; 
	
$sub_name=$_POST['subject_name'];
$sqlx="SELECT subjectid FROM subjects WHERE subject='$sub_name'";
$result = mysqli_query($con,$sqlx);
$arr = mysqli_fetch_array($result);

$course_name=$arr[0];


$title=$_POST['title'];

$full_name=$_POST['full_name'];

$full_name_with_initials=$_POST['full_name_with_initials'];

$date_birth=$_POST['DOB'];
$date_of_birth = date('Y-m-d', strtotime($date_birth));

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

$status=1;



$payment_method=$_POST['pay_method'];
$payed_ammount=$_POST['amm'];
$payment_received_day=$_POST['rec_date'];
$person_rec=$_POST['person_received'];
$payment_referrence=$_POST['ref'];

$sql="INSERT INTO 
student(name_title,fullname,coursename,name_w_initials,dob,gender,nic,home_address,home_tel,home_mobile,workplace_designation,work_place_addr,work_place_tel,work_place_email,vehicle_no,description_howknow,howknow,registered,email) 
VALUES ('$title','$full_name','$course_name','$full_name_with_initials','$date_of_birth','$gender','$NIC','$home_address','$home_telephone','$mobile','$work_place_and_designation','$office_address','$office_telephone','$office_email','$vehicle_number','$description_of_other_method','$method_of_being_informed','$status','$personel_email')";



$newvalue = date('Y-m-d', strtotime($payment_received_day));


$sqlp="INSERT INTO
course_income(student_NIC,coursename,payment_method,amount,person_rec,refference_no,received_date)
VALUE('$NIC','$course_name','$payment_method','$payed_ammount','$person_rec','$payment_referrence','$newvalue')";

if(mysqli_query($con,$sql) && mysqli_query($con,$sqlp) )
{?>
	
	</head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="select_course_reg.php">SELECT COURSE</a></li>
        <li class="completed"><a href="#">REGISTRATION</a></li>
		<li class="active"><a href="#">REGISTERED</a></li>
        

    </ul>
    </br>
	
        <div class="alert alert-info">
            <strong><center>Recorded!</center></strong>
        </div>
	</body>
	<?php include "../components/page_tail.php";?>
<?php
}
else
{?>
	</head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="select_course_reg.php">SELECT COURSE</a></li>
        <li class="completed"><a href="#">REGISTRATION</a></li>
		<li class="active"><a href="#">NOT REGISTERED</a></li>
        

    </ul>
    </br>
	
        <div class="alert alert-info">
            <strong><center>Not Recorded!</center></strong>
        </div>
	</body>
	<?php include "../components/page_tail.php";?>
	
<?php
}


?>
