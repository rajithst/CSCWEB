<?php
$con = mysqli_connect('localhost','root','rajith','csc');

$current_file= explode('/',$_SERVER['SCRIPT_NAME']);
$current_file=end($current_file);


    function logged_in()
    {

        return (isset($_SESSION['id'])) ? true : false;

    }







?>