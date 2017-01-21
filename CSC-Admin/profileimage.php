<?php include 'components/admust.php';

$id = $user_data['id'];

if (isset($_FILES['profile']) === true and empty($_FILES['profile']['name'])=== false ) {

    $allowed=array('jpg','jpeg','gif','png');
    $file_name = $_FILES['profile']['name'];
    $file_extn= strtolower(end(explode('.',$file_name)));
    $file_temp=$_FILES['profile']['tmp_name'];


    if (in_array($file_extn,$allowed) === true) {
        $res = changeimage($id,$file_temp,$file_extn);

    }

    header('location:profilesettings.php');
    exit();

}



?>