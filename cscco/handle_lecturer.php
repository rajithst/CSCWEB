<?php

include '../components/cscordinator_head.php'; ?>

<link rel="stylesheet" href="../public/dist/css/handle-lecturer.css">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#"><img src="../public/dist/img/system/csclogo.png" style="width:170px; height:50px;" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" style="height:50px;"><span class="glyphicon glyphicon-home"></span> HOME</a>
        <li><a href="#" style="height:50px;"><span class="glyphicon glyphicon-globe"></span> NOTIFICATIONS</a></li>
        <li><a href="#" style="height:50px;"><span class="glyphicon glyphicon-envelope"></span> MESSAGES</a></li>
        <li><a class="navbar-brand navbar-right" href="#" style="height:40px;">(LOGOUT)</a></li>
      </ul>
    </div>
  </div>
</nav>
    
   </br> 
    
    <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Lecturer</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="ID" id="lecturer_id" class="form-control input-sm" placeholder="ID">
			    					</div>
			    				</div>
			    				
			    			</div>
                            <div class="form-group">
			    				<input type="name" name="name" id="lecturer_name" class="form-control input-sm" placeholder="Name">
			    			</div>
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="tel" name="contact_number" id="contact_number" class="form-control input-sm" placeholder="Contact Number">
                                        
                                        </div>
			    				</div>
			    				
			    				
			    			</div>
			    			
			    			
			    		    <input type="submit" value="Create Lecturer" class="button" >
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>


<?php include "../components/cscordinator_footer.php";
