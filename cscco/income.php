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
    
   <?php include "comp/navbar.php"; ?>
    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="">Reports</a></li>
        <li class="active"><a href="income.php">Income reports</a></li>

    </ul>

    </br>
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


</script>
    </head>
    <body>

   

  


    <div class="container">
    <div class="row">
       
        <h3 class="text-center">Configuring reports</h3>
        <br>
        <div class="list-group">


         <a href="#" class="list-group-item">
                <div class="media col-md-3" id="nn">
                    <span class="badge">Course income</span>
                </div>
                <div class="col-md-6 text-center" id="nn">
                   
                 
                Select date range <span id="two-inputs2"><input type="date" id="date-range204" size="20" value=""> to <input type="date" id="date-range205" size="20" value=""></span>

                    
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
                   
                 
                Select date range <span id="two-inputs"><input type="date" id="date-range200" size="20" value=""> to <input type="date" id="date-range201" size="20" value=""></span>

                    
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
                   
                 
                Select date range <span id="two-inputs1"><input type="date" id="date-range202" size="20" value=""> to <input type="date"  id="date-range203" size="20" value=""></span>

                    
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
                   
                 
                Select date range <span id="two-inputs3"><input type="date" id="date-range206" size="20" value=""> to <input type="date" id="date-range207" size="20" value=""></span>

                    
                </div>
                <div class="col-md-3 text-center" id="nn">
                    <button type="button" class="btn btn-info btn-lg btn-block"> Run Report </button>
                </div>
          </a>


        </div>
      
    </div>


</br>
<?php include "../components/cscordinator_footer.php"; ?>
