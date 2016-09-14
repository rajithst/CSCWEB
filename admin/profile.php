
<?php
require '../core/init.php';
//error_reporting(0);

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}
$var =basename($current_file,".php");
require '../components/page_head.php';

?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <a href="dashboard.php" class="logo">

            <span class="logo-mini"><b>CSC</span>

            <span class="logo-lg"><b>CSC</b>  UCSC</span>
        </a>


        <?php include "../components/navbar.php";?>
    </header>

    <aside class="main-sidebar">


        <section class="sidebar">


            <?php include '../components/sidebar_head.php' ?>

            <?php include '../components/sidebar.php'?>



            <div class="content-wrapper">

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


        <div class="box box-primary">
            <div class="box-body box-profile">

                <img class="profile-user-img img-responsive img-circle" id="image" src=" <?php echo $user_data['profile']; ?>" alt=" <?php echo $user_data['name']; ?>" >

                <h3 class="profile-username text-center"><?php echo $user_data['name']; ?></h3>

                <p class="text-muted text-center"><?php echo $user_data['role']; ?></p>

                <form action="profileimage.php" method="post" enctype="multipart/form-data" id="myform">

                    <input type="file" name="profile">

                    <div class="box-footer">
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Upload</button>
                    </div>

                </form>

            </div>

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


                    <div class="row">
                        <div class="col-md-12">

                            <ul class="timeline">

                                <li class="time-label">
                                          <span class="bg-red">

                                          </span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Read more</a>
                                            <a class="btn btn-danger btn-xs">Delete</a>
                                        </div>
                                    </div>
                                </li>

                        </div>

                    </div>

                </div>

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo $user_data['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $user_data['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label" > Current Password</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label" > New Password</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="password" value="">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label" value="">Password Again</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="password">
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

            <?php include "../components/footer.php"; ?>
            <?php include "../components/activity_bar.php"; ?>

            <div class="control-sidebar-bg"></div>
</div>

<?php require  '../components/page_tail.php'; ?>

<script>

    $(document).ready(function () {

        $("#myform").on("submit" ,function (e){

            e.preventDefault();

            $.ajax({

                type:"post",
                url:"profileimage.php",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function(data){

                    $("#image").attr("src","");
                    $("#image").attr("src",data);




            }



            });
        });




    });



</script>