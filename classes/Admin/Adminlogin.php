<?php

/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 1/21/17
 * Time: 11:21 AM
 */

require '../lib/Session.php';

    Session::checkLogin(); //since checklogin is a static method call it statically

require_once '../lib/Database.php';
require_once '../helpers/Format.php';

class Adminlogin{


    private $db;
    private $fm;

    /**
     * Adminlogin constructor.
     */
    public function __construct(){

       $this->db= new Database();
       $this->fm = new Format();
    }


    public function adminLogin($adminEmail,$adminPass){

        $adminEmail = $this->fm->validation($adminEmail);
        $adminPass = $this->fm->validation($adminPass);


        $adminEmail = mysqli_real_escape_string($this->db->link,$adminEmail);
        $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

        if (empty($adminEmail) || empty($adminPass)){
            $loginmsgs = "Username or Password not be empty";
            return $loginmsgs;
        } else {

            $query = "SELECT * FROM adminusers WHERE email='$adminEmail' AND password = '$adminPass'";
            $result = $this->db->select($query);
            if ($result!=false){
                $value = $result->fetch_assoc();
                Session::set("adminlogin",true);
                Session::set("adminid",$value['id']);
                Session::set("adminUser",$value['name']);
                Session::set("adminEmail",$value['email']);
                Session::set("adminRole",$value['role']);
                Session::set("adminProfile",$value['profile']);
                header("location:home.php");
            }else{
                $loginmsgs = "<center><div class='alert alert-danger'><strong>Username or Password not Matching</div></center>";
                return $loginmsgs;
            }
        }

    }
}