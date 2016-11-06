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
