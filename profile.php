
<?php
require 'core/init.php';
error_reporting(0);

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
$var =basename($current_file,".php");
require  'components/page_head.php';

?>

<script>

    $(document).ready(function() {
        $('#myDatatable').DataTable();
    });


</script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>CSC</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CSC</b>  UCSC</span>
        </a>

        <!-- Header Navbar -->
        <?php include "components/navbar.php";?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">


        <section class="sidebar">


            <?php include 'components/sidebar_head.php'?>

            <?php include 'components/sidebar.php'?>
            <!-- Sidebar Menu --

    <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        My Profile

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Profile</a></li>
                        <li class="active">My</li>
                    </ol>
                </section>



                <section class="content">

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src=" <?php echo $user_data['profile']; ?>" alt=" <?php echo $user_data['name']; ?>" >

                <h3 class="profile-username text-center"><?php echo $user_data['name']; ?></h3>

                <p class="text-muted text-center"><?php echo $user_data['role']; ?></p>


                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                        </ul>
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="file" name="profile">

                    <div class="box-footer">
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Upload</button>
                    </div>

                </form>

            </div>
            <!-- /.box-body -->
        </div>

    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>

                <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <!-- Post -->


                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>

            </div>
            <!-- /.content-wrapper -->
            <?php include "components/footer.php"; ?>
            <?php include "components/activity_bar.php"; ?>

            <div class="control-sidebar-bg"></div>
</div>

<?php require  'components/page_tail.php';

$id = $user_data['id'];

if (isset($_FILES['profile']) === true and empty($_FILES['profile']['name'])=== false ) {

        $allowed=array('jpg','jpeg','gif','png');
        $file_name = $_FILES['profile']['name'];
        $file_extn= strtolower(end(explode('.',$file_name)));
        $file_temp=$_FILES['profile']['tmp_name'];


        if (in_array($file_extn,$allowed) === true) {
            $res = change_profile_image($con,$id,$file_temp,$file_extn);

            if($res == true){ ?>

                <script>

                    $.ajax({

                        type:"get",
                        url:'core/function/admin.php?getpath',
                        dataType:'json',
                        success:function(data){

                            alert('data');



                        }


                    });
                </script>



            <?php }


        }

}

?>