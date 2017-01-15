<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/staff.php';
include '../components/cscordinator_head.php'; ?>

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

    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="generate_report.php">SELECT REPORTS</a></li>
        <li class="active"><a href="">SELECT COURSE</a></li>
        

    </ul>

    </br>

</head>

<body background="">

    <div class="container">

                <div class="row">
				<div class="col-xs-12 col-md-2 col-sm-12"></div>
				<div class="col-xs-12 col-md-10 col-sm-10">
					<div class="box" style="width: 75%;">
						<div class="box-header">
							<center><h3 class="box-title">Select Course</h3></center>

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
								$res = getall($con);
								while ($row = mysqli_fetch_assoc($res)) {
									$id= $row['courseid'];
									?>
								<tr id="tdata">
									<td><?php echo $row['courseid']; ?></td>
									<td><?php echo $row['coursename']; ?></td>
									<td id="btn"><button type="submit" class="btn btn-success">Get Subjects<span class="glyphicon glyphicon-step-forward"></span></button> </td>

								</tr>
								<?php } ?>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
                    <div class="col-xs-12 col-md-2 col-sm-12"></div>

        </div>
		</div>


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


<?php include "../components/page_tail.php";?>
<script>

$(document).ready(function () {

    $( 'tr#tdata> td#btn > button').click(function () {

        var id = $(this).closest('tr').find('td:nth-child(1)').text();
        
        $.ajax({
           
            url:'getsubs_rep_mark.php?cid='+id,
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
