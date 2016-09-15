<?php include "../components/stud_head.php"; ?>


    </head>

    <body>

    <!-- start of nav bar-->
    <nav class="navbar navbar-custom" role = "navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="logo pull-left"><img src="../public/dist/img/system/csclogo.png" style="width:auto; height:42px;"></a>
            </div>
        </div>
    </nav>

    <!-- start of body -->
    <div class="container-fluid">
        <div class="row content" id="row">
            <!-- start of news feed -->
            <div class="col-md-9 col-sm-12 col-xs-12 text-left">
                <div id="newsfeed">
                    <div class="col-sm-12 col-xm-12"> <h3>News Feed</h3></div>
                    <div class="col-sm-12 col-xm-12">
                        <div id="nws">
                            <div class="panel panel-default">
                                <div class="panel-heading">News 1</div>
                                <div class="panel-body" id="newsbody">

                                    <div id="attach"><a href="">Attachment</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xm-12">
                        <div id="nws">
                            <div class="panel panel-default">
                                <div class="panel-heading">News 2</div>
                                <div class="panel-body" id="newsbody">
                                    <div id="attach"><a href="">Attachment</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xm-12">
                        <div id="nws">
                            <div class="panel panel-default">
                                <div class="panel-heading">News 3</div>
                                <div class="panel-body" id="newsbody">
                                    <div id="attach"><a href="">Attachment</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xm-12">
                        <div id="nws">
                            <div class="panel panel-default">
                                <div class="panel-heading">News 4</div>
                                <div class="panel-body" id="newsbody">
                                    <div id="attach"><a href="">Attachment</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xm-12">
                        <div id="nws">
                            <div class="panel panel-default">
                                <div class="panel-heading">News 5</div>
                                <div class="panel-body" id="newsbody">
                                    <div id="attach"><a href="">Attachment</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div align="center"> <a href="">Older topics..</a></div>
                </div>
            </div>

            <!-- start of student login form -->
            <div class="col-md-3 col-sm-12 col-xs-12" style="margin-top: 55px;">
                <div class="panel panel-default" id="student-login">
                    <div class="panel-heading" >
                        <h3>Student Login</h2>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="email">User Name:</label></br>
                                <input type="user-name" class="form-control" id="user-name">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="pwd">Password:</label></br>
                                <input type="password" class="form-control" id="pwd" >
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label><input type="checkbox"> Remember me</label>
                            </div>
                            </br>
                            <button type="submit" class="btn btn-info">Login</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>





























<?php include "../components/stud_footer.php"; ?>