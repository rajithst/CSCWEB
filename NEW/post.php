<?php include 'components/ad_head.php' ?>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">


    <!-- START PAGE SIDEBAR -->
    <?php include "components/ad_sidebar.php";?>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">


        <!-- START X-NAVIGATION VERTICAL -->
        <?php include "components/ad_xnav.php";?>
        <!-- END X-NAVIGATION VERTICAL -->


        <!-- START BREADCRUMB -->
        <ul class="breadcrumb push-down-0">
            <li><a href="#">Home</a></li>
            <li><a href="#">Mailbox</a></li>
            <li class="active">Compose</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- START CONTENT FRAME -->
        <div class="content-frame">
            <!-- START CONTENT FRAME TOP -->
            <div class="content-frame-top">
                <div class="page-title">
                    <h2><span class="fa fa-pencil"></span> Compose</h2>
                </div>

            </div>
            <!-- END CONTENT FRAME TOP -->

            <!-- START CONTENT FRAME LEFT -->
            <div class="content-frame-left">
                <div class="block">

                    <div class="list-group border-bottom">

                        <a href="#" class="list-group-item"><span class="fa fa-flag"></span>Mail list</a>
                        <a href="#" class="list-group-item"><span class="fa fa-flag"></span>Mail list</a>
                        <a href="#" class="list-group-item"><span class="fa fa-flag"></span>Mail list</a>
                        <a href="#" class="list-group-item"><span class="fa fa-flag"></span>Mail list</a>

                    </div>
                </div>

            </div>
            <!-- END CONTENT FRAME LEFT -->

            <!-- START CONTENT FRAME BODY -->
            <div class="content-frame-body">
                <div class="block">
                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Student:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" checked value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">CSC Coordinator:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" checked value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Course Coordinator:</label>
                            <div class="col-md-10">
                                <label class="switch">
                                    <input type="checkbox" checked value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group hidden" id="mail-cc">
                            <label class="col-md-2 control-label">Cc:</label>
                            <div class="col-md-10">
                                <input type="text" class="tagsinput" value="" data-placeholder="add email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Subject:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="Re: Lorem ipsum dolor sit amet"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                    <textarea class="summernote_email" placeholder="message herr">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger"><span class="fa fa-envelope"></span> Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- END CONTENT FRAME BODY -->
        </div>
        <!-- END CONTENT FRAME -->

    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<?php include "components/ad_messagebox.php";?>
<!-- END MESSAGE BOX-->


<!-- START SCRIPTS -->
<?php include 'components/ad_foot.php'; ?>





