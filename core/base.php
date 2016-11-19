<?php
$con = mysqli_connect('localhost','root','rajith','csc');


function logged_in() {

    return (isset($_SESSION['id']))?true:false;

}






?>