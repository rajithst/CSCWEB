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
        <li class="active"><a href="marks.php">MARKS</a></li>

    </ul>

    </br>

    
     <div class="container-fluid">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-1">
        	<div class="panel panel-default">
        		<div class="panel-heading">
                    
			    		<h3 class="panel-title">MARKSHEET</h3>
			 			</div>
			 			<div class="panel-body">
                            <h3><b>Enter Course and Batch</b></h3>
			    		<form role="form" method="post" action="">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
                                <td><h4><b>Course<span style="color:red;font-size:25px;">*</span></b></h4></td>        
			                
                                        <div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
									<select name="subject" class="form-control selectpicker" >
										<option value=" " >Please select subject</option>
                                        <?php

										$subs = getsubsfor($con);

										while ( $subjects = $subs->fetch_assoc()){ ?>

											<option value="<?php echo $subjects['subject']; ?>"><?php echo $subjects['subject']; ?></option>

									<?php	}



										?>
                                            </select>
			    					</div>
			    				</div>
			    			<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                <td><h4><b>Select Batch<span style="color:red;font-size:25px;">*</span></b></h4></td>        
			                <input type="number" name="batch"  required="required" class="form-control input-sm" >
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
