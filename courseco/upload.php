<?php

//require '../core/init.php';


if (isset($_FILES['slide']) === true and empty($_FILES['slide']['name'])=== false ) {

    $allowed=array('jpg','jpeg','gif','png');
    $file_name = $_FILES['slide']['name'];
    $file_extn= strtolower(end(explode('.',$file_name)));
    $file_temp=$_FILES['slide']['tmp_name'];



    if (in_array($file_extn,$allowed) === true) {
        $res = uploadsilde($file_temp,$file_extn);

    }

}