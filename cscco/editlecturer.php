<?php
session_start();
ob_start();
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
<ul class="breadcrum">
    <li class="completed"><a href="index.php">HOME</a></li>
    <li class="completed"><a href="course.php">Courses</a></li>
    <li class="active"><a href="editcourse.php">Edit Lecturer</a></li>

</ul>

</br>
<?php

if (isset($_GET['id'])==true){

    $id = $_GET['id'];
}

?>


<div class="container-fluid">


    <center><h3>Edit lecturer</h3></center>
    <br>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 ">


            <?php
            $res = mysqli_query($con,"SELECT * FROM lecturers WHERE id=$id");

            while ( $lecs = $res->fetch_assoc()){ ?>




            <form class="form-horizontal" action=" " method="post" id="contact_form">


                <div class="form-group">
                    <label class="col-md-4 control-label">First Name</label>
                    <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="first_name" placeholder="First Name" class="form-control" value="<?php echo $lecs['first_name']; ?>" required="" type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Last Name</label>
                    <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="last_name" placeholder="Last Name" class="form-control" value="<?php echo $lecs['last_name']; ?>" required="" type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" placeholder="E-Mail Address" class="form-control" value="<?php echo $lecs['email']; ?>" required="" type="text">
                        </div>
                    </div>
                </div>


                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Phone #</label>
                    <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="(845)555-1212" class="form-control" value="<?php echo $lecs['phone']; ?>"required="" type="text">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Course</label>
                    <div class="col-md-6 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="subject" class="form-control selectpicker">
                                <option value=" ">Please select subject</option>

                                <?php

                                $subs = getsubsfor($con);

                                while ( $subjects = $subs->fetch_assoc()){ ?>

                                    <option value="<?php echo $subjects['subject']; ?>"><?php echo $subjects['subject']; ?></option>

                                <?php	}



                                ?>

                            </select>
                        </div>
                    </div>
                </div>


                <center><div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-info" name="submit">Add <span class="glyphicon glyphicon-send"></span> </button>
                            <button type="reset" class="btn btn-info">Cancel <span class="glyphicon glyphicon-remove"></span> </button>
                        </div>
                    </div>

                </center>

            </form>


            <?php	} ?>

        </div>


    </div>



</div>
<?php

            if (isset($_POST['submit'])) {
                $register_data = array(

                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'subject' => $_POST['subject']

                );


                $conf=update_lect( $con,$register_data,$id);
                if ($conf=='true') {
                    ?>
                    <script>

                        swal(
                            'Updated!',
                            'success'
                        )

                    </script>

                    <?php

                    header('location:lecturer.php');
                    ob_end_flush();
                    exit();
                }


            }

			?>



<?php include "../components/cscordinator_footer.php"; ?>
