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

$(document).ready(function(){

   
    


$('#ss').click(function(){



    $('#mytable tr.item').each(function(){

        $(this).find('td').each(function(){


            if ( $( this ).hasClass( "id" ) ) {
                var sid = $(this).html();
                console.log(sid);

            }

            if ( $( this ).hasClass( "mark" ) ) {

               var check =  $('#check_list').prop('checked', true);

                console.log(check);

            }




        });
    });

});
});
$(document).ready(function () 
		{
			$( function() 
			{
				$( "#datepick" ).datepicker();
			} );
        });





</script>
    </head>
    <body>

    <?php include "comp/navbar.php"; ?>
	<ul class="breadcrum">
        <li class="completed"><a href="index.php">HOME</a></li>
		<li class="completed"><a href="markregistered.php">UNREGISTERD STUDENTS</a></li>
        <li class="active"><a href="">INPUT PAYMENT DETAILS</a></li>
        

</ul>

    </br>

</head>

<body background="">
<?php
	$name=$_GET['name'];
	$subid=$_GET['subid'];
	$nic=$_GET['nic'];
	
?>

    <div class="container-fluid">
   
   <div class="row">
   <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-6 col-xs-12">
			   

            <center>
				<u><h3><b>Add Payment Details</b></h3></u>
			</center>

			
			
            <br>
                <form class="form-horizontal" action="" method="post" >
					<div class="form-group">
						<label class="col-md-4 control-label"><b>Student name : </b><?php echo"<i>".$name."</i>"?> </label>
						<label class="col-md-4 control-label"><b>Student NIC : </b><?php echo "<i>".$nic."</i>";?></label>
						<label class="col-md-4 control-label"><b>Registering subject : </b><?php echo "<i>".$subid."</i>";?></label>
					</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Payment method </label>
                            <div class="col-md-6 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select name="pay_method" required class="form-control selectpicker" >
                                            <option value="Dnation">Cash</option>
                                            <option value="Advertising">Cheque</option>
                                            <option value="Other">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label" ><span style="color:red;font-size:25px;">*</span>Amount</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class=" 	glyphicon glyphicon-usd"></i></span>
                                    <input name="amm" placeholder="Amount" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Date received</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input name="rec_date" style="width:160px;" placeholder="" class="form-control" type="date" id="datepick" required>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Received person</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="person_received" placeholder="Received by" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>


                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label"><span style="color:red;font-size:25px;">*</span>Reference number</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="ref" placeholder="Receipt number" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                    <center><div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" name="next">Add <span class="glyphicon glyphicon-send"></span> </button>
                                <button type="reset" class="btn btn-warning" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
                            </div>
                        </div>

                    </center>

                </form>
            </div>
            <div class="col-md-2"></div>
            </div>

                
                </div>


<?php
	if(isset($_POST['next']) === true) 
	{
			
			$payment_method=$_POST['pay_method'];
			$payed_ammount=$_POST['amm'];
			$payment_received_day=$_POST['rec_date'];
			$person_rec=$_POST['person_received'];
			$payment_referrence=$_POST['ref'];
			$newvalue = date('Y-m-d', strtotime($payment_received_day));
			$sqlp="INSERT INTO
					course_income(student_NIC,coursename,payment_method,amount,person_rec,refference_no,received_date)
					VALUE('$nic','$subid','$payment_method','$payed_ammount','$person_rec','$payment_referrence','$newvalue')";
			$sqlr = "UPDATE student SET registered=1 WHERE nic = '$nic'" ;
            
	
if(mysqli_query($con,$sqlp) && mysqli_query($con,$sqlr))
{?>
	
	
    </br>
	
        <div class="alert alert-success">
            <strong><center>Recorded!</center></strong>
        </div>
	</body>
	
<?php
}
else
{?>
	
    </br>
	
        <div class="alert alert-danger">
            <strong><center>Not Recorded!</center></strong>
        </div>
	</body>
	
	
<?php
}
	}
include "../components/page_tail.php";?>


    

 
