<nav class="navbar navbar-static-top" role="navigation">

    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <li class="dropdown messages-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>

                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <div class="pull-left">

                                    </div>

                                    <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>

                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>

                        </ul>

                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>



            <li class="dropdown notifications-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>

                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>


            <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src=" <?php echo $user_data['profile']; ?>" alt=" <?php echo $user_data['name']; ?>" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo $user_data['name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">

                        <img src="<?php echo $user_data['profile']; ?>" alt=" <?php echo $user_data['name']; ?>" class="img-circle" alt="User Image">

                        <p>
                            <?php echo $user_data['name']; ?> - <?php echo $user_data['role']; ?>

                        </p>
                    </li>

                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
</nav>