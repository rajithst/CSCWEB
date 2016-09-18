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

function uploadsilde($file_temp,$file_extn){

    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $file_path = 'slides/'.substr(md5(time()), 0, 10).'.'.$file_extn;
    move_uploaded_file($file_temp, $file_path);
    $query = "INSERT INTO slides (path) VALUES ($file_path)";
    mysqli_query($con, $query);
    return $file_path;
}

function getallfucks($subid){
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $sql = "SELECT subject FROM subjects WHERE subjectid='$subid'";
    $query = mysqli_query($con, $sql);
    $fetcharray = mysqli_fetch_array($query);
    return $fetcharray[0];



}

function  insertslides($data){
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $fields='`' .implode('`,`' ,array_keys($data)) . '`';
    $vals= '\'' . implode('\', \'' ,$data ) . '\' ';
    $sql = "INSERT INTO slides ($fields) VALUES ($vals)";
    $query = mysqli_query($con, $sql);

    if ($query){

        return true;
    }

}