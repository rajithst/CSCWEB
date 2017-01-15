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


 });
</script>
    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="generate_report.php">SELECT REPORTS</a></li>
        <li class="active"><a href="">EXPENSE</a></li>

    </ul>
    </br>


    <div class="container">
    <div class="row">
       
        <h3 class="text-center">Report Generating</h3>
        <br>
        <div class="list-group">


        
		  <form action="rep_expense.php" method="post">
		  <div class="media col-md-3" id="nn">
                   <span class="badge">Expense</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                Select date range <span id="two-inputs"><input name="start_date" id="date-range200" size="20" value=""> to <input name="end_date"id="date-range201" size="20" value=""></span>

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="submit" name="exp" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
		</form>
		
        </div>
      
    </div>

    </div>
   
<?php include "../components/page_tail.php";?>
