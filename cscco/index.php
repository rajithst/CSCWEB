<?php include '../components/cscordinator_head.php'; ?>

</head>
<body style="background-color:blanchedalmond">

<!-- page header ><!-->
<nav class="navbar navbar-custom" role = "navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button style="background-color:burlywood;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#"><img src="../public/dist/img/system/csclogo.png" style="width:170px; height:50px;" ></a>


        </div>
        <div class="collapse navbar-collapse" id="navbar_collapse" >
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" style="height:50px;"><span class="glyphicon glyphicon-home" style="hover:pink;"></span> HOME</a>
                <li><a href="#" style="height:50px;"><span class="glyphicon glyphicon-globe"></span> NOTIFICATIONS</a></li>
                <li><a href="#" style="height:50px;"><span class="glyphicon glyphicon-envelope"></span> MESSAGES</a></li>
                <li><a class="navbar-brand navbar-right" href="#" style="height:40px;">(LOGOUT)</a></li>
            </ul>
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
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color:burlywood;">
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">REPORTS<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="#">ATTENDENCE</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">INCOME</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">MARKS</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">EXPENCES</a></li>
                <li role="separator" class="divider"></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">HANDLE LECTURER <span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="handlelecturer.html">HANDLE LECTURER</a></li>
                </li>



            </ul>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">HANDLE COURSES<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="handlecourses.html">HANDLE COURSES</a></li>
                </li>

            </ul>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">HANDLE DATA<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="#">REPORT DATA</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">LECTURE ALLOCATION</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="#">OTHERS</a></li>
                <li role="separator" class="divider"></li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">HANDLE LECTURES <span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="handlelectures.html">HANDLE LECTURES</a></li>
                </li>
            </ul>

        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;">SEND<span class="caret">
            </a>
            <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
                <li><a tabindex="-1" href="#">EMAILS</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="notifications.html">NOTIFICATIONS</a></li>
                <li role="separator" class="divider"></li>
                <li><a tabindex="-1" href="messages.html">MESSAGES</a></li>
                <li role="separator" class="divider"></li>

            </ul>
        </li>


</div>
</div>
</div>

</div></div></nav>
<br>

<!-- other information leftbar panel><!-->
<div class="sidenav col-md-2 col-sm-3 col-xs-12">
    <div class="well">
        <p><a href="#" style="color:brown;"><strong>Upcoming Events</strong></a></p>

    </div>


</div>





<!-- start of News feed><!-->
<div class="col-md-8 col-sm-6 col-xs-12">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading"  style="background-color:burlywood;" id="newsfeed"><strong>News Feed</strong></div>
            <div class="panel-body" id="newsfeed-panelbody" style="background-color:dimgray;"></div>
        </div>
    </div>
</div>



<br>


<!-- profile picture image><!-->
<div class="sidenav col-md-2  col-sm-3 col-xs-12">
    <div class="panel panel-default" id="profpic-panel">
        <div class="panel-heading" style="background-color:burlywood;"><strong>Logged in User</strong></div>
        <div class="panel-body" style="background-color:dimgray;">
            <div class="thumbnail"></div>
            <div id="profpic-well">

                <strong>CSC Coordinator</strong></br>
                Country :</br>
                Name :
            </div>
        </div>
    </div>


    <div class="well">
        <p><a href="#" style="color:brown;">Calendar</a></p>
    </div>




</div>
</div>
</div>



<?php include "../components/cscordinator_footer.php"; ?>
