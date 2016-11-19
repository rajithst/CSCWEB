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
            if ($('#date-range202').val() && $('#date-range203').val() )
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


$('#two-inputs3').dateRangePicker(
    {
        separator : ' to ',
        getValue: function()
        {
            if ($('#date-range202').val() && $('#date-range203').val() )
                return $('#date-range206').val() + ' to ' + $('#date-range207').val();
            else
                return '';
        },
        setValue: function(s,s1,s2)
        {
            $('#date-range206').val(s1);
            $('#date-range207').val(s2);
        }
    });






 });
</script>
    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="">GENERATE REPORTS</a></li>

        <li class="active"><a href="">CONFIGURE REPORTS </a></li>

    </ul>
    </br>


    <div class="container">
    <div class="row">
       
        <h3 class="text-center">Configuring reports</h3>
        <br>
        <div class="list-group">


         <a href="courseincomereport.php" class="list-group-item">
                <div class="media col-md-3" id="nn">
                    <span class="badge">Course income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                Select batch

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="button" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
          </a>






          <a href="#" class="list-group-item">
                <div class="media col-md-3" id="nn">
                   <span class="badge">Project Income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                Select date range <span id="two-inputs"><input id="date-range200" size="20" value=""> to <input id="date-range201" size="20" value=""></span>

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="button" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
          </a>
         
           <a href="#" class="list-group-item">
                <div class="media col-md-3" id="nn">
                  <span class="badge">Customize Course Income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                Select date range <span id="two-inputs1"><input id="date-range202" size="20" value=""> to <input id="date-range203" size="20" value=""></span>

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="button" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
          </a>
  

          <a href="#" class="list-group-item">
                <div class="media col-md-3" id="nn">
                  <span class="badge">Other Income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                Select date range <span id="two-inputs3"><input id="date-range206" size="20" value=""> to <input id="date-range207" size="20" value=""></span>

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="button" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
          </a>


        </div>
      
    </div>


					<!-- <u><b><h4>Select report type</h4></b></u>                
                                        <li>
                                        <a href="gen_pro_income.php"  style="color:white;font-size:17px;">
                                        <button type="button" href="attendance_rep.php" class="btn btn-primary btn-lg gradient"  style="width:300px">
                                        Project income
                                        </button>
                                        </a>
                                        </li>
                                        <br>
                                        <li>
                                        <a href="gen_cus_co_income.php"  style="color:white;font-size:17px;">
                                        <button type="button" href="income_rep.php" class="btn btn-primary btn-lg gradient"  style="width:300px">
                                        Costomized course income
                                        </button>
                                        </a>
                                        </li>
                                        <br>
                                        <li>
                                        <a href="gen_co_fee_income.php"  style="color:white;font-size:17px;">
                                        <button type="button" href="income_rep.php" class="btn btn-primary btn-lg gradient"  style="width:300px">
                                        Course fee income
                                        </button>
                                        </a>
                                        </li>
                                        <br>
                                        <li>
                                        <a href="gen_other_income.php"  style="color:white;font-size:17px;">
                                        <button type="button" href="expense_rep.php" class="btn btn-primary btn-lg gradient"  style="width:300px">
                                        Other
                                        </button>
                                        </a>
                                        </li> -->
                                    
            

        

       

    </div>
   
<?php include "../components/page_tail.php";?>
