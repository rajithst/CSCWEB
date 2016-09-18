<?php

require '../core/init.php';
include "../components/page_head.php";

?>

</head>

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

