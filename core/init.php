<?php

require 'function/admin.php';
require 'function/frontend.php';
require 'function/student.php';*/
require 'function/coursecode.php';
require 'function/staff.php';
require 'function/cscco.php';

$current_file= explode('/',$_SERVER['SCRIPT_NAME']);
$current_file=end($current_file);



if(logged_in() === true) {
    $session_id = $_SESSION['id'];
    $user_data = user_data( $session_id, 'id', 'name', 'role', 'password','email','profile');
    $staff_data = staff_data( $session_id, 'id', 'first_name', 'last_name', 'email','password','role');
    $stu_data = stu_data( $session_id, 'id', 'fullname', 'coursename','name_w_initials','email');
    $coursecodinator_data = coursecodinator_data( $session_id, 'id','fullname', 'email', 'password');

}




?>



