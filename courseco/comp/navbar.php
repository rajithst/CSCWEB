
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


    .upload-drop-zone {
  height: 200px;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
</style>


<nav class="navbar navbar-inverse navbar-static-top">
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
            <ul class="nav navbar-nav navbar-right" style="margin-right:30px; padding: 10px;">


                <li class="dropdown">
                    <a href="index.php" style="color:white;"><span class="glyphicon glyphicon-home"></span> Home</a>
                </li>

                <li class="dropdown">
                    <a href="course.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;"><span class="glyphicon glyphicon-education"></span> Courses<span class="caret"></span>
                    </a>

                    <?php 
                    $id = $staff_data['id'];
                    $res = getcourses($id); ?>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                    <?php while ($row = mysqli_fetch_assoc($res)) {
                            $sid= $row['subjectid']; 
                     ?>
                       
                        <li id=""><a tabindex="-1" href="fileupload.php?id=<?php echo $sid; ?>"><?php echo $row['subject']; ?></a></li>
                        <?php }?>
                    </ul>
                </li>


              <!-- <li class="dropdown">
                    <a href="course.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">Notification<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="course.php">Notification 1</a></li>
                        <li><a tabindex="-1" href="course.php">Notification 2</a></li>
                        <li><a tabindex="-1" href="course.php">Notification 3</a></li>
                    </ul>
                </li>-->

                <!--<li class="dropdown">
                    <a href="lectures.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">Attendance <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="lectures.php">Attendance of course 1</a></li>
                        <li><a tabindex="-1" href="lectures.php">Attendance of course 2</a></li>
                        <li><a tabindex="-1" href="lectures.php">Attendance of course 3</a></li>
                        </li>
                    </ul>
                </li>-->



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
                                            <p class="text-left">
                                                <a href="#" class="btn btn-primary btn-block btn-sm">See Profile</a>
                                            </p>
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