<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';

require '../core/function/cscco.php';


if (isset($_GET)) {

    $cid = $_GET['cid'];


    $sql = " SELECT * from subjects WHERE subjectid = '$cid'";
    $res = mysqli_query($con, $sql);


    while($row = $res->fetch_assoc()){

   echo "<hr>";
    echo "<center>";

    echo "<center><h3> Edit Course Data </h3></center>";

    echo "   <form class='form-horizontal' action='' method='post'  id='contact_form'>";


    echo "<div class='form-group'>
                        <label class='col-md-2 control-label'>Course ID</label>
                        <div class='col-md-6 inputGroupContainer'>
                            <div class='input-group'>
                                <span class='input-group-addon'><i class='glyphicon glyphicon-tag'></i></span>
                                <input readonly  name='subjectid' placeholder='' class='form-control'  type='text' value='". $row['subjectid'] ."' id='courseid' >
                            </div>
                        </div>
                    </div>";


    echo " <div class='form-group'>
                        <label class='col-md-2 control-label' >Course Name</label>
                        <div class='col-md-6 inputGroupContainer'>
                            <div class='input-group'>
                                <span class='input-group-addon'><i class='glyphicon glyphicon-tag'></i></span>
                                <input name='subject' placeholder='' class='form-control'  type='text' value='". $row['subject'] ."'>
                            </div>
                        </div>
                    </div>";


echo "<div class='form-group'>
					<label class='col-md-2 control-label'>Course Coordinator</label>
					<div class='col-md-6 selectContainer'>
						<div class='input-group'>
							<span class='input-group-addon'><i class='glyphicon glyphicon-list'></i></span>
							<select name='coursecid' class='form-control selectpicker' required='required'>";


								$subs = getcoursecodinators($con);

								while ( $data = $subs->fetch_assoc()){

                                    echo "<option value='".$data['id'] ."'>". $data['first_name'] ." ". $data['last_name'] ."</option>";

                                	}



echo "</select>";
echo "</div>";
echo "</div>";
echo "</div>";



echo "<div class='form-group'>
    <label class='col-md-2 control-label'>Course Fee = Rs:</label>
    <div class='col-md-6 inputGroupContainer'>
        <div class='input-group'>
            <span class='input-group-addon'><i class='glyphicon glyphicon-tag'></i></span>
            <input name='fee' placeholder='' class='form-control'  type='number' value='". $row['fee'] ."'>
        </div>
    </div>
</div>";


    echo "<div class='form-group'>
    <label class='col-md-2 control-label'>Duration in weeks</label>
    <div class='col-md-6 inputGroupContainer'>
        <div class='input-group'>
            <span class='input-group-addon'><i class='glyphicon glyphicon-tag'></i></span>
            <input name='duration' placeholder='' class='form-control' type='number' value='". $row['duration']."'>
        </div>
    </div>
</div>";


    echo "<center><div class='form-group'>
        <label class='col-md-2 control-label'></label>
        <div class='col-md-6'>
            <button type='submit' class='btn btn-success' name='submit'>Save Changes <span class='glyphicon glyphicon-send'></span></button>
            <button type='reset' class='btn btn-success' >Cancel <span class='glyphicon glyphicon-remove'></span> </button>
        </div>
    </div>

</center>

</form>

</center>
";

    }


}

