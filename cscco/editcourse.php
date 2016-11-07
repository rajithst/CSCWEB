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


                <center><h3>Change  Course Settings</h3></center>
            <br>

                <div class="row">

                    <div class="col-xs-12 col-sm-8 col-md-6 ">
                <form class="form-horizontal" action="" method="post"  id="contact_form">



                    <div class="form-group">
                        <label class="col-md-4 control-label">Select Course</label>
                        <div class="col-md-6 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="courseid" class="form-control selectpicker" id="getmaincat">
                                    <option value="">--- SELECT COURSE ---</option>
                                    <?php

                                    $subs = getsubsfor();

                                    while ( $subjects = $subs->fetch_assoc()){ ?>

                                        <option value="<?php echo $subjects['subjectid']; ?>"><?php echo $subjects['subject']; ?></option>

                                    <?php	}



                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>


                </form>
            </div>

                    <div class="col-xs-12  col-sm-8 col-md-6 pull-left">

                        <button class="btn btn-warning" id="edit">Edit Course</button> <button class="btn btn-danger" id="delete">Delete Course</button>


                    </div>

                </div>


        <div class="row" id="dd">

            <div class="col-md-3"></div>
            <div class="col-md-6" id="inner"></div>

            <div class="col-md-3"></div>


        </div>

    </div>
<?php

if (isset($_POST['submit'])) {

    $subjectid = $_POST['subjectid'];
    $subject = $_POST['subject'];
    $coursecid = $_POST['coursecid'];
    $fee = $_POST['fee'];
    $duration = $_POST['duration'];
    $con = mysqli_connect('localhost', 'root', 'rajith', 'csc');
    $sql = "UPDATE subjects SET subject = '$subject', coursecid=$coursecid, fee =$fee, duration=$duration WHERE subjectid = '$subjectid'";
    $res = mysqli_query($con, $sql); ?>

<script>swal("Changes Saved")</script>

<?php

} ?>



<?php include "../components/cscordinator_footer.php"; ?>
    <script>


        $(document).ready(function () {

            $('#edit').click(function () {

                cid = $( "#getmaincat option:selected" ).val();


                $.ajax({

                    url:'getsubsdata.php?cid='+cid,
                    type:"GET",
                    success:function (data) {
                        $('div#dd>div#inner').html("");
                        $('div#dd>div#inner').html(data).fadeIn("slow");

                    }


                });


            });


        });

    </script>
