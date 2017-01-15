
<style>


    .navbar-login
    {
        width: 305px;
        padding: 10px;
        padding-bottom: 0px;
    }

    .navbar-login-session
    {
        padding: 10px;
        padding-bottom: 0px;
        padding-top: 0px;
    }

    .icon-size
    {
        font-size: 87px;
    }
</style>


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
            <ul class="nav navbar-nav navbar-right" style="margin-right:30px; padding: 10px;" id="jrnavbar">
                <li><a href="index.php" style="height:50px;"><span class="glyphicon glyphicon-home"></span> Home</a></li>



                <li class="dropdown" id="jrreporttab">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">   <span class="glyphicon glyphicon-list-alt"> Reports</span><span class="caret">
                      
                    </a>
                   <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="generate_report.php">Select Report</a></li>
                       
                        
                      
                    </ul>
                </li>

                <li class="dropdown" id="jrlecturer">
                    <a href="lecturer.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">  <span class="glyphicon glyphicon-user"> Lecturer </span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="lecturer.php">Add Lecturer</a></li>
                    </ul>
                </li>


                <li class="dropdown" id="jrcourse">
                    <a href="course.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">  <span class="glyphicon glyphicon-education"> Courses</span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="course.php">Add Courses</a></li>
                        <li><a tabindex="-1" href="editcourse.php">Edit Courses</a></li>
                    </ul>
                </li>


            <li class="dropdown" id="jrmessages">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;"><span class="glyphicon glyphicon-envelope"> Message  </span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="email.php">Email</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a tabindex="-1" href="notification.php">Notification</a></li>
                        
                    </ul>
                </li>



                <ul class="nav navbar-nav navbar-right" >
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> 
                            <strong><?php echo $staff_data['first_name']; ?></strong>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <span class="glyphicon glyphicon-user icon-size"></span>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left"><strong><?php echo $staff_data['first_name']. " ". $staff_data['last_name']; ?></strong></p>
                                            <p class="text-left small"><?php echo $staff_data['email']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
</nav>
