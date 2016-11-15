<?php

function user_id_from_nic($password) {
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');

    $sql        = "SELECT id FROM student  WHERE nic = '$password'";
    $query      = mysqli_query($con, $sql);
    $fetcharray = mysqli_fetch_array($query);
    return $fetcharray[0];

}


function loginstudent($username,$password) {

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $user_id  = user_id_from_nic($password);
    $sql      = "SELECT * FROM student WHERE username= 'csc@gmail.com' AND nic='$password' AND registered = 1 ";
    $query    = mysqli_query($con, $sql);
    $result   = mysqli_num_rows($query);

    return ($result == 1)? $user_id:false;

}


function getpostss(){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT * FROM posts WHERE type =1 ORDER BY id DESC ";
    $res = mysqli_query($con,$sql);
    return $res;



}

function getadmins($id){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT name,profile From adminusers WHERE id=$id";
    $res = mysqli_query($con,$sql);
    return $res;

}


function getsubname($subid){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT * FROM subjects WHERE subjectid='$subid'";
    $res = mysqli_query($con,$sql);
    return $res;

}