<?php


function loginall($email,$password){
    $con = mysqli_connect('localhost','root','','csc');
    $password = md5($password);

    $query=mysqli_query($con,"SELECT * FROM staff WHERE email= '$email' AND password='$password'");
    $result=mysqli_num_rows($query);

    if($result == 1){

        return true;
    } else{

        return false;
    }



}

function staff_data($id){
    $con = mysqli_connect('localhost','root','','csc');
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