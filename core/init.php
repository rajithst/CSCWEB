<?php

session_start();

require 'db/database.php';
require 'function/admin.php';
require 'function/frontend.php';


$current_file= explode('/',$_SERVER['SCRIPT_NAME']);
$current_file=end($current_file);



if(logged_in() === true) {
    $session_id = $_SESSION['id'];
    $user_data = user_data($con, $session_id, 'id', 'name', 'role', 'password','email','profile');
    $staff_data = staff_data($con, $session_id, 'id', 'first_name', 'last_name', 'email','password','role');




    $errors = [];
}




?>



