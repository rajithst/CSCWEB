<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../core/init.php';
require '../core/function/admin.php';

if (isset($_GET['id']) and isset($_GET['adminid'] ) ){


    $id = $_GET['id'];
    $adid = $_GET['adminid'];
    $adminpic = $user_data['profile'];
    
    $msgs = getmessages($con,$id,$adid);

    $chatpersondata = getpersondata($con,$id);
    while ($data =mysqli_fetch_array($chatpersondata) ){
    
        $fname = $data[1];
        $lname = $data[2];
        $pic = $data[8];
        
    }

    
    while ($rows = mysqli_fetch_assoc($msgs)) {

        if ($rows['sentmsg'] == '0') {

 
        		echo "<p>".$rows['rcvdmsg']."</p>";
        		


        } elseif ($rows['rcvdmsg'] == '0'){

        	echo  $rows['sentmsg'];
        	
        
        }
    }
      
    }