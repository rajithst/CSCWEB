<?php
session_start();
require '../core/base.php';

if (logged_in() === false) {

    session_destroy();
    header('Location:index.php');
    exit();

}
require '../core/init.php';
require '../core/function/admin.php';
require '../components/adminhead.php'; ?>


<script>
    $(document).ready(function () {

        $('#chatlist>.chatperson').click(function (e) {

            e.preventDefault();
        });

        $('#chatlist>.chatperson').click(function () {

            userid = this.id;


            $.ajax({
                type: 'get',
                url: 'getmessages.php?id=' + userid + '&adminid=' +<?php echo $user_data['id']; ?>,
                async: true,
                success: function (data) {
                    $('div.msgs').html();
                    $('div.msgs').html(data);

                }

            });



        $('button#sent').click(function () {
             var mesage = $('textarea').val();

            $.ajax({
                type: 'get',
                url: 'setmessages.php?id=' + userid + '&adminid=' +<?php echo $user_data['id']; ?>+'&message='+mesage,
                async: true,
                success: function (data) {
                    $('div.msgs').html();
                    $('div.msgs').html(data);

                }

            });
            

        });

        });


    });
</script>
<style>


    #messages-main {
        position: relative;
        margin: 0 auto;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }

    #messages-main:after, #messages-main:before {
        content: " ";
        display: table;
    }

    #messages-main .ms-menu {
        position: absolute;
        left: 0;
        top: 0;
        border-right: 1px solid #eee;
        padding-bottom: 50px;
        height: 100%;
        width: 240px;
        background: #fff;
    }

    @media (min-width: 768px) {
        #messages-main .ms-body {
            padding-left: 240px;
            height: 500px;
        }
    }

    @media (max-width: 767px) {
        #messages-main .ms-menu {
            height: calc(100% - 58px);
            display: none;
            z-index: 1;
            top: 58px;
        }

        #messages-main .ms-menu.toggled {
            display: block;
        }

        #messages-main .ms-body {
            overflow: hidden;
        }
    }

    #messages-main .ms-user {
        padding: 15px;
        background: #f8f8f8;
    }

    #messages-main .ms-user > div {
        overflow: hidden;
        padding: 3px 5px 0 15px;
        font-size: 11px;
    }

    #messages-main #ms-compose {
        position: fixed;
        bottom: 120px;
        z-index: 1;
        right: 30px;
        box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
    }

    #ms-menu-trigger {
        user-select: none;
        position: absolute;
        left: 0;
        top: 0;
        width: 50px;
        height: 100%;
        padding-right: 10px;
        padding-top: 19px;
    }

    #ms-menu-trigger i {
        font-size: 21px;
    }

    #ms-menu-trigger.toggled i:before {
        content: '\f2ea'
    }

    .fc-toolbar:before, .login-content:after {
        content: ""
    }

    .message-feed {
        padding: 20px;
    }

    #footer, .fc-toolbar .ui-button, .fileinput .thumbnail, .four-zero, .four-zero footer > a, .ie-warning, .login-content, .login-navigation, .pt-inner, .pt-inner .pti-footer > a {
        text-align: center;
    }

    .message-feed.right > .pull-right {
        margin-left: 15px;
    }

    .message-feed:not(.right) .mf-content {
        background: #03a9f4;
        color: #fff;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }

    .message-feed.right .mf-content {
        background: #eee;
    }

    .mf-content {
        padding: 12px 17px 13px;
        border-radius: 2px;
        display: inline-block;
        max-width: 80%
    }

    .mf-date {
        display: block;
        color: #B3B3B3;
        margin-top: 7px;
    }

    .mf-date > i {
        font-size: 14px;
        line-height: 100%;
        position: relative;
        top: 1px;
    }

    .msb-reply {
        box-shadow: 0 -20px 20px -5px #fff;
        position: relative;
        margin-top: 30px;
        border-top: 1px solid #eee;
        background: #f8f8f8;
    }

    .four-zero, .lc-block {
        box-shadow: 0 1px 11px rgba(0, 0, 0, .27);
    }

    .msb-reply textarea {
        width: 100%;
        font-size: 13px;
        border: 0;
        padding: 10px 15px;
        resize: none;
        height: 60px;
        background: 0 0;
    }

    .msb-reply button {
        position: absolute;
        top: 0;
        right: 0;
        border: 0;
        height: 100%;
        width: 60px;
        font-size: 25px;
        color: #2196f3;
        background: 0 0;
    }

    .msb-reply button:hover {
        background: #f2f2f2;
    }

    .img-avatar {
        height: 37px;
        border-radius: 2px;
        width: 37px;
    }

    .list-group.lg-alt .list-group-item {
        border: 0;
    }

    .p-15 {
        padding: 15px !important;
    }

    .btn:not(.btn-alt) {
        border: 0;
    }

    .action-header {
        position: relative;
        background: #f8f8f8;
        padding: 15px 13px 15px 17px;
    }

    .ah-actions {
        z-index: 3;
        float: right;
        margin-top: 7px;
        position: relative;
    }

    .actions {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .actions > li {
        display: inline-block;
    }

    .actions:not(.a-alt) > li > a > i {
        color: #939393;
    }

    .actions > li > a > i {
        font-size: 20px;
    }

    .actions > li > a {
        display: block;
        padding: 0 10px;
    }

    .ms-body {
        background: #fff;
    }

    #ms-menu-trigger {
        user-select: none;
        position: absolute;
        left: 0;
        top: 0;
        width: 50px;
        height: 100%;
        padding-right: 10px;
        padding-top: 19px;
        cursor: pointer;
    }

    #ms-menu-trigger, .message-feed.right {
        text-align: right;
    }

    #ms-menu-trigger, .toggle-switch {
        -webkit-user-select: none;
        -moz-user-select: none;
    }
