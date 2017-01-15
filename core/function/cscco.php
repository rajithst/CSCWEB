<?php

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

function getsubsfor($con){

    $sql = "SELECT * FROM subjects";
    $res = mysqli_query($con, $sql);
    return $res;


}

function getlecs($con){

    $sql = "SELECT * FROM lecturers";
    $res = mysqli_query($con, $sql);
    return $res;


}

function getcoursefor($con){



    $sql = "SELECT * FROM courses";
    $res = mysqli_query($con, $sql);
    return $res;

}

function getcoursecodinators($con){


    $sql = "SELECT * FROM staff WHERE role = 'Course Coordinator'";
    $res = mysqli_query($con, $sql);
    return $res;
}

function getentire($con,$subject){


    $sql = "SELECT * FROM posts WHERE subject = '$subject'";
    $res = mysqli_query($con, $sql);
    return $res;


}


function register_lect( $con,$register_data){


    $fields='`' .implode('`,`' ,array_keys($register_data)) . '`';
    $data = '\'' . implode('\', \'' ,$register_data ) . '\' ';
    $q = mysqli_query($con,"INSERT INTO lecturers($fields) VALUES ($data)");

    if ($q){

        return true;
    }

}

function register_lecti( $con,$register){


    $fields='`' .implode('`,`' ,array_keys($register)) . '`';
    $data = '\'' . implode('\', \'' ,$register ) . '\' ';
    $r = mysqli_query($con,"INSERT INTO lectures($fields) VALUES ($data)");

    if ($r){

        return true;
    }

}
function getsubsbyid($con,$id){


    $sql = "SELECT * FROM subjects WHERE courseid = '$id'";
    $res = mysqli_query($con, $sql);
    return $res;

}

function addnewcourse( $con,$register_data){

    $fields='`' .implode('`,`' ,array_keys($register_data)) . '`';
    $data = '\'' . implode('\', \'' ,$register_data ) . '\' ';
    $q = mysqli_query($con,"INSERT INTO subjects($fields) VALUES ($data)");


}

function getcoursedetails($con){

    $sql = "SELECT courseid,coursename FROM courses";
    $res = mysqli_query($con,$sql);
    return $res;
}

function getsubdetails($con){

    $sql = "SELECT subject FROM subjects ";
    $res = mysqli_query($con,$sql);
    return $res;

}


function getsubid($con,$subname){

    $sql = "SELECT subjectid FROM subjects WHERE subject='$subname'";
    $res = mysqli_query($con,$sql);
    return $res;

}


function getStudentContact($con,$subid){
    
    $sql = "SELECT home_mobile FROM student WHERE coursename='$subid'";
    $res = mysqli_query($con,$sql);
    return $res;

}

?>