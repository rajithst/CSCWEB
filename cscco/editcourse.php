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
                                <select name="courseid" class="form-control selectpicker" id="subs">
                                    <option value="">--- SELECT COURSE ---</option>
                                    <?php

                                    $subs = getsubsfor($con);

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

                        <button class="btn btn-info" id="edit">Edit Course</button> <button class="btn btn-info" id="delete">Delete Course</button>

                        <a href="fullcourses.php"> <button class="btn btn-info" id="delete">Go back</button></a>
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

    $sql = "UPDATE subjects SET subject = '$subject', coursecid=$coursecid, fee =$fee, duration=$duration WHERE subjectid = '$subjectid'";
    $res = mysqli_query($con, $sql); ?>

<script>swal("Changes Saved")</script>

<?php

} ?>



<?php include "../components/cscordinator_footer.php"; ?>
    <script>


        $(document).ready(function () {

            $('#subs').change(function () {
                $('div#dd>div#inner').html("");

                });


            $('#edit').click(function () {

                cid = $( "#subs option:selected" ).val();


                $.ajax({

                    url:'getsubsdata.php?cid='+cid,
                    type:"GET",
                    success:function (data) {
                        $('div#dd>div#inner').html("");
                        $('div#dd>div#inner').html(data).fadeIn("slow");

                    }


                });


            });



            $('#delete').click(function () {
                cid = $("#subs option:selected").val();

                 if (cid != ""){
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this action!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel ",
                        closeOnConfirm: false, closeOnCancel: false
                    },

                    function (isConfirm) {
                        if (isConfirm) {
                            swal("removing!", "Your data  has been deleted.", "success");

                            $.ajax({

                                url: 'deletesubsdata.php?cid=' + cid,
                                type: "GET",
                                success: function (data) {
                                    location.reload();

                                }
                            });


                        } else {
                            swal("Cancelled");
                        }
                    });
            }

                });


            });



    </script>
