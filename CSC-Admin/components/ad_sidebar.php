<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="home.php">CSC</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
      
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo Session::get('adminProfile'); ?>" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo Session::get('adminUser'); ?></div>
                    <div class="profile-data-title"><?php echo Session::get('adminRole'); ?></div>
                </div>
            </div>
        </li>
