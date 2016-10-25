<?php
$con = mysqli_connect('localhost', 'root', '',  'csc');


function coursecodinator_data($id){

    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $data = array();
    $id   = (int) $id;

    $get_num  = func_num_args();
    $get_args = func_get_args();

    if ($get_num > 1) {
        unset($get_args[0]);
        $fields = '`'.implode('`,`', $get_args).'`';
        $res  = mysqli_query($con, "SELECT $fields FROM csc_courseco WHERE userid= $id");
        $data = mysqli_fetch_assoc($res);
        return $data;

    }


}


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

function getslides($subid){
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $sql = "SELECT * FROM slides WHERE subjectid = '$subid'";
    $query = mysqli_query($con, $sql);
    return $query;

}

function getccdata($id){
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $sql = "SELECT * FROM staff WHERE id = $id ";
    $query = mysqli_query($con, $sql);
    return $query;
}