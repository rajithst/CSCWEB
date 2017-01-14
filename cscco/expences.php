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

    <ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
        <li class="completed"><a href="report.php">SELECT REPORT</a></li>
        <li class="active"><a href="expences.php">EXPENCE REPORT</a></li>

    </ul>

    </br>

     
    
     <div class="container-fluid">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-1">
        	<div class="panel panel-default">
        		<div class="panel-heading">
                    
			    		<h3 class="panel-title">EXPENSE REPORT</h3>
			 			</div>
			 			<div class="panel-body">
                            <h3><b>Enter report duration</b></h3>
			    		<form role="form" method="post" action="">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                <td><h4><b>Starting from:<span style="color:red;font-size:25px;">*</span></b></h4></td>        
			                <input type="date" name="start_date"  required="required" class="form-control input-sm" >
			    					</div>
			    				</div>
			    			<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                <td><h4><b>To:<span style="color:red;font-size:25px;">*</span></b></h4></td>        
			                <input type="date" name="ending_date"  required="required" class="form-control input-sm" >
			    					</div>
			    				</div>	
			    			</div>
                            <td><h4><b>Format</b></h4></td>
						<td>
							<div class="radio">
								<label><input type="radio" name="optradio">On screen</label>
								<label><input type="radio" name="optradio">PDF</label>
							</div>
						</td>
                            
			    			
			    			
			    			
			    		    <input type="submit" name="submit" value="Submit" class="btn btn-primary" >
			    		</form>
			    	</div>
	    		</div>
    		</div>
    

        

        
    
    
<?php include "../components/cscordinator_footer.php"; ?>
