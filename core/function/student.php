<?php

function user_id_from_nic($con,$password) {


    $sql        = "SELECT id FROM student  WHERE nic = '$password'";
    $query      = mysqli_query($con, $sql);
    $fetcharray = mysqli_fetch_array($query);
    return $fetcharray[0];

}


function loginstudent($con,$username,$password) {


    $user_id  = user_id_from_nic($con,$password);
    $sql      = "SELECT * FROM student WHERE username= 'csc@gmail.com' AND nic='$password' AND registered = 1 ";
    $query    = mysqli_query($con, $sql);
    $result   = mysqli_num_rows($query);

    return ($result == 1)? $user_id:false;

}


function getpostss($con){

    $sql = "SELECT * FROM posts WHERE type =1 ORDER BY id DESC ";
    $res = mysqli_query($con,$sql);
    return $res;



}

function getadmins($con,$id){

    $sql = "SELECT name,profile From adminusers WHERE id=$id";
    $res = mysqli_query($con,$sql);
    return $res;

}


function getsubname($con,$subid){

    $sql = "SELECT * FROM subjects WHERE subjectid='$subid'";
    $res = mysqli_query($con,$sql);
    return $res;

}

function getslides($con,$subid){

    $sql = "SELECT * FROM fileuploads WHERE subject_code='$subid' ORDER BY id DESC";
    $res = mysqli_query($con,$sql);
    return $res;

}

function getsubmissionlinks($con,$subid){
    $sql = "SELECT * FROM submissions WHERE subid='$subid' ORDER BY id DESC";
    $res = mysqli_query($con,$sql);
    return $res;


}

function getassignmentdata($con,$subid,$assid){

    $sql = "SELECT * FROM submissions WHERE subid='$subid' AND id=$assid";
    $res = mysqli_query($con,$sql);
    return $res;


}

function getsubmissionattempt($con,$name,$subid,$assid){

    $sql = "SELECT * FROM assignmentsubmissions WHERE studentname='$name' AND subid='$subid' AND assid=$assid";

    $res = mysqli_query($con,$sql);
    return $res;


}


function updatedata($con,$column,$update_data,$id){

    $sql = "UPDATE student SET $column = '$update_data' WHERE id=$id";

    $res = mysqli_query($con,$sql);
    return $res;
}


