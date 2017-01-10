<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

	session_destroy();
	header('Location:../index.php');
	exit();

}
require '../core/init.php';
require '../core/function/admin.php';


if (isset($_GET)) {

	$cid = $_GET['id'];



	$sql = " SELECT * from staff WHERE id = $cid";

	$res = mysqli_query($con, $sql);
	while($row = $res->fetch_array()) {
		
		
		
		echo "<div class='form-group'>
		<label class='col-md-3 col-xs-12 control-label'>First Name</label>
		<div class='col-md-6 col-xs-12'>
		<div class='input-group'>
		<span class='input-group-addon'><span class='fa fa-user'></span></span>
		<input type='text' class='form-control' name= 'first_name' value='$row[1]'/>
		</div>
		</div>
		</div>
		
		<div class='form-group'>
		<label class='col-md-3 col-xs-12 control-label'>Last Name</label>
		<div class='col-md-6 col-xs-12'>
		<div class='input-group'>
		<span class='input-group-addon'><span class='fa fa-user'></span></span>
		<input type='text' class='form-control' name='last_name' value='$row[2]'/>
		</div>
		</div>
		</div>
		
		
		<div class='form-group'>
		<label class='col-md-3 col-xs-12 control-label'>E-mail</label>
		<div class='col-md-6 col-xs-12'>
		<div class='input-group'>
		<span class='input-group-addon'><span class='fa fa-envelope'></span></span>
		<input type='email' class='form-control' name='email' value='$row[3]'/>
		</div>
		</div>
		</div>
		
		
		<div class='form-group'>
		<label class='col-md-3 col-xs-12 control-label'>Telephone</label>
		<div class='col-md-6 col-xs-12'>
		<div class='input-group'>
		<span class='input-group-addon'><span class='fa fa-phone'></span></span>
		<input type='text' class='form-control' name='telephone' value='$row[4]'/>
		</div>
		</div>
		</div>
		
		<div class='form-group'>
		<label class='col-md-3 col-xs-12 control-label'>Address</label>
		<div class='col-md-6 col-xs-12'>
		<textarea class='form-control' rows='5' > $row[5]</textarea>
		</div>
		</div>
		
		
		<div class='form-group'>
		<label class='col-md-3 col-xs-12 control-label'>Select Role</label>
		<div class='col-md-6 col-xs-12'>
		<select class='form-control select'>
		<option value='CSC Staff'>CSC Staff</option>
		<option value='CSC Cordinator'>CSC Coordinator</option>
		<option value='Course Coordinator'>Course Coordinator</option>
		</select>
		
		</div>
		</div>
		
		<div class='form-group'>
		<label class='col-md-3 col-xs-12 control-label'>Set Default Password </label>
		<div class='col-md-6 col-xs-12'>
		<label class='check'><input type='checkbox' class='icheckbox' checked='checked'/>Password (csc)</label>
		
		</div>
		</div>";


		
	}
}