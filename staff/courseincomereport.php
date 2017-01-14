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
<script src="../public/dist/js/csv.js"></script>

<script>


    $(document).ready(function () {


        $( function() {
            $( "#datepick" ).datepicker();
        } );

        $('button#getfile').click(function() {
            console.log('a');
                exportTableToCSV.apply(this, [$('#sum_table'), 'filename.csv']);
            });

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
                            <tr >
                                <th><center>Course Name</center></th>
                                <th><center>Batch</center></th>
                                <th><center>Course fee (Rs)</center></th>
                                <th><center>Participants</center></th>
                                <th><center>Total income (Rs)</center></th>

                            </tr>
                            </thead>
                            <?php

                            $csv_hdr = "Course Name, Batch, Course fee (Rs), Participants, Total income (Rs)";
                            $csv_output="";
                            ?>

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
        <td rowspan="<?php echo $batch; ?>"><center><?php echo $subname; ?></center>
            <?php  $csv_output .= $subname . ", "; ?>
        </td>

        <?php
        $count = 0;
        for ($i = 1; $i <= $batch; $i++) {
            $getstu = getstudentsfor($con, $subid, $batch);
            $numstu = $getstu[0];
            $total = $numstu * $subfee;

            if ($count != 0) { ?>
                <tr>
            <?php } ?>


            <td><center><?php echo date("Y"). " / ".$i; ?></center>

                <?php  $csv_output .= date("Y"). " / ".$i . ", ";?>
            </td>

            <td><center><?php echo $subfee; ?></center>
                <?php  $csv_output .= $subfee . ", ";?>
            </td>

            <td><center><?php echo $numstu; ?></center>
                <?php  $csv_output .= $numstu . ", ";?>
            </td>

            <td class="price"><center><?php echo $total; ?></center>
                <?php  $csv_output .= $total  . "\n";?>
            </td>


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


           <center> <form name="export" action="export.php" method="post">
                <button class="btn btn-info " type="submit" id="getfile">Download Exel</button>
                <input type="hidden" value="<?php echo $csv_hdr; ?>" name="csv_hdr">
                <input type="hidden" value="<?php echo $csv_output; ?>" name="csv_output">
            </form> </center>
            <br>
             <center><button class="btn btn-info " type="submit" name="pdf">Download PDF</button></center>
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

/*    $('button').click(function () {

        var innerdata = $('table#sum_table').html();

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
    });*/

</script>
