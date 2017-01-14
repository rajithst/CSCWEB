<?php

function getpostss($con){

    $sql = "SELECT * FROM posts WHERE type =1 ORDER BY id DESC ";
    $res = mysqli_query($con,$sql);
    return $res;



}

function getadmins($con,$id){

    $sql = "SELECT name,profile From adminusers WHERE id=$id";
    $res = mysqli_query($con,$sql);
    return $res;

}


function getcourse_cord($con,$id){

    $sql = "SELECT coursename,courseid FROM courses WHERE coursecodeid = $id ";
    $query = mysqli_query($con, $sql);
    return $query;


}


function getslides($con,$subid){

    $sql = "SELECT * FROM subjects WHERE subjectid = '$subid'";
    $query = mysqli_query($con, $sql);
    return $query;

}

function getccdata($id){
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT * FROM staff WHERE id = $id ";
    $query = mysqli_query($con, $sql);
    return $query;
}


function getentire($con,$subject){

    $sql = "SELECT * FROM posts WHERE subject = '$subject'";
    $res = mysqli_query($con, $sql);
    return $res;


}

function getcourses($con,$id){

    $sql = "SELECT * FROM subjects  WHERE coursecid=$id";
    $res = mysqli_query($con, $sql);
    return $res;

}

function submission($con,$regdata){

    $fields='`' .implode('`,`' ,array_keys($regdata)) . '`';
    $vals= '\'' . implode('\', \'' ,$regdata ) . '\' ';
    $sql = "INSERT INTO submissions ($fields) VALUES ($vals)";

    $query = mysqli_query($con, $sql);


}
function getSubmissionData($con,$subid){
    $sql = "SELECT * FROM submissions WHERE subid='$subid'";
    $query = mysqli_query($con, $sql);
    return $query;
}


function getsubmitteddata($con,$subid,$assid){

    $sql = "SELECT * FROM assignmentsubmissions WHERE subid='$subid' AND assid=$assid";
    $query = mysqli_query($con, $sql);
    return $query;
}
function update_settings($con,$fname,$lname,$email,$password,$id){

    $sql = "UPDATE staff SET first_name='$fname', last_name='$lname', email='$email', password='$password' WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        
    return true;
}

function removefolder($folder){
    if(is_dir($folder)===true){
        $foldercontents = scandir($folder);
        unset($foldercontents[0],$foldercontents[1]);
        foreach ($foldercontents as $content => $contentname) {
            $currentpath = $folder.'/'.$contentname;
            $filetype = filetype($currentpath);
            //echo "$filetype"."<br>";
            if($filetype=='dir'){
                removefolder($currentpath);
            }else{
                unlink($currentpath);
            }
            unset($foldercontents[$content]);
        }
        rmdir($folder);
    }
}

}