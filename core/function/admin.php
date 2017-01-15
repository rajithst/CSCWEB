<?php


function user_id_from_email($con,$email) {
	$sql        = "SELECT id FROM adminusers  WHERE email = '$email'";
	$query      = mysqli_query($con, $sql);
	$fetcharray = mysqli_fetch_array($query);
	return $fetcharray[0];

}

function login( $con,$email, $password) {
	$user_id  = user_id_from_email($con,$email);
	$password = md5($password);
	$sql      = "SELECT * FROM adminusers WHERE email= '$email' AND password='$password'";

	$query    = mysqli_query($con, $sql);
	$result   = mysqli_num_rows($query);

	return ($result == 1)? $user_id:false;

}



function adminusers( $con,$id) {
	$sql = "SELECT id,name,role,email FROM adminusers WHERE id =$id";
	$res = mysqli_query($con, $sql);
	return $res;

}

function postdata($con,$postdata) {

	$fields = '`'.implode('`,`', array_keys($postdata)).'`';
	$data   = '\''.implode('\', \'', $postdata).'\' ';

	$sql = "INSERT INTO posts ($fields) VALUE ($data)";
	$res = mysqli_query($con, $sql);
	return 'true';

}


function postdraftedited($con,$update_data,$postid){
		
	$update=array();
	
	foreach ($update_data as $field => $data) {
		$update[]= '`' . $field . '` = \'' . $data . '\'';
	}
	$sql = "UPDATE posts SET" . implode(' , ',$update) . "WHERE id = $postid";
	mysqli_query($con,$sql);
	return 'true';
	
}


function updateuser($con, $id,$postdata){
    $update=array();

    foreach ($postdata as $field => $data) {
        $update[]= '`' . $field . '` = \'' . $data . '\'';
    }
    $sql = "UPDATE staff SET" . implode(' , ',$update) . "WHERE id = $id";
    mysqli_query($con,$sql);
    return 'true';
}


function savedraftedited($con,$postdata,$postid){
	
	$update=array();
	
	foreach ($update_data as $field => $data) {
		$update[]= '`' . $field . '` = \'' . $data . '\'';
	}
	$sql = "UPDATE posts SET" . implode(' , ',$update) . "WHERE id = $postid";
	mysqli_query($con,$sql);
	return 'true';
	
	
}

function published($con) {

	$sql = "SELECT * FROM posts WHERE type=1";
	$res = mysqli_query($con, $sql);
	return $res;

}

function putdraft( $con,$postdata) {
	$fields = '`'.implode('`,`', array_keys($postdata)).'`';
	$data   = '\''.implode('\', \'', $postdata).'\' ';

	$sql = "INSERT INTO posts ($fields) VALUE ($data)";
	
	$res = mysqli_query($con, $sql);
	return 'ture';

}

function draftpost($con) {
	$sql = "SELECT * FROM posts WHERE type=0";
	$res = $con->query($sql);
	return $res;

}





function getcurrentstatus($id,$con){
	$sql = "SELECT active FROM subjects WHERE id = $id";
	$res = mysqli_query($con, $sql);
	while ( $data = $res->fetch_array()){

		$result = $data[0];

	}
	return $result;
}

function readpost($con,$id){

	$sql = "SELECT * FROM posts WHERE id = $id";
	$res = mysqli_query($con, $sql);
	return ($res);
}

function admindataforposts($con,$result){

	$sql = "SELECT * FROM adminusers WHERE id=$result ";
	$res = mysqli_query($con, $sql);
	return $res;

}




function allusers($con) {
	$sql = "SELECT * FROM staff";
	$res = mysqli_query($con, $sql);
	return $res;

}


function adduser($con,$postdata) {
	 
	$fields = '`'.implode('`,`', array_keys($postdata)).'`';
	$data   = '\''.implode('\', \'', $postdata).'\' ';

	$sql = "INSERT INTO staff ($fields) VALUE ($data)";
	mysqli_query($con, $sql);
	return 'true';

}

function email($to, $subject, $body) {
	mail($to, $subject, $body, ' From:Computer and Service Center - University of Colombo School of Computing');
}

function changeimage( $user_id, $file_temp, $file_extn) {
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
	$file_path = '../public/dist/img/profile/'.substr(md5(time()), 0, 10).'.'.$file_extn;
	move_uploaded_file($file_temp, $file_path);
	$query = "UPDATE adminusers SET profile = '".$file_path."' WHERE id= ".(int) $user_id;
	mysqli_query($con, $query);
	return $file_path;

}

function addevent($con,$postdata){

    $fields = '`'.implode('`,`', array_keys($postdata)).'`';
    $data   = '\''.implode('\', \'', $postdata).'\' ';

    $sql = "INSERT INTO events ($fields) VALUE ($data)";
    $res = mysqli_query($con, $sql);
    return 'ture';
}





function getallstaff(){
	$con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
	$sql = "SELECT * FROM staff";
	$res = mysqli_query($con, $sql);
	return $res;


}

function getmessages($con,$id,$adid){

    $sql = "SELECT * FROM chat WHERE sent =$adid AND rcvd=$id  OR sent =$id AND rcvd=$adid";
    $res = mysqli_query($con, $sql);
    return $res;
}

function getpersondata($con,$id){
    $sql = "SELECT * FROM staff WHERE id = $id";
    $res = mysqli_query($con, $sql);
    return $res;

}

function insertMessage($con,$id,$adid,$message){
    $date = time();
    $sql = "INSERT INTO chat(sent,rcvd,sentmsg,time) VALUE ('$adid','$id','$message','$date')";
    $res = mysqli_query($con, $sql);
    return $res;
}

function getRegisteredStudents($con){

    $sql = "SELECT * FROM student WHERE registered = 1";
    $res = mysqli_query($con, $sql);
    $x = mysqli_num_rows($res);
    return $x;
}

function getstaff($con){

    $sql = "SELECT * FROM staff";
    $res = mysqli_query($con, $sql);
    $x = mysqli_num_rows($res);
    return $x;
}

function getsubjects($con){

    $sql = "SELECT * FROM subjects";
    $res = mysqli_query($con, $sql);
    return $res;


}

function getcoursecodinators($con){


    $sql = "SELECT * FROM staff WHERE role = 'Course Coordinator'";
    $res = mysqli_query($con, $sql);
    return $res;
}



function updatedata($con,$postdata,$id){

    $update=array();

    foreach ($postdata as $field => $data) {
        $update[]= '`' . $field . '` = \'' . $data . '\'';
    }
    $sql = "UPDATE subjects SET" . implode(' , ',$update) . "WHERE id = $id";
    mysqli_query($con,$sql);
    return 'true';

}
