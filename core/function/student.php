<?php


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