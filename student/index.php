<?php require '../core/init.php';
error_reporting(1);

include "../components/stud_head.php"; ?>


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
                                            <div style="width: 10%; margin-left: 85%;margin-top: -3%;height: 70px;"><img src="<?php echo $data['profile']; ?>" alt="" style="width: 100%; height: 100%;"></div>

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
                        <form action="" method="post">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="email">User Name:</label></br>
                                <input type="text" class="form-control" id="user-name" name="username">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="pwd">Password:</label></br>
                                <input type="password" class="form-control" id="pwd" name="password">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label><input type="checkbox"> Remember me</label>
                            </div>
                            </br>
                            <button type="submit" class="btn btn-info" name="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php

if(isset($_POST['submit'])=== true){

     $username    = $_POST['username'];
     $password = $_POST['password'];

    $login = loginstudent($username,$password);

    if($login === false){  ?>

        <script>swal("Access Denied!", "Your Email and Password combination is incorrect!!")</script>

        <?php

    }else{

        $_SESSION['id']= $login;
       ?>
        <script> window.location = 'home.php'; </script>
        <?php
        exit();
    }
}

?>



























<?php include "../components/stud_footer.php"; ?>