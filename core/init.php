<?php

require 'db/database.php';

if(logged_in() === true) {
    
    $session_id = $_SESSION['id'];
    $user_data = user_data( $session_id, 'id', 'name', 'role', 'password','email','profile');
    $staff_data = staff_data( $session_id, 'id', 'first_name', 'last_name', 'email','password','role','profile');
    $stu_data = stu_data( $session_id, 'id', 'fullname', 'coursename','name_w_initials','home_mobile','password','username','email','attendance');


}


?>








