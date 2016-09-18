<?php
$con = mysqli_connect('localhost', 'root', '',  'csc');

function getcourse_cord($id){
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $sql = "SELECT coursename,courseid FROM courses WHERE coursecodeid = $id ";
    $query = mysqli_query($con, $sql);
    return $query;


}

function getsubs_cord($course){

    $sql = "SELECT subject FROM subject WHERE courseid = (SELECT courseid FROM courses WHERE coursename = '$course')";
    
    
}