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
<style>
    a.list-group-item {
    height:auto;
    min-height:100px;
}
div#nn{

    margin: 15px 0px;
}
span.badge{

    padding: 10px;
    font-size: 20px;
}
</style>

<script>
    
    $(document).ready(function(){


$('#two-inputs').dateRangePicker(
    {
        separator : ' to ',
        getValue: function()
        {
            if ($('#date-range200').val() && $('#date-range201').val() )
                return $('#date-range200').val() + ' to ' + $('#date-range201').val();
            else
                return '';
        },
        setValue: function(s,s1,s2)
        {
            $('#date-range200').val(s1);
            $('#date-range201').val(s2);
        }
    });
	
$('#two-inputs1').dateRangePicker(
    {
        separator : ' to ',
        getValue: function()
        {
            if ($('#date-range202').val() && $('#date-range203').val() )
                return $('#date-range202').val() + ' to ' + $('#date-range203').val();
            else
                return '';
        },
        setValue: function(s,s1,s2)
        {
            $('#date-range202').val(s1);
            $('#date-range203').val(s2);
        }
    });
	
$('#two-inputs2').dateRangePicker(
    {
        separator : ' to ',
        getValue: function()
        {
            if ($('#date-range204').val() && $('#date-range204').val() )
                return $('#date-range204').val() + ' to ' + $('#date-range205').val();
            else
                return '';
        },
        setValue: function(s,s1,s2)
        {
            $('#date-range204').val(s1);
            $('#date-range205').val(s2);
        }
    });










 });
</script>
    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="generate_report.php">SELECT REPORTS</a></li>
        <li class="active"><a href="">INCOME</a></li>

    </ul>
    </br>


    <div class="container">
    <div class="row">
       
        <h3 class="text-center"><u>Generating income reports</u></h3>
        <br>
        <div class="list-group">
		
        <!--<a href="courseincomereport.php" class="list-group-item">-->
		
		<form action="select_co.php" method="post">
                <div class="media col-md-3" id="nn">
                    <span class="badge">Course income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
					
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="submit" class="btn btn-info btn-lg btn-block"> Select Course </button>
                </div>
		</form>
		
		  <form action="report.php" method="post">
		  <div class="media col-md-3" id="nn">
                   <span class="badge">Project Income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                <b>Select date range </b><span id="two-inputs"><input required name="start_date" id="date-range200" size="20" value=""><b> to </b><input required name="end_date"id="date-range201" size="20" value=""></span>

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="submit" name="pro_in" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
		</form>
		
		
		<form action="report.php" method="post">
		  <div class="media col-md-3" id="nn">
                  <span class="badge">Customize Course Income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                <b>Select date range </b><span id="two-inputs1"><input required name="start_date" id="date-range202" size="20" value=""><b> to </b><input required name="end_date" id="date-range203" size="20" value=""></span>

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="submit" name="cc_in" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
		</form>
		</tr>
		<tr>
		<form action="report.php" method="post">
		  <div class="media col-md-3" id="nn">
                  <span class="badge">Other Income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                <b>Select date range </b><span  id="two-inputs2"><input required name="start_date" id="date-range204" size="20" value=""><b> to </b><input required name="end_date" id="date-range205" size="20" value=""></span>

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="submit" name="other_in" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
		</form>
        
      </div>
    </div>

    </div>
   
<?php include "../components/page_tail.php";?>
