
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Computing And Service Center</title>
    <link rel="stylesheet" href="public/css/custom.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/dist/css/skin-blue.css">
    <!--<link rel="stylesheet" href="public/dist/css/buttons.css">-->
    <link rel="stylesheet" href="public/dist/css/basic.css" />
    <link rel="stylesheet" href="public/dist/css/mainlogin.css" />
    <link rel="stylesheet" href="public/dist/css/mainloginbody.css" />
    <link rel="stylesheet" href="public/dist/css/modalform.css" />
    <link rel="stylesheet" href="public/plugins/sweealert/sweetalert.css" />
    <!-- <link rel="stylesheet" href="public/plugins/sweealert/google.css" /> -->
    <link rel="stylesheet" href="public/plugins/wysiwig/bootstrap3-wysihtml5.min.css">
    <script src="public/plugins/jQuery/jquery.js"></script>
    <script src="public/plugins/sweealert/sweetalert.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script>
        $(document).ready(function () {
            $('button#login').click(function () {
                var person= $(this).parent().attr('id');
                $("#login-modal").modal();

                $('form#login-form').submit(function(e) {

                    e.preventDefault();

                        var email    =  $('input[name=email]').val();
                        var password  =  $('input[name=password]').val();



                    $.ajax({

                        type:"get",
                        url:'submit.php?email='+email+'&pass='+password+"&mode="+person,
                        success:function (data) {
                            console.log(data);
                            if(data != 'false'){

                                if (person == 'Course Cordinator'){

                                    window.location = 'courseco/index.php?u='+data;

                                } else if (person == 'CSC Cordinator'){

                                    window.location = 'cscco/index.php?u='+data;
                                }
                            }
                            
                        }



                    });


                });


                });
        });


    </script>





</head>


<body>
    <section class="content" style="margin: 10% 10%;">
    <div class="row">

        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">CSC Staff</h3>

                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="public/dist/img/system/staff.jpg" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">


                        <div class="col-sm-2">

                        </div>

                        <div class="col-sm-4">
                            <div class="description-block" id="CSC Staff">
                                <button type="button" class="btn btn-block btn-info btn-sm" data-target="#login-modal" id="login">Log in</button>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <button type="button" class="btn btn-block btn-warning btn-sm">Cancel</button>
                            </div>
                            <!-- /.description-block -->
                        </div>


                        <div class="col-sm-2">

                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>


        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">Course Coordinator</h3>

                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="public/dist/img/system/cc.png" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">

                        <div class="col-sm-2">

                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block" id="Course Cordinator">
                                <button type="button" class="btn btn-block btn-info btn-sm" data-target="#login-modal" id="login">Log in</button>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <button type="button" class="btn btn-block btn-warning btn-sm">Cancel</button>
                            </div>
                            <!-- /.description-block -->
                        </div>


                        <div class="col-sm-2">

                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>

    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">CSC Coordinator</h3>

            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="public/dist/img/system/csc.png" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="row">

                    <div class="col-sm-2">

                        <!-- /.description-block -->
                    </div>
                    <div class="col-sm-4">
                        <div class="description-block" id="CSC Cordinator">
                            <button type="button" class="btn btn-block btn-info btn-sm" data-target="#login-modal" id="login">Log in</button>
                        </div>
                        <!-- /.description-block -->
                    </div>

                    <div class="col-sm-4">
                        <div class="description-block">
                            <button type="button" class="btn btn-block btn-warning btn-sm">Cancel</button>
                        </div>
                        <!-- /.description-block -->
                    </div>


                    <div class="col-sm-2">

                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>

    </section>

    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img-square" id="img_logo" src="public/dist/img/system/ucsc.ico">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Begin # DIV Form -->
                <div id="div-forms">

                    <!-- Begin # Login Form -->
                    <form id="login-form">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your email and password.</span>
                            </div>
                            <input id="login_username" name="email" class="form-control" type="text" placeholder="email" required>
                            <input id="login_password" name="password" class="form-control" type="password" placeholder="Password" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>

                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="public/plugins/jQuery/jquery.js"></script>
    <script src="public/plugins/jQueryUI/jquery-ui.js"></script>
    <script src="public/js/bootstrap.js"></script>
    <script src="public/plugins/wysiwig/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="public/dist/js/app.min.js"></script>

    </body>
</html>