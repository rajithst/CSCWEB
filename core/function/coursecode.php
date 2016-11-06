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


function getcourse_cord($id){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT coursename,courseid FROM courses WHERE coursecodeid = $id ";
    $query = mysqli_query($con, $sql);
    return $query;


}

function getsubs_cord($course){
$con = mysqli_connect('localhost','root','rajith','csc');
    $sql = "SELECT subject FROM subject WHERE courseid = (SELECT courseid FROM courses WHERE coursename = '$course')";
    
    
}

function uploadsilde($file_temp,$file_extn){

    $con = mysqli_connect('localhost','root','rajith','csc');
    $file_path = 'slides/'.substr(md5(time()), 0, 10).'.'.$file_extn;
    move_uploaded_file($file_temp, $file_path);
    $query = "INSERT INTO slides (path) VALUES ($file_path)";
    mysqli_query($con, $query);
    return $file_path;
}



function  insertslides($data){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $fields='`' .implode('`,`' ,array_keys($data)) . '`';
    $vals= '\'' . implode('\', \'' ,$data ) . '\' ';
    $sql = "INSERT INTO slides ($fields) VALUES ($vals)";
    $query = mysqli_query($con, $sql);

    if ($query){

        return true;
    }

}

function getslides($subid){
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM slides WHERE subjectid = '$subid'";
    $query = mysqli_query($con, $sql);
    return $query;

}

function getccdata($id){
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM staff WHERE id = $id ";
    $query = mysqli_query($con, $sql);
    return $query;
}


