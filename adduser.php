
<?php
require 'core/init.php';
error_reporting(0);

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}

require  'components/page_head.php'; ?>

<script>

    function generate(type, text) {

        var n = noty({
            text        : text,
            type        : type,
            dismissQueue: true,
            layout      : 'topRight',
            closeWith   : ['click'],
            theme       : 'relax',
            maxVisible  : 10,
            animation   : {
                open  : 'animated bounceInLeft',
                close : 'animated bounceOutLeft',
                easing: 'swing',
                speed : 500
            }
        });
        console.log('html: ' + n.options.id);
    }

    function generateAll() {

        generate('success', notification_html[2]);

    }

</script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <a href="index2.html" class="logo">

            <span class="logo-mini"><b>CSC</span>

            <span class="logo-lg"><b>CSC</b>  UCSC</span>
        </a>

        <?php include "components/navbar.php";?>
    </header>

    <aside class="main-sidebar">


        <section class="sidebar">

            <?php include 'components/sidebar_head.php'?>

            <?php include 'components/sidebar.php'?>

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Add Users

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
                        <li class="active">Add</li>
                    </ol>
                </section>

                <section class="content">
                        <div class="row">
                            <div class="col-md-6">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add new User</h3>
                            </div>

                            <div class="box-body">
                                <form action="" method="post">

                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter First Name" name="first_name">
                                    </div>

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" placeholder="Enter Password" name="password">
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                            <option>-- SELECT --</option>
                                            <option>CSC Cordinator</option>
                                            <option>CSC Staff</option>
                                            <option>Course Cordinator</option>

                                        </select>
                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-info pull-right" name="adduser">Add Member</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                            </div>

                            <div class="col-md-6">


                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Current Users</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tr>

                                                <th>Role</th>
                                                <th>Count</th>
                                                <th style="width: 40px">Status</th>
                                            </tr>

                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>


                </section>

            </div>

            <?php include "components/footer.php"; ?>
            <?php include "components/activity_bar.php"; ?>

            <div class="control-sidebar-bg"></div>
</div>

<?php require  'components/page_tail.php';


$id = $user_data['id'];
if(isset($_POST['adduser']) === true){

    $postdata = array(


        'first_name' =>  $_POST['first_name'],
        'last_name' =>  $_POST['last_name'],
        'email' =>  $_POST['email'],
        'password' =>  md5($_POST['password']),
        'role' => $_POST['role']
    );

    adduser($con,$postdata);
    ?>

    <script>

        generateAll();

    </script>

    <?php
    exit();



} ?>







?>