<?php
require '../core/init.php';
require 'function/admin.php';
error_reporting(0);
if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}