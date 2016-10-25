<?php
include "../core/init.php";
include '../components/cscordinator_head.php'; ?>

<link rel="stylesheet" href="../public/dist/css/handle-lectur.css">

<nav class="navbar navbar-custom" role = "navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button style="background-color:burlywood;" type="button" class="navbar-toggle collapsed" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php"><img src="../public/dist/img/system/csclogo.png" style="width:170px; height:50px;" ></a>


        </div>
        <div class="collapse navbar-collapse" id="navbar_collapse" >
            <ul class="nav navbar-nav" id="navbar-1" style="margin-left: 1100px;">
                <li><a href="#" style="height:50px;"><span class="glyphicon glyphicon-home"></span> Home</a>
                <li><a href="#" style="height:50px"><span class="glyphicon glyphicon-globe"></span> Notifications</a></li>
                <li><a href="#" style="height:50px;"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
            </ul>
            <div>
                <a class="navbar-brand navbar-right" href="#" id="log-out"><span class="glyphicon glyphicon-log-out"></span> Log-out</a>
            </div>
        </div>
    </div>


    </div>
</nav>
<nav class="navbar navbar-custom" role = "navigation>
    <div class="container-fluid">
<div class="navbar-header">
    <button style="background-color:white;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

</div>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color:#66B9BF;">
    <ul class="nav navbar-nav" id="navbar-2" style="margin-left: 890px">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" style="padding: 0;">
                <li><a tabindex="-1" href="#">Attendence</a></li>
                <li><a tabindex="-1" href="#">Income</a></li>
                <li><a tabindex="-1" href="#">Marks</a></li>
                <li><a tabindex="-1" href="#">Expences</a></li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Handle Lecturer<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="handle_lecturer.php">Handle Lecturer</a></li>
                </li>



            </ul>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Handle Courses<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="handlecourses.html">Handle Courses</a></li>
                </li>

            </ul>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Handle Data<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="#">Report Data</a></li>
                <li><a tabindex="-1" href="#">Lecture Allocation</a></li>
                <li><a tabindex="-1" href="#">Others</a></li>


            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Handle Lectures<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="">Handle Lectures</a></li>
                </li>
            </ul>

        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Send<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="#">Email</a></li>
                <li><a tabindex="-1" href="notifications.html">Notification</a></li>
                <li><a tabindex="-1" href="messages.html">Message</a></li>


            </ul>
        </li>


</div>
</div>
</div>

</div></div></nav>


<div class="container-fluid">
    <div class="row content" style="margin-top: 3%">
        <div class="col-sm-6 text-left">
            <div class="panel panel-default">
                <div class="panel-heading">Add Lecturer</div>
                <div class="panel-body">
                    <form>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Lecture Name</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-4 col-form-label">Subject Name</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="search">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-4 col-form-label">Subject Code</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="search">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-4 col-form-label">Course</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="search">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add">Add</button>
                        <button type="submit" class="btn btn-primary" id="cancel">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <h3 id="lecturer">Lecturers</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Subject</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Anna</td>
                        <td>Pitt</td>
                        <td>35</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<?php include "../components/cscordinator_footer.php";