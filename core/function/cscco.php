<?php


function getsubsfor(){
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM subjects";
    $res = mysqli_query($con, $sql);
    return $res;


}

function getlecs(){
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM lecturers";
    $res = mysqli_query($con, $sql);
    return $res;


}

?>