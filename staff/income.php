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
include '../components/page_head.php';

include "comp/navbar.php"; ?>

    </br>

    </head>
<center>
<form action="income_report.php" method="post">
    <div class="container-fluid text-center">
        <div class="row content">

            <!--<div class="col-sm-8 text-left"> -->
                <div class="well" id="news" style="margin: 0 100px;background: rgb(203, 205, 206);">
                    <h2><u>Income invoice</u></h2>
                    <p><b>Select the type of income:</b></p>
                    <select class="form-control" id="selecting" name="type">
                        <option value="Lab Booking">Lab Booking</option>
                        <option value="Donations">Donations</option>
                        <option value="Software Developement">Project</option>
                        <option value="Course Fee">Course Fee</option>
                        <option value="Other">other</option>
                    </select>
                    </br>
                    <p><b>Describe the income type in brief:</b></p>
                    <textarea class="form-control" rows="1"required id="enter_details" name="desc"></textarea>
                    </br>
                    <p><b>Name of the paying person or Company:</b></p>
                    <input type="text" placeholder="person name">
                    </br>
                    <p><b>Eneter the Date(yyyy/mm/dd):</b></p>
                    <input type="datetime" placeholder="Date ">
                    </br>
                    <p><b>Payment receiver's name:</b></p>
                    <input type="text" placeholder="Reciever name">
                    </br>
                    <p><b>Select the payment method:</b></p>
                    <select class="form-control" id="selecting" name="method">
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Other">Other</option>
                    </select>
                    </br>
                    <p><b>Ammount</b></p>
                    <input type="number" placeholder="Amount ">
                    </br> <br> <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            <!--</div>-->

        </div>
</form>

</center>
<?php include "../components/page_tail.php";