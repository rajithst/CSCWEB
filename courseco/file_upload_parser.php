<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';


if (isset($_GET['id']) and isset($_GET['name']) and isset($_GET['fname'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $fname = $_GET['fname'];
}
$desc = $_POST["desc"];
$title = $_POST["title"];
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; 
$date = date("Y-m-d");



$fileupload_ok = 1;// 0 for false... and 1 for true


if (!$fileTmpLoc) { // if file not chosen
    echo $fileErrorMsg;
    exit();
}
/*if(file_exists("../uploads/".$fileName)){
	echo "Sorry, file already exists.";
	$fileupload_ok = 0;
}else{
	$fileupload_ok = 1;
}*/

if ($fileupload_ok == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if(move_uploaded_file($fileTmpLoc, "../uploads/$fileName")){

        echo 1;
        //echo '<h4><strong>'.$fileName.' was Uploaded successfully !'.'</strong></h4>';

   	mysqli_query($con,"INSERT INTO fileuploads(date,subject,subject_code,title,description,filename,file)
    VALUES ('$date', '$name','$id','$title','$desc','$fname','uploads/$fileName')");
    

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>