<?php

session_start();

require 'db/database.php';
require 'function/admin.php';


$current_file= explode('/',$_SERVER['SCRIPT_NAME']);
$current_file=end($current_file);

 ;

if(logged_in() === true) {
    $session_id = $_SESSION['id'];
    $user_data = user_data($con, $session_id, 'id', 'name', 'role', 'email','profile');

    $errors = [];
}




?>



