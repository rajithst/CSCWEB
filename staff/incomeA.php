<style>




    .stepwizard-step p {
        margin-top: 10px;
    }

    .process-row {
        display: table-row;
    }

    .process {
        display: table;
        width: 100%;
        position: relative;
    }

    .process-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .process-row:before {
        top: 50px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;

    }

    .process-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .process-step p {
        margin-top:10px;

    }

    .btn-circle {
        width: 100px;
        height: 100px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>
<div class="process">
    <div class="process-row">
        <div class="process-step">
			 <a href="project_in.php">
             <button type="button" class="btn btn-info btn-circle" ><i class="fa fa-dollar fa-3x"></i></button>
             <p>Project income</p> </a>
            </div>
        <div class="process-step">
			<a href="customized_courses_in.php">
            <button type="button" class="btn btn-info btn-circle"><i class="fa fa-dollar fa-3x"></i></button>
            <p>Customized course income</p> </a>
        </div>
		<div class="process-step">
			<a href="other_in.php">
            <button type="button" class="btn btn-info btn-circle"><i class="fa fa-dollar fa-3x"></i></button>
            <p>Other income</p> </a>
        </div>

        

        <!--<div class="process-step">
            <button type="button" class="btn btn-info btn-circle"><i class="fa fa-flag fa-3x"></i></button>
            <p>Edit reports</p>
        </div>-->
    </div>
</div>