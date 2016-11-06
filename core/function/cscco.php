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

function getcoursefor(){


    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM courses";
    $res = mysqli_query($con, $sql);
    return $res;

}

function getcoursecodinators(){

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM staff WHERE role = 'Course Coordinator'";
    $res = mysqli_query($con, $sql);
    return $res;
}

?>