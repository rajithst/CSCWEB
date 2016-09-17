<?php
require '../core/init.php';
//error_reporting(0);
if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../components/page_head.php'; ?>



    </head>




<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">


        <a href="dashboard.php" class="logo">

            <span class="logo-mini"><b>CSC</span>

            <span class="logo-lg"><b>CSC</b>  UCSC</span>
        </a>


    <?php include '../components/navbar.php'; ?>
    </header>

    <aside class="main-sidebar">

        <section class="sidebar">
            <?php include '../components/sidebar_head.php';?>
       <?php include '../components/sidebar.php'; ?>

    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Home - Computer and Service Center <small>University of Colombo School of Computing</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>


        <section class="content">


            <div id='jqxWidget'></div>
        </section>

    </div>


            <?php include '../components/footer.php'; ?>
            <?php include '../components/activity_bar.php'; ?>

    <div class="control-sidebar-bg"></div>
</div>

<?php require '../components/page_tail.php'; ?>


<script type="text/javascript">
    $(document).ready(function () {
        // Create calendar.
        $("#jqxWidget").jqxCalendar({ enableTooltips: true, width: 220, height: 220});

        // Create Date objects.
        var date1 = new Date();
        var date2 = new Date();
        var date3 = new Date();
        date1.setDate(5);
        date2.setDate(15);
        date3.setDate(16);
        // Add special dates by invoking the addSpecialDate method.
        $("#jqxWidget").jqxCalendar('addSpecialDate', date1, '', 'Special Date1');
        $("#jqxWidget").jqxCalendar('addSpecialDate', date2, '', 'Special Date2');
        $("#jqxWidget").jqxCalendar('addSpecialDate', date3, '', 'Special Date3');
    });
</script>
