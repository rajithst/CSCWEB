<?php
$con = mysqli_connect('localhost','root','','CSC');

function staff_id_from_email($con,$email){

    $sql = "SELECT `id` FROM `staff`  WHERE `email` = '$email'";
    $query = mysqli_query($con,$sql);
    $fetcharray=mysqli_fetch_array($query,MYSQLI_NUM);
    return $fetcharray[0];

}


function loginall($con,$email,$password){

    $user_id= staff_id_from_email($con,$email);
    $password = md5($password);

    $query=mysqli_query($con,"SELECT * FROM `staff` WHERE `email`= '$email' AND `password`='$password'");
    $result=mysqli_num_rows($query);

    if($result == 1){

        return $user_id;
    } else{

        return false;
    }



}


function staff_data($con,$id){
    $data =array();
    $id= (int)$id;

    $get_num = func_num_args();
    $get_args =func_get_args();

    if($get_num>1){
        unset($get_args[0],$get_args[1]);
        $fields = '`'. implode('`,`',$get_args). '`';

        $res=mysqli_query($con,"SELECT $fields FROM `staff` WHERE `id`= $id");
        $data = mysqli_fetch_assoc($res);
        return $data;

    }

}