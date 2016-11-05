<?php

function user_id_from_email($email) {
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');

    $sql        = "SELECT id FROM staff  WHERE email = '$email'";
    $query      = mysqli_query($con, $sql);
    $fetcharray = mysqli_fetch_array($query);
    return $fetcharray[0];

}


if (isset($_GET['email']) and isset($_GET['pass']) ){

    $email = $_GET['email'];
    $password = $_GET['pass'];

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $user_id  = user_id_from_email($email);

    $sql = "SELECT * FROM $table WHERE email = '$email' AND password = '$password'";
    $query    = mysqli_query($con, $sql);
    $result   = mysqli_num_rows($query);
    if($result == 1){

    $sql2 = "SELECT role FROM staff WHERE email = '$email'";
    $query=mysqli_query($con,$sql2);
    $fetcharray = mysqli_fetch_array($query);
    $role =  $fetcharray[0];

    return  array($user_id,$role);

    }else{

        return false;
    }

}
