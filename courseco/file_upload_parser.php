<?php

if (isset($_GET['id']) and isset($_GET['name'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
}
$desc = $_POST["desc"];
$title = $_POST["title"];
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; 
$date = date("Y-m-d");
// 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(file_exists("test_uploads/".$fileName)){
	echo "Sorry, file already exists.";
	$fileupload_ok = 0;
}else{
	$fileupload_ok = 1;
}

if ($fileupload_ok == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if(move_uploaded_file($fileTmpLoc, "test_uploads/$fileName")){
    echo "$fileName was Uploaded successfully";

	$con = mysqli_connect("localhost", "root", "rajith","csc") or die(mysql_error()) ;

   	mysqli_query($con,"INSERT INTO fileuploads(date,subject,subject_code,title,description,file)
    VALUES ('$date', '$name','$id','$title','$desc','courseco/test_uploads/$fileName')") ;

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>