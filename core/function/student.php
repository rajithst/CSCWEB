<?php



function loginstudent($username,$password) {

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    //$user_id  = user_id_from_nic($password);
    $user_id  = $password;
    $sql      = "SELECT * FROM student WHERE username= 'csc@gmail.com' AND nic='$password'";

    $query    = mysqli_query($con, $sql);
    $result   = mysqli_num_rows($query);

    return ($result == 1)? $user_id:false;

}


function getposts(){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT * FROM posts WHERE student =1";
    $res = mysqli_query($con,$sql);
    return $res;



}

function getadmin($id){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT name,profile From adminusers WHERE id=$id";
    $res = mysqli_query($con,$sql);
    return $res;

}


function getcourse($id,$subject){
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT coursename FROM courses WHERE courseid=(SELECT courseid FROM subjects WHERE subject = '$subject')";
    $query      = mysqli_query($con, $sql);
    $fetcharray = mysqli_fetch_array($query);
    return $fetcharray[0];
    
    
    
    
}

function getsubjects($course){
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT subject,subjectid FROM subjects WHERE courseid=(SELECT courseid FROM courses WHERE coursename='$course') ";
    $query      = mysqli_query($con, $sql);
    return $query;

}
