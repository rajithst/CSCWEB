<?php

require '../core/init.php';
include "../components/page_head.php";

?>
<link href="../public/dist/css/newCourseCoordinator.css" rel="stylesheet"/>
</head>


<nav class="navbar navbar-custom" role = "navigation">
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
            <ul class="nav navbar-nav navbar-right" style="margin-right: 230px;">


                <!-- "Course" Nested-drop-down for courses begins from here. Line 29-94><!-->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Course<span class="caret">
                    </a>
                    <ul class="dropdown-menu multi-level dropdown-color" role="menu" aria-labelledby="dropdownMenu" style="padding: 0;">

                        <li class="dropdown-submenu">
                            <?php

                            $id = 2;
                            $res = getcourse_cord($id);

                            while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <a tabindex="-1" href="#" id="<?php echo $row['courseid']; ?>" class="mainco"><?php echo $row ['coursename']; ?></a>
                                <ul class="dropdown-menu dropdown-color" style="padding: 0;" id="subjects">

                                </ul>
                            <?php } ?>

                        </li>

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


    <div class="container">
    <div class="row">
        <?php
            $subid = $_GET['subject'];
            $result = getallfucks($subid);


        ?>
        <center><h3 style="margin-top: 5%;"><?php echo $result; ?></h3></center>
        <div class="col-md-2">



        </div>

        <div class="col-md-8" style="margin-top: 10%;">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Uploading Area</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" action="" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Topic</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  placeholder=""  name="topic">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Content</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                                    </div>
                                </div>

                            </div>

                            <center><div class="form-group">
                                    <input type="file" id="file-1" class="file" multiple ="multiple" name="slide">
                                </div>

                                <button type="submit" class="btn btn-success" name="posting"> Post Slides</button>
                </form>
            </div>



        </div>

        <div class="col-md-2"></div>



    </div>
    </div>

<?php include "../components/page_tail.php";

        if (isset($_POST['posting'])){


            $topic = $_POST['topic'];
            $content = $_POST['content'];
            $subid = $_GET['subject'];

            $data = array(

                'topic' => $topic,
                'content' => $content,
                'path' => '',
                'subjectid' => $subid

            );

            $res = insertslides($data);

            if ($res == true){ ?>

                <script>

                    swal("Posted!", "Your have benn published a post to timeline");

                </script>

                   <?php
                exit();
            }



        }




?>

<script>

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
