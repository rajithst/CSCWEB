<?php include '../components/course_head.php'; ?>

</head>
<body>

<nav class="navbar navbar-custom" role = "navigation>
  <div class="container-fluid">
    <div class="navbar-header">
      <button style="background-color:white;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#"><img src="../public/dist/img/system/csclogo.png" style="width:170px;"></a>

    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">


        <!-- "Course" Nested-drop-down for courses begins from here. Line 29-82><!-->

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Course<span class="caret">
          </a>
          <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">

            <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">Course No 1</a>
                  <ul class="dropdown-menu dropdown-color">
                    <li><a tabindex="-1" href="upload.html">Subject 1</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="upload.html">Subject 2</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="upload.html">Subject 3</a></li>
                  </ul>
            </li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">Course No 2</a>
                  <ul class="dropdown-menu dropdown-color">
                    <li><a tabindex="-1" href="#">Subject 1</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 2</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 3</a></li>
                  </ul>
            </li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">Course No 3</a>
                  <ul class="dropdown-menu dropdown-color">
                    <li><a tabindex="-1" href="#">Subject 1</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 2</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 3</a></li>
                  </ul>
            </li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">Course No 4</a>
                  <ul class="dropdown-menu dropdown-color">
                    <li><a tabindex="-1" href="#">Subject 1</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 2</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 3</a></li>
                  </ul>
            </li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">Course No 5</a>
                  <ul class="dropdown-menu dropdown-color">
                    <li><a tabindex="-1" href="#">Subject 1</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 2</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 3</a></li>
                  </ul>
            </li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">Course No 6</a>
                  <ul class="dropdown-menu dropdown-color">
                    <li><a tabindex="-1" href="#">Subject 1</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 2</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Subject 3</a></li>
                  </ul>
          </ul>
        </li>

        <!-- End of "Course" Nested-drop-down><!-->

        <!-- drop-down for notifications><!-->

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notifications<span class="caret">
          </a>
        </li>

        <!-- end of notifications drop-down><!-->



        <!-- drop-down for attendance><!-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Attendance<span class="caret">
          </a>
          <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu">
            <li><a tabindex="-1" href="#">Attendance of Course No 1</a></li>
            <li role="separator" class="divider"></li>
            <li><a tabindex="-1" href="#">Attendance of Course No 2</a></li>
            <li role="separator" class="divider"></li>
            <li><a tabindex="-1" href="#">Attendance of Course No 3</a></li>
            <li role="separator" class="divider"></li>
            <li><a tabindex="-1" href="#">Attendance of Course No 4</a></li>
            <li role="separator" class="divider"></li>
            <li><a tabindex="-1" href="#">Attendance of Course No 5</a></li>
            <li role="separator" class="divider"></li>
            <li><a tabindex="-1" href="#">Attendance of Course No 6</a></li>
          </ul>
        </li>

        <!-- end of attendance drop-down><!-->
      </ul>

    </div>
  </div>
</nav>

<!-- end of the navbar><!-->


<div class="container-fluid">
  <div class="row content">
  <!-- other information leftbar panel><!-->
    <div class="sidenav col-md-2 col-sm-3 col-xs-12">
      <div class="well">
        <p><a href="#"><strong>Upcoming Events</strong></a></p>

      </div>

      <div class="panel panel-default" id="message-panel">
        <div class="panel-heading" style="background-color:rgb(230,230,0);"><strong>Notifications & E-mails</strong></div>
        <div class="panel-body">
          <ul>
            <li><span class="glyphicon glyphicon glyphicon-comment"></span><a href="notifications.html"><strong> Students</strong></a></li>
            <li><span class="glyphicon glyphicon-envelope"></span><a href=""><strong> Lecturers</strong></a></li>

          </ul>
        </div>
      </div>

    </div>
    <!-- start of News feed><!-->
    <div class="col-md-8 col-sm-6 col-xs-12">
      <div class="container-fluid">
        <div class="panel panel-default">
          <div class="panel-heading" id="newsfeed-panelheading"><strong>News Feed</strong></div>
          <div class="panel-body" id="newsfeed-panelbody"></div>
        </div>
      </div>
    </div>

    <!-- profile picture image><!-->
    <div class="sidenav col-md-2  col-sm-3 col-xs-12">
      <div class="panel panel-default" id="profpic-panel">
        <div class="panel-heading" style="background-color:rgb(230,230,0);"><strong>Logged in User</strong></div>
        <div class="panel-body">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-6 col-sm-12">
        <div class="thumbnail"></div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div id="profpic-well">

            <strong>L.P</strong></br>
            <strong>Jayasinghe</strong></br>
            <strong>Country</strong></br>
Sri Lanka</br>
Name :
            </div>
            </div>
            </div>
            <a href="#" id="logout"><strong>(Log Out)</strong></a></h3>
          </div>
        </div>
      </div>
      <div class="well">
        <p><a href="#">Calendar</a></p>
      </div>



    </div>
    </div>
  </div>

<?php include '../components/course_footer.php'; ?>