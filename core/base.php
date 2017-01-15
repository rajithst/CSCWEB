<?php

$host = "localhost";
$user = "root";
$password="";
$database = "csc";
$con = mysqli_connect($host,$user,$password,$database);

$current_file= explode('/',$_SERVER['SCRIPT_NAME']);
$current_file=end($current_file);


    function logged_in()
    {

        return (isset($_SESSION['id'])) ? true : false;

    }







?>