<?php


function staff_id_from_email($email){
    $con = mysqli_connect('localhost','root','rajith','csc');

    $sql = "SELECT id FROM staff  WHERE email = '$email'";
    $query = mysqli_query($con,$sql);
    $fetcharray=mysqli_fetch_array($query,MYSQLI_NUM);
    return $fetcharray[0];

}


function loginall($email,$password){
    $con = mysqli_connect('localhost','root','rajith','csc');
    $user_id= staff_id_from_email($email);
    $password = md5($password);

    $query=mysqli_query($con,"SELECT * FROM staff WHERE email= '$email' AND password='$password'");
    $result=mysqli_num_rows($query);

    if($result == 1){

        return $user_id;
    } else{

        return false;
    }



}


function staff_data($id){
    $con = mysqli_connect('localhost','root','','CSC');
    $data =array();
    $id= (int)$id;

    $get_num = func_num_args();
    $get_args =func_get_args();

    if($get_num>1){
        unset($get_args[0]);
        $fields = '`'. implode('`,`',$get_args). '`';

        $res=mysqli_query($con,"SELECT $fields FROM staff WHERE id= $id");
        $data = mysqli_fetch_assoc($res);
        return $data;

    }

}