<?php

/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 1/21/17
 * Time: 3:54 PM
 */
require_once '../lib/Database.php';
require_once '../helpers/Format.php';

class Retrieve{

    public $db;

    /**
     * Retrieve constructor.
     * @param $db
     */
    public function __construct(){

       $this->db = new Database();

    }

    public function allUsers(){

        $query = "SELECT * FROM staff";
        $result = $this->db->select($query);
        if ($result!=false){
            return $result;
        }else{
            $msgs = "<center><div class='alert alert-danger'><strong>Operation Failed!</strong> <br> Something Wrong in this Page</div></center>";
            return $msgs;
        }


    }


}

/**
* 
*/
class Edit{
    
       public $db;

    /**
     * Retrieve constructor.
     * @param $db
     */
    public function __construct(){

       $this->db = new Database();

    }

    public function editUser($id){

        $query = "SELECT * FROM staff WHERE id=$id";
        $result = $this->db->select($query);
        if ($result!=false){
            return $result;
        }else{
            $msgs = "<center><div class='alert alert-danger'><strong>Operation Failed!</strong> <br> Something Wrong in this Page</div></center>";
            return $msgs;
        }
    }
}

class Update{

     public $db;

    /**
     * Retrieve constructor.
     * @param $db
     */
    public function __construct(){

       $this->db = new Database();

    }


    public function updateUser($post_data,$id){

    $update=array();
    
    foreach ($post_data as $field => $data) {
        $update[]= '`' . $field . '` = \'' . $data . '\'';
    }
    $query = "UPDATE staff SET" . implode(' , ',$update) . "WHERE id = $id";
    $result = $this->db->update($query);
        if ($result!=false){
            $msgs = "<center><div class='alert alert-success'><strong>Success!</strong> <br> User has been Updated Successfully</div></center>";
            return $msgs;
        }else{
            $msgs = "<center><div class='alert alert-danger'><strong>Operation Failed!</strong> <br> Something Wrong in this Page</div></center>";
            return $msgs;
        }
    

    }
    

}