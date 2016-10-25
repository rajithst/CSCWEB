<?php
$con = mysqli_connect('localhost', 'root', '',  'csc');

function user_id_from_email($email) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');

	$sql        = "SELECT id FROM adminusers  WHERE email = '$email'";
	$query      = mysqli_query($con, $sql);
	$fetcharray = mysqli_fetch_array($query);
	return $fetcharray[0];

}

function login( $email, $password) {

    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$user_id  = user_id_from_email($email);
	$password = md5($password);
	$sql      = "SELECT * FROM adminusers WHERE email= '$email' AND password='$password'";
	$query    = mysqli_query($con, $sql);
	$result   = mysqli_num_rows($query);

	return ($result == 1)? $user_id:false;

}

function user_data($id) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$data = array();
	$id   = (int) $id;

	$get_num  = func_num_args();
	$get_args = func_get_args();

	if ($get_num > 1) {
		unset($get_args[0]);
		$fields = '`'.implode('`,`', $get_args).'`';

		$res  = mysqli_query($con, "SELECT $fields FROM `adminusers` WHERE `id`= $id");
		$data = mysqli_fetch_assoc($res);
		return $data;

	}

}

function logged_in() {

	return (isset($_SESSION['id']))?true:false;

}

if (isset($_GET['call'])) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$sql = " SELECT email from staff";
	$res = mysqli_query($con, $sql);

	if (mysqli_num_rows($res) > 0) {

		while ($row = mysqli_fetch_assoc($res)) {

			echo '<option value="'.$row['email'].'">'.$row['email'].'</option>';
		}

	}

}

function adminusers( $id) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$sql = "SELECT id,name,role,email FROM adminusers WHERE id =$id";
	$res = mysqli_query($con, $sql);
	return $res;

}

function postdata($postdata) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$fields = '`'.implode('`,`', array_keys($postdata)).'`';
	$data   = '\''.implode('\', \'', $postdata).'\' ';

	$sql = "INSERT INTO posts ($fields) VALUE ($data)";
	mysqli_query($con, $sql);

}

function published( $id) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$sql = "SELECT posts.adminid,posts.subject,posts.date,adminusers.name,adminusers.role FROM posts INNER JOIN adminusers WHERE type = 1 AND adminusers.id=posts.adminid";
	$res = mysqli_query($con, $sql);
	return $res;

}

function allusers($id) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$sql = "SELECT * FROM staff";
	$res = mysqli_query($con, $sql);
	return $res;

}


function adduser( $postdata) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$fields = '`'.implode('`,`', array_keys($postdata)).'`';
	$data   = '\''.implode('\', \'', $postdata).'\' ';

	$sql = "INSERT INTO staff ($fields) VALUE ($data)";
	mysqli_query($con, $sql);

}

function email($to, $subject, $body) {
	mail($to, $subject, $body, ' From:Computer and Service Center - University of Colombo School of Computing');
}

function changeimage( $user_id, $file_temp, $file_extn) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$file_path = '../public/dist/img/profile/'.substr(md5(time()), 0, 10).'.'.$file_extn;
	move_uploaded_file($file_temp, $file_path);
	$query = "UPDATE adminusers SET profile = '".$file_path."' WHERE id= ".(int) $user_id;
	mysqli_query($con, $query);
	return $file_path;

}

function draftpost() {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$sql = "SELECT * FROM posts WHERE type=2";
	$res = $con->query($sql);
	return $res;

}

function activity_data( $id) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$data = array();
	$id   = (int) $id;

	$get_num  = func_num_args();
	$get_args = func_get_args();

	if ($get_num > 1) {
		unset($get_args[0]);
		$fields = '`'.implode('`,`', $get_args).'`';

		$res  = mysqli_query($con, "SELECT $fields FROM `activity` WHERE `adminid`= $id");
		$data = mysqli_fetch_assoc($res);

		return $data;

	}

}

function backupdata() {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	header('Content-Type: text/csv; charset=utf-8');

	header('Content-Disposition: attachment; filename=members.csv');

	$output = "id,first_name,last_name,email,password,role\n";
	$sql    = 'SELECT * FROM members ORDER BY id ASC';
	$query  = $con->prepare($sql);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		$output .= $rs['id'].",".$rs['first_name'].",".$rs['last_name'].",".$rs['email'].",".$rs['password'].",".$rs['role']."\n";
	}
	// export the output
	echo $output;
	exit;

}

function showtables() {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$sql = "SHOW TABLES";
	$res = $con->query($sql);
	return $res;

}

function putdraft( $postdata) {
    $con = mysqli_connect('localhost', 'root', '',  'csc');
	$fields = '`'.implode('`,`', array_keys($postdata)).'`';
	$data   = '\''.implode('\', \'', $postdata).'\' ';

	$sql = "INSERT INTO posts ($fields) VALUE ($data)";

	mysqli_query($con, $sql);

}