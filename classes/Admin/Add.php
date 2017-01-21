<?php

/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 1/21/17
 * Time: 3:12 PM
 */

require_once '../lib/Database.php';
require_once '../helpers/Format.php';
class Add{

    public $db;

    /**
     * Add constructor.
     * @param $db
     */
    public function __construct(){

        $this->db = new Database();
    }

    public function addUsers($post_data){

        if (in_array(null, $post_data)){
            $msgs = "<center><div class='alert alert-danger'><strong>Operation Failed!</strong> <br> All User Detais should Insert </div></center>";
            return $msgs;
        } else {

            $fields = '`'.implode('`,`', array_keys($post_data)).'`';
            $data   = '\''.implode('\', \'', $post_data).'\' ';

            $query = "INSERT INTO staff ($fields) VALUE ($data)";
            $result = $this->db->insert($query);
            if ($result!=false){




                $msgs = "<center><div class='alert alert-success'><strong>Success!</strong> <br> User Inserted Successfully </div></center>";
                return $msgs;
            }else{
                $msgs = "<center><div class='alert alert-danger'><strong>Operation Failed!</strong> <br> User Not Inserted </div></center>";
                return $msgs;
            }
        }



    }


}