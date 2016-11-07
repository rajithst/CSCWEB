<?php 
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}


//require '../core/init.php';
//require '../core/function/coursecode.php';
include '../components/course_head.php'; ?>


    </head>
<body>

    <!--start of the navbar<!-->
    <?php include "comp/navbar.php"; ?>

    <!-- end of the navbar><!-->


    <div class="container-fluid">
        <div class="row content" style="margin-top: 50px;">
            <!--start of leftbar><!-->
            <div class="sidenav col-md-2 col-sm-3 col-xs-12" style="margin-top: 35px;">
                <div class="well">
                    <p><a href="#"><strong>Upcoming Events</strong></a></p>

                </div>

                <div class="panel panel-default" id="message-panel">
                    <center><div class="panel-heading" style="background-color:#66B9BF;"><strong>Notifications & E-mails</strong></div></center>
                    <div class="panel-body">
                        <ul>
                            <li><span class="glyphicon glyphicon glyphicon-comment"></span><a href="notifications.html"><strong> Students</strong></a></li>
                            <li><span class="glyphicon glyphicon-envelope"></span><a href=""><strong> Lecturers</strong></a></li>

                        </ul>
                    </div>
                </div>

            </div>
            <!--end of leftbar><!-->


            <!-- start of News feed><!-->
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="container-fluid" id="news-feed-div">
                    <center><h3 id="NEWS">News</h3></center>

                            <div class="col-sm-12 col-xm-12" >
                                <div id="nws">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" ><strong></strong> <br>
                                            <small></small>
                                            <div style="width: 6%; margin-left: 90%;margin-top: -3%;height: 70px;"><img src="" alt="" style="width: 100%; height: 100%;"></div>

                                        </div>
                                        <div class="panel-body" id="newsbody">
                                            
                                            <div id="attach"><a href=""></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>

            </div>
            <!-- end of News feed><!-->


            <!-- start of rightbar><!-->

            <!-- profile picture image-component><!-->
            <div class="sidenav col-md-2  col-sm-3 col-xs-12" style="margin-top: 35px;">
                <div class="panel panel-default" id="profpic-panel" style="height: 225px;">
                    <center><div class="panel-heading" style="background-color:#66B9BF;"><strong> Logged in as</strong></div></center>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <center>

                                    <div>
                                        <div class="thumbnail" style="width: 115px; margin-left: 0px;height: 120px;"><img src="../public/dist/img/system/cscco.png" alt=""></div>
                                    </div>

                                </center>
                                </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div id="profpic-well" style="margin-left: 75px; margin-top: -9px;color: #66B9BF">

                                        <strong></strong></br>

                                    </div>
                                </div>
                            </div>
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

  <!--  <script>

        $(document).ready(function () {
           $('li.dropdown-submenu>a.mainco').mouseover(function () {
               var courseno = this.id;

               $.ajax({
                  url:'getsubs.php?cid='+courseno,
                   type:'get',
                   success:function (data) {
                    $('li.dropdown-submenu>ul#subjects').html("");
                    $('li.dropdown-submenu>ul#subjects').html(data);

                   }


               });
           });






        });









    </script>
-->