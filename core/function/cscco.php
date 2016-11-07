<?php

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

function getentire($subject){

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM posts WHERE subject = '$subject'";
    $res = mysqli_query($con, $sql);
    return $res;


}


function register_lect( $register_data){

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $fields='`' .implode('`,`' ,array_keys($register_data)) . '`';
    $data = '\'' . implode('\', \'' ,$register_data ) . '\' ';
    $q = mysqli_query($con,"INSERT INTO lecturers($fields) VALUES ($data)");

    if ($q){

        return true;
    }

}

function getsubsbyid($id){

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM subjects WHERE courseid = '$id'";
    $res = mysqli_query($con, $sql);
    return $res;

}

?>