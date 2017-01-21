<?php
/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 1/21/17
 * Time: 11:06 AM
 */
/**
 * Format Class
 */
class Format extends Database {

    public function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date));
    }

    public function textShorten($text, $limit = 400){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text.".....";
        return $text;
    }

    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function title(){
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        //$title = str_replace('_', ' ', $title);
        if ($title == 'index') {
            $title = 'home';
        }elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucfirst($title);
    }

    public function clean($data){
        if (!empty($data)) {
            $data = trim(strip_tags(stripslashes(mysqli_real_escape_string($this->link,$data))));
            return $data;
        }
    }

}
?>
