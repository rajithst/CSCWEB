<?php


function user_data($id) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $data = array();
    $id   = (int) $id;

    $get_num  = func_num_args();
    $get_args = func_get_args();

    if ($get_num > 1) {
        unset($get_args[0]);
        $fields = '`'.implode('`,`', $get_args).'`';

        $res  = mysqli_query($con, "SELECT $fields FROM `adminusers` WHERE `id`= $id");
        $data = mysqli_fetch_assoc($res);
        return $data;

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


function stu_data($id) {

    $con = mysqli_connect('localhost', 'root', '',  'csc');
    $data = array();


    $get_num  = func_num_args();
    $get_args = func_get_args();

    if ($get_num > 1) {
        unset($get_args[0]);
        $fields = '`'.implode('`,`', $get_args).'`';
        $res  = mysqli_query($con, "SELECT $fields FROM student WHERE id= '$id'");
        $data = mysqli_fetch_assoc($res);
        return $data;

    }

}


function coursecodinator_data($id){

    $con = mysqli_connect('localhost','root','','csc');
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