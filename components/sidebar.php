<script>



    $(document).ready(function(){
        var page = " <?php echo $var; ?> ";

        $("li.treeview> ul.treeview-menu>li>a").click(function() {
            $(this).parent().addClass('active');

        });






    });




</script>

<ul class="sidebar-menu" style="margin-top: 20px;">

    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="dashboard.php"><i class="fa fa-link"></i> <span>Home</span></a></li>

    <li class="treeview active">
        <a href="#"><i class="fa fa-link"></i> <span>Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="published.php">Publised Posts</a></li>
            <li><a href="newpost.php" id="aa">New Post</a></li>
            <li><a href="draft.php">Draft</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Emails</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="compose.php">compose</a></li>
            <li><a href="inbox.php">Inbox</a></li>

            <li><a href="sent.php">Sent</a></li>
            <li><a href="#">Span</a></li>
        </ul>
    </li>


    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="allusers.php">All Users</a></li>
            <li><a href="adduser.php">Add User</a></li>
            <li><a href="manage.php">Manage Users</a></li>
        </ul>
    </li>


    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="general.php" id="general" >General Settings</a></li>
            <li><a href="users.php">Admin User Settings</a></li>
            <li><a href="profile.php">My Profile</a></li>
        </ul>
    </li>

    </li>
</ul>
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>

