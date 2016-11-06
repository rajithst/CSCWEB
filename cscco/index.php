<?php 
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
include '../components/cscordinator_head.php'; ?>

</head>
<body>

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
        <li><a class="navbar-brand navbar-right" href="#" style="height:40px;"> </a></li>
      </ul>
    </div>
  </div>
</nav>
    
   </br> 
    
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">REPORTS<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="#">Attendence</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">Income</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">Marks</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">Expences</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">Handle Report</a></li>
                <li role="separator" class="divider"></li>
            </ul>
        </li>
              
              <li class="dropdown">
            <a href="handle_lecturer.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">HANDLE LECTURER <span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="handle_lecturer.php">Handle Lecturer</a></li>
                </ul>
                </li>
                  
                  
                <li class="dropdown">
            <a href="handle_course.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">HANDLE COURSES<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="handle_course.php">Handle Courses</a></li>
                </ul>
                </li>
                    
                    
                    
            
                    
                    
                    <li class="dropdown">
            <a href="handle_lectures.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">HANDLE LECTURES <span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="handle_lectures.php">Handle Lectures</a></li>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">SEND<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="email.php">Email</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="notification.php">Notification</a></li>
                <li role="separator" class="divider"></li>
            </ul>
                </li>
      </ul>
    </div>
  </div>
</nav>
</br>
    
    <!-- other information leftbar panel><!-->
<div class="sidenav col-md-2 col-sm-3 col-xs-12">
    <div class="well">
        <p><a href="#" style="color:black;"><strong>Upcoming Events</strong></a></p>
    </div>
</div>

<!-- start of News feed><!-->
<div class="col-md-8 col-sm-6 col-xs-12">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading"  style="background-color:black;" id="newsfeed"><strong>News Feed</strong></div>

            <h2> <?php print_r($_SESSION); ?></h2>
            <div class="panel-body" id="newsfeed-panelbody" style="background-color:dimgray;"></div>
        </div>
    </div>
</div>

    
    <br>
<!-- profile picture image><!-->
<div class="sidenav col-md-2  col-sm-3 col-xs-12">
    <div class="panel panel-default" id="profpic-panel">
        <div class="panel-heading" style="background-color:black;"><strong>Logged in User</strong></div>
        <div class="panel-body" style="background-color:dimgray;">
            <div class="thumbnail"><img src="..\public\dist\img\profile\profilepic.png" class="img-circle" height="65" width="65" alt="Avatar"></div>
            
            <div id="profpic-well">
                <strong>CSC Coordinator</strong></br>
                Country :</br>
                Name :
            </div>
        </div>
    </div>
    <div class="well">
        <p><a href="#" style="color:black;">Calendar</a></p>
    </div>
</div>
</div>
</div>
</div>
</div>

<?php include "../components/cscordinator_footer.php"; ?>
