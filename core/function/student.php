<?php

$con = mysqli_connect('localhost', 'root', '',  'csc');

/*function user_id_from_nic($nic) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $sql        = "SELECT id FROM student  WHERE nic = '$nic'";
    $query      = mysqli_query($con, $sql);
    $fetcharray = mysqli_fetch_array($query);
    return $fetcharray[0];

}*/

function loginstudent($username,$password) {

    $con = mysqli_connect('localhost', 'root', '',  'csc');
    //$user_id  = user_id_from_nic($password);
    $user_id  = $password;
    $sql      = "SELECT * FROM student WHERE username= 'csc@gmail.com' AND nic='$password'";

    $query    = mysqli_query($con, $sql);
    $result   = mysqli_num_rows($query);

    return ($result == 1)? $user_id:false;

}


function getposts(){
    $con = mysqli_connect('localhost','root','','csc');
    $sql = "SELECT * FROM posts WHERE student =1";
    $res = mysqli_query($con,$sql);
    return $res;



}

function getadmin($id){
    $con = mysqli_connect('localhost','root','','csc');
    $sql = "SELECT name,profile From adminusers WHERE id=$id";
    $res = mysqli_query($con,$sql);
    return $res;

}

function stu_data($id) {

    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $data = array();


    $get_num  = func_num_args();
    $get_args = func_get_args();

    if ($get_num > 1) {
        unset($get_args[0]);
        $fields = '`'.implode('`,`', $get_args).'`';
        $res  = mysqli_query($con, "SELECT $fields FROM student WHERE nic= '$id'");
        $data = mysqli_fetch_assoc($res);
        return $data;

    }

}

function getcourse($id,$subject){
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $sql = "SELECT coursename FROM courses WHERE courseid=(SELECT courseid FROM subjects WHERE subject = '$subject')";
    $query      = mysqli_query($con, $sql);
    $fetcharray = mysqli_fetch_array($query);
    return $fetcharray[0];
    
    
    
    
}