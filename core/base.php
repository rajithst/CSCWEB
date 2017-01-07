<?php
$con = mysqli_connect('localhost','root','rajith','csc');

$current_file= explode('/',$_SERVER['SCRIPT_NAME']);
$current_file=end($current_file);

if ($current_file != 'index.php') {
    function logged_in()
    {

        return (isset($_SESSION['id'])) ? true : false;

    }
}






?>