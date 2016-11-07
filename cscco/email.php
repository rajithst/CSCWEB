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

include '../components/cscordinator_head.php'; ?>



</head>
<body>

<?php include "comp/navbar.php"; ?>

</br>


<div class="container-fluid">
    <div class="row" style="padding: 10px;">

        <br>
        <div class="col-xs-12 col-sm-8 col-md-6 ">

            <center><h3>Add New Lecturer</h3></center>
            <br>
            <form class="form-horizontal" action=" " method="post"  id="contact_form">


                <div class="form-group">
                    <label class="col-md-4 control-label">First Name</label>
                    <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label" >Last Name</label>
                    <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                        </div>
                    </div>
                </div>


                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Phone #</label>
                    <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="(845)555-1212" class="form-control" type="text">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Course</label>
                    <div class="col-md-6 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="subject" class="form-control selectpicker" >
                                <option value=" " >Please select subject</option>

                                <?php

                                $subs = getsubsfor();

                                while ( $subjects = $subs->fetch_assoc()){ ?>

                                    <option><?php echo $subjects['subject']; ?></option>

                                <?php	}



                                ?>

                            </select>
                        </div>
                    </div>
                </div>


                <center><div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success" >Submit <span class="glyphicon glyphicon-send"></span> </button>
                            <button type="reset" class="btn btn-danger" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
                        </div>
                    </div>

                </center>




            </form>
        </div>




        <div class="col-xs-12 col-sm-4 col-md-6 ">

            <center><h3>Current Lecturers</h3></center>
            <br>

            <table class="table table-bordred table-striped" style="width: 100%" id="lectable">
                <thead>

                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E mail</th>
                    <th>Course</th>
                    <th>Send</th>
                </tr>


                </thead>
                <tbody>
                <?php  $lecs = getlecs();

                while ( $lecdata = $lecs->fetch_assoc()){ ?>

                    <tr>
                        <td><?php echo $lecdata['first_name']; ?></td>
                        <td><?php echo $lecdata['last_name']; ?></td>
                        <td><?php echo $lecdata['email']; ?></td>
                        <td><?php echo $lecdata['subject']; ?></td>
                        <td> <button class="btn btn-success"> Send Email</button></td>
                    </tr>

                <?php	}


                ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

<?php include "../components/cscordinator_footer.php"; ?>
<script>

    $(document).ready( function () {
        $('#lectable').DataTable();
    } );

</script>