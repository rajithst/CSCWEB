<?php
	
	require '../core/base.php';
	require '../core/function/cscco.php';

	 function test_input($data) {
      	$data = trim($data);
      	$data = stripslashes($data);
      	$data = htmlspecialchars($data);
      	return $data;
    }

	$subjectid=$_POST['subid'];
	$msg=test_input($_POST['message']);
	
	$mobile=getStudentContact($con,$subjectid);
	while($row=mysqli_fetch_array($mobile)){
		$contact[]=$row[0];
	}

	$i=0;
	while($i<=sizeof($contact)-1){

		// Authorisation details.
		$username = "chamithniroshanacn@gmail.com";
	    $hash = "bb71f9ed7015175f5d9b0d88d833b408620e3774";
	
		// Config variables. Consult http://api.txtlocal.com/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = "CSC-UCSC"; // This is who the message appears to be from.
		$numbers = "$contact[$i]"; // A single number or a comma-seperated list of numbers
		$message = "$msg";
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.txtlocal.com/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch); 

		$i++;
	}

	echo "Your message was send.";

?>	