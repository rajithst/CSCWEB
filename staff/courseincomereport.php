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
include '../components/page_head.php'; ?>


<script>


    $(document).ready(function () {


        $( function() {
            $( "#datepick" ).datepicker();
        } );
    });

</script>

</head>
<body>

<?php include "comp/navbar.php"; ?>

<ul class="breadcrum">
    <li class="completed"><a href="index.php">HOME</a></li>
    <li class="completed"><a href="">GENERATE REPORTS</a></li>
    <li class="completed"><a href="">CONFIGURE REPORTS</a></li>
    <li class="active"><a href="">COURSE INCOME REPORT </a></li>

</ul>
</br>

</head>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <center><h2 class="panel-title">
                        Training Course Income Report
                    </h2> </center>
                </div>
                <div class="panel-body">

                </div>

                        <table class="table table-hover" id="sum_table">
                            <thead>
                            <tr class="">
                                <th><center>Course Name</center></th>
                                <th><center>Batch</center></th>
                                <th><center>Course fee (Rs)</center></th>
                                <th><center>Participants</center></th>
                                <th><center>Total income (Rs)</center></th>

                            </tr>
                            </thead>

    <tbody>

<?php
$stu = getallsubjects($con);
while ($row = mysqli_fetch_assoc($stu)){

    $subname = $row['subject'];
    $subid = $row['subjectid'];
    $subfee = $row['fee'];
    $batches = $row['batch'];

$batch = $batches;
    if ($batch>0) {

        ?>
        <tr>
        <td rowspan="<?php echo $batch; ?>"><center><?php echo $subname; ?></center></td>
        <?php
        $count = 0;
        for ($i = 1; $i <= $batch; $i++) {
            $getstu = getstudentsfor($con, $subid, $batch);
            $numstu = $getstu[0];
            $total = $numstu * $subfee;

            if ($count != 0) { ?>
                <tr>
            <?php } ?>


            <td><center><?php echo date("Y"). " / ".$i; ?></center></td>
            <td><center><?php echo $subfee; ?></center></td>
            <td><center><?php echo $numstu; ?></center></td>
            <td class="price"><center><?php echo $total; ?></center></td>


            <?php

            $count++;
        } ?>
        </tr>


        <?php
    }
} ?>

    </tbody>

                            <tfoot>

                            <tr class="">
                                <td colspan="4"><center><strong>Total Income</strong></center></td>
                                <td class="totalCol"><center></center></td>
                            </tr>

                            </tfoot>
                        </table>

            </div>

             <center><button class="btn btn-info " type="submit" name="pdf">Download PDF</button></center>f
        </div>
    </div>
</div>






<?php include "../components/page_tail.php";?>

<script>

    var totals=0;
    $(document).ready(function(){

        var $dataRows=$("#sum_table tr:not('.tfooter,.theads')");

        $dataRows.each(function() {
            $(this).find('.price>center').each(function(i){


                totals+=parseInt( $(this).html());
            });
        });
        $("#sum_table td.totalCol>center").html("Rs: " + totals+ " /=");
        });

    $('button').click(function () {

        var innerdata = $('table#sum_table').html();
        console.log(innerdata);
        var ajax_url = 'getpdf.php';
        var params = { contents: innerdata };
        $.ajax({
            type: 'POST',
            url: ajax_url,
            dataType: "html",
            cache: true,
            data: params,
            success: function(data) {
                $("#show_tree").html(data);

            }

        });
    });

</script>
