<?php 

include 'components/ad_head.php';
require '../classes/Admin/Retrieve.php';

if (isset($_GET)) {

	$cid = $_GET['id'];



	
	$edit = new Edit();

	$result = $edit->editUser($cid);
	while($row = $result->fetch_array()) {
		
		
		
		echo "<div class='form-group'style='display: none;'>
		
		<input type='hidden' class='form-control' name= 'hidden' value='$row[0]'/>
		</div>
                


        <div class='form-group'>
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
		<textarea class='form-control' rows='5' name='address'> $row[5]</textarea>
		</div>
		</div>
		
		
		<div class='form-group'>
		<label class='col-md-3 col-xs-12 control-label'>Select Role</label>
		<div class='col-md-6 col-xs-12'>
		<select class='form-control select' name='role'>";
        $cs='';
        $csc='';
        $cc='';
        if ($row[7] == 'CSC Staff'){
            $cs = 'selected';
        }elseif ($row[7]=='CSC Cordinator'){
            $csc = 'selected';
        }elseif ($row[7]=='Course Coordinator'){
            $cc = 'selected';
        }
        echo "<option value='CSC Staff' ". $cs ." >CSC Staff</option>";


        echo "<option value='CSC Cordinator'". $csc.">CSC Coordinator</option>";
		echo "<option value='Course Coordinator'" . $cc.">Course Coordinator</option>";
		echo "</select>
		
		</div>
		</div>
		

		
		
		
                                <div class='panel-footer'>
                                    <button class='btn btn-default' type='reset'>Clear Form</button>
                                    <button class='btn btn-primary pull-right' type='submit' name='update'>Submit</button>
                                </div>
		
		";


		
	}
}