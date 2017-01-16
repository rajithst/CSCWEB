<?php

function getall($con){

    $sql = "SELECT * FROM courses";
    $query    = mysqli_query($con, $sql);

    return $query;

}

function getstudents($con,$subid,$token){

    $sql = "SELECT * FROM student WHERE coursename = '$subid' AND batch = '$token' AND registered=1";
    $query    = mysqli_query($con, $sql);

    return $query;


}

function getsubdata($con,$subid){

    $sql = "SELECT *FROM subjects WHERE subjectid='$subid'";

    $query    = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);

    return $data;

}

function markattendance($postdata){

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $fields = '`'.implode('`,`', array_keys($postdata)).'`';
    $data   = '\''.implode('\', \'', $postdata).'\' ';

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

function unregistered($con){

    $sql = "SELECT * FROM student WHERE registered=0";
    $res = mysqli_query($con,$sql);
    return $res;


}

function  getallsubjects($con){

    $sql = "SELECT * FROM subjects";
    $res = mysqli_query($con,$sql);
    return $res;


}

function getstudentsfor($con,$subid,$batch){

    $sql = "SELECT * FROM student WHERE registered=1 AND coursename = '$subid' AND batch = $batch";

    $res = mysqli_query($con,$sql);
    $numrows = mysqli_num_rows($res);

    return  array($numrows,$res);
}