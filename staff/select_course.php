<?php
include "../core/init.php";
include '../components/page_head.php'; ?>

    <link rel="stylesheet" href="../public/dist/css/staff_css.css">

    </head>


    <body background="">
    <!-- header-->
    <nav class="navbar navbar-default" id="myNavbar">
        <div class="container-fluid" >
            <div class="navbar-header" style="margin: 17px;" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="../public/dist/img/system/csclogo.png"class="img-responsive csc-logo" id="logo" >


            </div>
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right" id="navbar_txt" style="margin: 12px;">
                    <li><a href="index.php" style="color:white;" >Home</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;"><span>Notifications</span>
                            <span class="caret">
						</span>
                        </a>
                        <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                            <li><a tabindex="-1" href="inbox_Email.html" id="task_txt">Emails</a></li>

                        </ul>
                    </li>

                    <li><a href="#" style="color:white;"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-inverse" id="myNavbar">
        <div class="container-fluid" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>



            </div>
            <div class="collapse navbar-collapse" style="background-color: rgb(102, 185, 191)">

                <ul class="nav navbar-nav navbar-right" id="navbar_txt">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color:white;font-size:17px;" >Edit Reports
                            <span class="caret">
						</span>
                        </a>
                        <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                            <li><a tabindex="-1" href="select_course.php" id="task_txt">Attendence</a></li>
                            <li><a tabindex="-1" href="income_report.html" id="task_txt">Income</a></li>
                            <li><a tabindex="-1" href="expense_report.html" id="task_txt">Expences</a></li>
                            <li><a tabindex="-1" href="select_course_marks.html" id="task_txt">Student Marks</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="report_generating.html"  style="color:white;font-size:17px;">Generate Report
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color:white;font-size:17px;">Send
                            <span class="caret">
						</span>
                        </a>
                        <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" id="tasks_dropdown">
                            <li><a tabindex="-1" href="inbox_Email.html" id="task_txt" >Email</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="student_registration.html"   style="color:white;font-size:17px;">Register Students
                        </a>
                    </li>



                </ul>
            </div>
        </div>
    </nav>


    <section class="content-header">

        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-10">
                <div class="box" style="width: 75%;">
                    <div class="box-header">
                        <h3 class="box-title">Select Course</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Get Subject</th>

                            </tr>

                            <?php
                            $res = getall();
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id= $row['courseid'];
                                ?>
                            <tr id="tdata">
                                <td><?php echo $row['courseid']; ?></td>
                                <td><?php echo $row['coursename']; ?></td>
                                <td id="btn"><button type="submit" class="btn btn-success">Get Subjects</button> </td>

                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-xs-2"> </div>
        </div>

<style>

    .modal.left .modal-dialog,
    .modal.right .modal-dialog {
        position: fixed;
        margin: auto;
        width: 320px;
        height: 50%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal.left .modal-content,
    .modal.right .modal-content {
        height: 100%;
        overflow-y: auto;
    }

    .modal.left .modal-body,
    .modal.right .modal-body {
        padding: 15px 15px 80px;
    }


    /*Right*/
    .modal.right.fade .modal-dialog {
        right: -320px;
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }

    .modal.right.fade.in .modal-dialog {
        right: 0;
    }

    /* ----- MODAL STYLE ----- */
    .modal-content {
        border-radius: 0;
        border: none;
    }

    .modal-header {
        border-bottom-color: #EEEEEE;
        background-color: #FAFAFA;
    }


</style>

        <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document" style="top: 25%; margin-right: 75px;">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Subjects</h4>
                    </div>

                    <div class="modal-body">
                        <ul>

                        </ul>
                    </div>

                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->

    </section>



<?php include "../components/page_tail.php";?>
<script>

$(document).ready(function () {

    $( 'tr#tdata> td#btn > button').click(function () {

        var id = $(this).closest('tr').find('td:nth-child(1)').text();
        
        $.ajax({
           
            url:'getsubs.php?cid='+id,
            type:"get",
            success:function (data) {

                $('div#myModal2>div.modal-dialog>div.modal-content>div.modal-body>ul').html("");
                $('div#myModal2>div.modal-dialog>div.modal-content>div.modal-body>ul').html(data);


                $('#myModal2').modal('toggle');
            }


        });

    });






});









</script>
