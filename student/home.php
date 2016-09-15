<?php require '../core/init.php'; ?>

<?php include "../components/stud_head.php"; ?>

    </head>

    <body>

    <!-- start of nav bar-->
    <nav class="navbar navbar-custom" role = "navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button style="background-color:white;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="Home.html" class="logo pull-left"><img src="../public/dist/img/system/csclogo.png" style="width:auto; height:42px;"></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Login.html"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            </ul>
        </div>
        </div>
    </nav>

    <!-- start of body -->
    <div class="container-fluid">
        <div class="row content" id="row">

            <!-- start of course panel -->
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-default" id="course-panel">
                    <div class="panel-heading" >
                        <h3>Courses</h2>
                    </div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" >Course 1</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="Subject.html">Subject 1</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 2</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 3</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 4</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 5</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel panel-default" >
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" >Course 2</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="Subject.html">Subject 1</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 2</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 3</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 4</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 5</a></li>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" >Course 3</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="Subject.html">Subject 1</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 2</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 3</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 4</a></li>
                                        <li class="list-group-item"><a href="Subject.html">Subject 5</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- start of news feed -->


            <div class="col-md-6 col-sm-12 col-xs-12">
                <div id="newsfeed">
                    <div class="col-sm-12 col-xm-12"> <h3>News Feed</h3></div>

                    <?php

                    $posts = getposts();
                    while ($row = mysqli_fetch_assoc($posts)) {
                        $id = $row['adminid'];
                        $admindata = getadmin($id);
                        while ($data = mysqli_fetch_assoc($admindata)) {
                            ?>

                            <div class="col-sm-12 col-xm-12" >
                                <div id="nws">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" ><strong><?php echo $row['subject']; ?></strong> <br>
                                            <small>Posted by <?php echo $data['name']; ?></small>
                                            <div style="width: 10%; margin-left: 85%;margin-top: -5%;height: 70px;"><img src="<?php echo $data['profile']; ?>" alt="" style="width: 100%; height: 100%;"></div>

                                        </div>
                                        <div class="panel-body" id="newsbody">
                                            <?php echo $row['text']; ?>
                                            <div id="attach"><a href=""><?php echo $row['date']; ?></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                        }

                    } ?>
                </div>
            </div>

            <!-- start of user profile -->
            <div class="col-md-3 col-sm-12 col-xs-12" style="margin-top: 55px;">
                <div class="panel panel-default" id="profile">
                    <div class="panel-heading" >
                        <h3>User Profile</h2>
                    </div>
                    <div class="panel-body" id="user-profile">
                        <div class="user-profile-pic">
                            <img src="img/default_profile.jpg" class="img-responsive" alt="profile picture is here" style="width:120px; height:130px;">
                        </div>
                        <div class="user-details" >
                            <div><h4>User Name</h4></div>
                            <p>Country:User Country</p>
                            <p>City/Town:User City/Town</p>
                            <a href="" id="user-email">useremail@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

























<?php include "../components/stud_footer.php"; ?>