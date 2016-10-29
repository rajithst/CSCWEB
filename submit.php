<?php

function user_id_from_email($email,$table) {
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');

    $sql        = "SELECT userid FROM $table  WHERE email = '$email'";
    $query      = mysqli_query($con, $sql);
    $fetcharray = mysqli_fetch_array($query);
    return $fetcharray[0];

}


if (isset($_GET['email']) and isset($_GET['pass']) AND isset($_GET['mode'])){

    $email = $_GET['email'];
    $password = $_GET['pass'];
     $role = $_GET['mode'];

        $table = "";

    if ($role === 'CSC Staff'){

        $table = 'csc_staff';

    }elseif ($role === 'Course Cordinator'){

        $table =   'csc_courseco';
    }else{

        $table =   'csc_cscco';
    }

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $user_id  = user_id_from_email($email,$table);

    $sql = "SELECT * FROM $table WHERE email = '$email' AND password = '$password'";
    $query    = mysqli_query($con, $sql);
    $result   = mysqli_num_rows($query);
    if($result == 1){

        echo $user_id;

    }else{

        echo 'false';
    }


}
