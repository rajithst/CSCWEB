<?php
/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 12/28/16
 * Time: 6:38 PM
 */
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../core/init.php';
require '../core/function/admin.php';

if (isset($_GET['id']) and isset($_GET['adminid'] ) and isset($_GET['message'] )){


    $id = $_GET['id'];
    $adid = $_GET['adminid'];
    $adminpic = $user_data['profile'];
    $message = $_GET['message'];
    $insert = insertMessage($con,$id,$adid,$message);
    $msgs = getmessages($con,$id,$adid);

    $chatpersondata = getpersondata($con,$id);
    while ($data =mysqli_fetch_array($chatpersondata) ){

        $fname = $data[1];
        $lname = $data[2];
        $pic = $data[6];

    }


    while ($rows = mysqli_fetch_assoc($msgs)) {

        if ($rows['sentmsg'] == '0') {

            echo "<div class='message-feed media'>
                    <div class='pull-left'>
                        <img src='$pic' alt='' class='img-avatar'>
                    </div>
                        <div class='media-body'>
                            <div class='mf-content'>";
            echo   $rows['rcvdmsg'];
            echo "</div>   <small class='mf-date'><i class='fa fa-clock-o'></i> $date </small>
                        </div>
                </div>";


        } elseif ($rows['rcvdmsg'] == '0'){

            echo "<div class='message-feed right'>
                                <div class='pull-right'>
                                    <img src='$adminpic' alt='' class='img-avatar'>
                                </div>
                                <div class='media-body'>
                                    <div class='mf-content'>";
                                         echo   $rows['sentmsg'];
                         echo "         </div>";

                                        $timestamp=$rows['time'];
                                        $date = gmdate("F j, Y, g:i a", $timestamp);
                                    echo "<small class='mf-date'><i class='fa fa-clock-o'></i>". $date ." </small>
                                </div>
                            </div>";


        }
    }
}