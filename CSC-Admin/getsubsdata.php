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

    $cid = $_GET['cid'];



    $sql = " SELECT * from subjects WHERE id = $cid";

    $res = mysqli_query($con, $sql);
    while($row = $res->fetch_array()) {


        echo "<form class='form-horizontal' action='' method='post'>
                <input type='hidden' class='form-control' name='id' value= '$cid'/>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'><strong>Course Settings</strong> </h3>
                        </div>
                        <div class='panel-body form-group-separated'>

                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Course Name</label>
                                <div class='col-md-6 col-xs-12'>
                                    <div class='input-group'>
                                        <span class='input-group-addon'><span class='fa fa-pencil'></span></span>
                                        <input type='text' class='form-control' required name='subject' value= '$row[2]'/>
                                    </div>

                                </div>
                            </div>


                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Curent Year</label>
                                <div class='col-md-6 col-xs-12'>
                                    <div class='input-group'>
                                        <span class='input-group-addon'><span class='fa fa-calendar'></span></span>
                                        <input type='text' class='form-control'  name='year' readonly value='". date("Y") . "'>
                                    </div>

                                </div>
                            </div>

                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Batch Number</label>
                                <div class='col-md-6 col-xs-12'>
                                    <div class='input-group'>
                                        <span class='input-group-addon'><span class='fa fa-pencil'></span></span>
                                        <input type='number' class='form-control' name='batch' value='$row[7]' required/>
                                    </div>

                                </div>
                            </div>


                            <div class='form-group'>
                                <label class='col-md-3 col-xs-12 control-label'>Course Coordinator</label>
                                <div class='col-md-6 col-xs-12'>
                                    <select class='form-control select' name='coursecid'>";

        $subs = getcoursecodinators($con);

        while ($data = $subs->fetch_assoc()) {

            echo "<option value='" . $data['id'] . "'>" . $data['first_name'] . " " . $data['last_name'] . "</option>";

        }
        echo "</select>
</div>
</div>

<div class='form-group'>
    <label class='col-md-3 col-xs-12 control-label'>Current Status</label>
    <div class='col-md-6 col-xs-12'>
        <div class='input-group'>";


        $status = getcurrentstatus($cid, $con);

        if ($status == 0) {

            echo "<span class=\"label label-danger label-form\">Not Activated</span>";


        } else if ($status == 1) {

            echo "<span class=\"label label-success label-form\">Activated</span>";

        }


        echo " </div>

    </div>
</div>

<div class='form-group'>
    <label class='col-md-3 col-xs-12 control-label'>Mark as Active course</label>
    <div class='col-md-6 col-xs-12'>";

        if ($row[8] == 0) {

           echo " <label class='check' ><input type = 'checkbox' class='icheckbox' value='1' name='checkval'/> Set Active </label >";
            }else if ($row[8]==1){
           echo "<label class='check' ><input type = 'checkbox' class='icheckbox' checked='checked' value='1' name='checkval'/> Allready Active </label >";
            }

        echo "<span class='help-block'>This action will set as currently running Course</span>
    </div>
</div>

</div>
<div class='panel-footer'>
    <button class='btn btn-default' type='reset'>Clear Form</button>
    <button class='btn btn-primary pull-right' name='update' type='submit'>Submit</button>
</div>
</div>
</form>";

    }
}