<?php

function getall(){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT * FROM courses";
    $query    = mysqli_query($con, $sql);

    return $query;

}

function getstudents($subid){

    $sql = "SELECT * FROM student WHERE coursename = ( SELECT subject FROM subjects WHERE subjectid='$subid')";
    $con = mysqli_connect('localhost','root','rajith','csc');
    $query    = mysqli_query($con, $sql);

    return $query;


}

function getsubdata($subid){

    $sql = "SELECT *FROM subjects WHERE subjectid='$subid'";
    $con = mysqli_connect('localhost','root','rajith','csc');
    $query    = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);

    return $data;

}

function markattendance($postdata){

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $fields = '`'.implode('`,`', array_keys($postdata)).'`';
    $data   = '\''.implode('\', \'', $postdata).'\' ';

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

function unregistered(){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT * FROM student WHERE registered=0";
    $res = mysqli_query($con,$sql);
    return $res;


}