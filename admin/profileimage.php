
<?php
require '../core/init.php';
error_reporting(0);

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}

$id = $user_data['id'];

if (isset($_FILES['profile']) === true and empty($_FILES['profile']['name'])=== false ) {

    $allowed=array('jpg','jpeg','gif','png');
    $file_name = $_FILES['profile']['name'];
    $file_extn= strtolower(end(explode('.',$file_name)));
    $file_temp=$_FILES['profile']['tmp_name'];


    if (in_array($file_extn,$allowed) === true) {
        $res = changeimage($id,$file_temp,$file_extn);

    }

    echo $res;

}



?>