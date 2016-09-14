
    <?php
    require '../core/init.php';
    error_reporting(0);

    if(logged_in() === false){

        session_destroy();
        header('Location:index.php');
        exit();

    }

require '../components/page_head.php';
$var =basename($current_file,".php");?>

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
        <?php include "../components/navbar.php";?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?php include '../components/sidebar_head.php' ?>
            <?php include '../components/sidebar.php'?>
            <!-- Sidebar Menu --

    <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Draft Posts

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Posts</a></li>
                        <li class="active">Draft</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Draft Posts</h3>

                                </div>
                                <!-- /.box-header -->

                                <div class="box-body table-responsive no-padding" id="tablebox">

                                   
                                    <table class="table table-striped table-bordered" id="draftpost">
                                        <thead>
                                        <tr>
                                            <th style='text-align: center'>Admin ID</th>
                                            <th style='text-align: center'>Post ID</th>

                                            <th style='text-align: center'>Title</th>
                                            <th style='text-align: center'>Date</th>
                                            <th style='text-align: center'>Status</th>


                                        </tr>

                                        </thead>
                                        <tbody>
                                    <?php $id = $user_data['id']; 
                                    $result =draftpost($con);

                                        while($row = $result->fetch_assoc()) {

                                           $adminid = $row["adminid"];
                                           $id = $row["id"]; 
                                           $subject = $row["subject"];
                                           $date = $row['date'];


                                 ?>                                       


                                            <tr>
                                            <td style='text-align: center'><?php echo $adminid; ?></td>
                                            <td style='text-align: center'><?php echo $id; ?> </td>
                                            <td style='text-align: center'><?php echo $subject; ?></td>
                                            <td style="text-align: center"><?php echo $date; ?></td>
                                            <td style="text-align: center"><button id='post' type='button' class='btn btn-success' >Post</button> <button id='edit' type='button' class='btn btn-primary'>Edit</button> <button id='delete' type='button' class='btn btn-danger' >Delete</button></td>

                                            <?php } ?>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php include "../components/footer.php"; ?>
            <?php include "../components/activity_bar.php"; ?>

            <div class="control-sidebar-bg"></div>
</div>



<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
         <div class="col-md-9">
            <form action="" method="post" id="idForm">
                      <div class="box box-primary" id="2">
                        <div class="box-header with-border">
                          <h3 class="box-title">Edit this post</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="form-group">

                              <label><input type="checkbox" value="student" id="student" name="user[]" >     Student</label> <br>
                              <label><input type="checkbox" value="coursec" id="coursec" name="user[]" >     Course Cordinator</label> <br>
                              <label><input type="checkbox" value="cscc" id="cscc" name="user[]">     CSC Cordinator</label>


                          </div>
                          <div class="form-group">
                            <input class="form-control" placeholder="Subject:" name="subject" type="text" required>
                          </div>
                          <div class="form-group">
                                <textarea id="compose-textarea" class="form-control" style="height: 300px" name="content" type="text" required>

                                </textarea>
                          </div>
                          <div class="form-group">
                            <div class="btn btn-default btn-file">
                              <i class="fa fa-paperclip"></i> Attachment
                              <input type="file" name="attachment">
                            </div>
                            <p class="help-block">Max. 32MB</p>
                          </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <div class="pull-right">
                            <button type="submit" id= "draft" class="btn btn-default" name="draft"><i class="fa fa-pencil"></i> Draft</button>
                            <button type="submit" class="btn btn-primary" name="postdata"><i class="fa fa-envelope-o"></i> Post</button>
                          </div>
                          <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                        </div>
                        <!-- /.box-footer -->
                      </div>
            </form>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->










<?php require  '../components/page_tail.php'; ?>

<script type="text/javascript">
    
    $(document).ready(function() {


    $(function () {

        $("#compose-textarea").wysihtml5();
    });
        
        $('td > button').click(function() {
        var table = $(this).closest('tr').find('td:nth-child(2)').text();

        var id = this.id;
        console.log(id);
            
            if (id == "delete") {

                swal({  
                    title: "Are you sure?",
                    text: "You will not be able to recover this action!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    cancelButtonText: "No, cancel ",   
                    closeOnConfirm: false,   closeOnCancel: false }, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            swal("removing!", "Your imaginary file has been deleted.", "success");   

                        $.ajax({
                            url: 'deletepost.php?delete='+table,
                            type: 'get',
                           success:function (data) {

                                if (data == true) {

                                    location.reload(true);
                                }
                               
                           }
                       });
            } else{
                swal("Cancelled", "Your post is safe :)", "error");   
            } 
        });

            }else if (id == "edit") {

                edit();



                
            } else {
                
            }




        });

        function edit () {
             $('#modal_form').modal('show'); 
        }


    });




</script>