</style>
</head>
<body class="nav-md" style="overflow-x:hidden;">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="clearfix"></div>

                <?php include '../components/adminmenuprofile.php'; ?>

                <br/>

                <?php include '../components/adminsidebar.php'; ?>
            </div>
        </div>


        <?php include '../components/adminnavbar.php'; ?>

        <div class="right_col" role="main" style="height: 100%;">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>All Users</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">


                        <div class="container bootstrap snippet">
                            <div class="tile tile-alt" id="messages-main">
                                <div class="ms-menu">
                                    <div class="ms-user clearfix">
                                        <img src="<?php echo $user_data['profile']; ?>" alt=""
                                             class="img-avatar pull-left">
                                        <div>Signed in as <br><?php echo $user_data['role']; ?></div>
                                    </div>
                                    <div class="p-15">
                                        <div class="dropdown">
                                            <a class="btn btn-primary btn-block" href="" data-toggle="dropdown">Chat
                                                list</a>
                                        </div>
                                    </div>
                                    <div class="list-group lg-alt" id="chatlist">
                                        <?php
                                        $res = allusers($con);
                                        while ($row = mysqli_fetch_assoc($res)) { ?>

                                            <a class="list-group-item media chatperson" href="#" id="<?php echo $row['id']; ?>">
                                                <div class="pull-left">
                                                    <img src="<?php echo $row['profile']; ?>" alt="" class="img-avatar">
                                                </div>
                                                <div class="media-body">
                                                    <small class="list-group-item-heading <?php echo $row['first_name']; ?>"
                                                           id=""><?php echo $row['first_name'] . " " . $row['last_name']; ?></small>
                                                    <br>
                                                    <small
                                                        class="list-group-item-text c-gray"><?php echo $row['role']; ?></small>
                                                </div>
                                            </a>
                                        <?php } ?>

                                    </div>


                                </div>

                                <div class="ms-body" style="height: 800px;">
                                    <div class="action-header clearfix">
                                        <div class="visible-xs" id="ms-menu-trigger">
                                            <i class="fa fa-bars"></i>
                                        </div>

                                        <div class="pull-left hidden-xs">
                                            <img src="<?php echo $user_data['profile']; ?>" alt=""
                                                 class="img-avatar m-r-10">
                                            <div class="lv-avatar pull-left">

                                            </div>
                                            <span><?php echo $user_data['name']; ?></span>
                                        </div>


                                    </div>

                                    <div class="msgs" style="overflow-y: scroll;">

                                    </div>
                                    <div class="msb-reply">
                                        <textarea placeholder="What's on your mind..."></textarea>
                                        <button id="sent" type="submit"><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <?php include '../components/adminfooter.php'; ?>
