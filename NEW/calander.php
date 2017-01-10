<?php include 'components/admust.php' ?>
<?php include 'components/ad_head.php' ?>


<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <?php include "components/ad_sidebar.php";?>

    <li class="xn-title">Menu</li>
    <li class="">
        <a href="home.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
    </li>

    <li class="active">
        <a href="calander.php"><span class="fa fa-desktop"></span> <span class="xn-text">Calander</span></a>
    </li>

    <li class="xn-openable">
        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Posts</span></a>
        <ul>
            <li><a href="compose.php"><span class="fa fa-image"></span> New Post</a></li>
            <li class=""><a href="published.php"><span class="fa fa-user"></span> Published</a></li>
            <li class=""><a href="draft.php"><span class="fa fa-users"></span> Draft</a></li>

        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
        <ul>
            <li><a href="inbox.php"><span class="fa fa-inbox"></span> Inbox</a></li>
            <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
            <li><a href="compose.php"><span class="fa fa-pencil"></span> Compose</a></li>
        </ul>
    </li>
    <li class=""><a href="chat.php"><span class="fa fa-comments"></span> Messages</a></li>

    <li class="xn-openable">
        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
        <ul>
            <li><a href="allusers.php"><span class="fa fa-heart"></span> All Users</a></li>
            <li><a href="adduser.php"><span class="fa fa-cogs"></span> Add User</a></li>
            <li><a href="edituser.php"><span class="fa fa-square-o"></span> Edit User</a></li>

        </ul>
    </li>

    <li>
        <a href="backup.php"><span class="fa fa-map-marker"></span> <span class="xn-text">Data Backups</span></a>
    </li>

    <li>
        <a href="coursesettings.php"><span class="fa fa-map-marker"></span> <span class="xn-text">Course Settings</span></a>
    </li>

    <li class="xn-openable">
        <a href=""><span class="fa fa-user"></span> <span class="xn-text">System Settings</span></a>
        <ul>
            <li><a href="profilesettings.php"><span class="fa fa-heart"></span> Profile Setings</a></li>
            <li><a href="generalsettings.php"><span class="fa fa-cogs"></span> General Settings</a></li>

        </ul>
    </li>

    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- PAGE CONTENT -->
<div class="page-content">

    <?php include "components/ad_xnav.php";?>
    <!-- END X-NAVIGATION VERTICAL -->

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Posts</a></li>
        <li class="active">Draft</li>
    </ul>
    <!-- END BREADCRUMB -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="content-frame">
            <!-- START CONTENT FRAME TOP -->
            <div class="content-frame-top">
                <div class="page-title">
                    <h2><span class="fa fa-calendar"></span> Calendar</h2>
                </div>
                <div class="pull-right">
                    <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                </div>
            </div>
            <!-- END CONTENT FRAME TOP -->

            <!-- START CONTENT FRAME LEFT -->
            <div class="content-frame-left" style="height: 1055px;">
                <h4>New Event</h4>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" id="new-event-text" placeholder="Event text..." type="text">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" id="new-event">Add</button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END CONTENT FRAME LEFT -->

            <!-- START CONTENT FRAME BODY -->
            <div class="content-frame-body padding-bottom-0" style="">

                <div class="row">
                    <div class="col-md-12">
                        <div id="alert_holder"></div>
                        <div class="calendar">
                            <div id="calendar" class="fc fc-ltr fc-unthemed"><div class="fc-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="disabled">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"><h2>January 2017</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table><thead><tr><td class="fc-widget-header"><div class="fc-row fc-widget-header"><table><thead><tr><th class="fc-day-header fc-widget-header fc-sun">Sun</th><th class="fc-day-header fc-widget-header fc-mon">Mon</th><th class="fc-day-header fc-widget-header fc-tue">Tue</th><th class="fc-day-header fc-widget-header fc-wed">Wed</th><th class="fc-day-header fc-widget-header fc-thu">Thu</th><th class="fc-day-header fc-widget-header fc-fri">Fri</th><th class="fc-day-header fc-widget-header fc-sat">Sat</th></tr></thead></table></div></td></tr></thead><tbody><tr><td class="fc-widget-content"><div class="fc-day-grid-container" style=""><div class="fc-day-grid"><div class="fc-row fc-week fc-widget-content" style="height: 160px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2017-01-01"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2017-01-02"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2017-01-03"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2017-01-04"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2017-01-05"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2017-01-06"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2017-01-07"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-past" data-date="2017-01-01">1</td><td class="fc-day-number fc-mon fc-past" data-date="2017-01-02">2</td><td class="fc-day-number fc-tue fc-past" data-date="2017-01-03">3</td><td class="fc-day-number fc-wed fc-past" data-date="2017-01-04">4</td><td class="fc-day-number fc-thu fc-past" data-date="2017-01-05">5</td><td class="fc-day-number fc-fri fc-past" data-date="2017-01-06">6</td><td class="fc-day-number fc-sat fc-past" data-date="2017-01-07">7</td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-event fc-start fc-end  fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">networking assignment</span></div><div class="fc-resizer"></div></a></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 160px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2017-01-08"></td><td class="fc-day fc-widget-content fc-mon fc-today fc-state-highlight" data-date="2017-01-09"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2017-01-10"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2017-01-11"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2017-01-12"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2017-01-13"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2017-01-14"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-past" data-date="2017-01-08">8</td><td class="fc-day-number fc-mon fc-today fc-state-highlight" data-date="2017-01-09">9</td><td class="fc-day-number fc-tue fc-future" data-date="2017-01-10">10</td><td class="fc-day-number fc-wed fc-future" data-date="2017-01-11">11</td><td class="fc-day-number fc-thu fc-future" data-date="2017-01-12">12</td><td class="fc-day-number fc-fri fc-future" data-date="2017-01-13">13</td><td class="fc-day-number fc-sat fc-future" data-date="2017-01-14">14</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 160px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2017-01-15"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2017-01-16"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2017-01-17"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2017-01-18"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2017-01-19"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2017-01-20"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2017-01-21"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-future" data-date="2017-01-15">15</td><td class="fc-day-number fc-mon fc-future" data-date="2017-01-16">16</td><td class="fc-day-number fc-tue fc-future" data-date="2017-01-17">17</td><td class="fc-day-number fc-wed fc-future" data-date="2017-01-18">18</td><td class="fc-day-number fc-thu fc-future" data-date="2017-01-19">19</td><td class="fc-day-number fc-fri fc-future" data-date="2017-01-20">20</td><td class="fc-day-number fc-sat fc-future" data-date="2017-01-21">21</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 160px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2017-01-22"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2017-01-23"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2017-01-24"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2017-01-25"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2017-01-26"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2017-01-27"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2017-01-28"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-future" data-date="2017-01-22">22</td><td class="fc-day-number fc-mon fc-future" data-date="2017-01-23">23</td><td class="fc-day-number fc-tue fc-future" data-date="2017-01-24">24</td><td class="fc-day-number fc-wed fc-future" data-date="2017-01-25">25</td><td class="fc-day-number fc-thu fc-future" data-date="2017-01-26">26</td><td class="fc-day-number fc-fri fc-future" data-date="2017-01-27">27</td><td class="fc-day-number fc-sat fc-future" data-date="2017-01-28">28</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 160px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2017-01-29"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2017-01-30"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2017-01-31"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2017-02-01"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2017-02-02"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2017-02-03"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2017-02-04"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-future" data-date="2017-01-29">29</td><td class="fc-day-number fc-mon fc-future" data-date="2017-01-30">30</td><td class="fc-day-number fc-tue fc-future" data-date="2017-01-31">31</td><td class="fc-day-number fc-wed fc-other-month fc-future" data-date="2017-02-01">1</td><td class="fc-day-number fc-thu fc-other-month fc-future" data-date="2017-02-02">2</td><td class="fc-day-number fc-fri fc-other-month fc-future" data-date="2017-02-03">3</td><td class="fc-day-number fc-sat fc-other-month fc-future" data-date="2017-02-04">4</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 163px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2017-02-05"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2017-02-06"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2017-02-07"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2017-02-08"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2017-02-09"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2017-02-10"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2017-02-11"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-other-month fc-future" data-date="2017-02-05">5</td><td class="fc-day-number fc-mon fc-other-month fc-future" data-date="2017-02-06">6</td><td class="fc-day-number fc-tue fc-other-month fc-future" data-date="2017-02-07">7</td><td class="fc-day-number fc-wed fc-other-month fc-future" data-date="2017-02-08">8</td><td class="fc-day-number fc-thu fc-other-month fc-future" data-date="2017-02-09">9</td><td class="fc-day-number fc-fri fc-other-month fc-future" data-date="2017-02-10">10</td><td class="fc-day-number fc-sat fc-other-month fc-future" data-date="2017-02-11">11</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END CONTENT FRAME BODY -->

        </div>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<?php include "components/ad_messagebox.php";?>
<!-- END MESSAGE BOX-->


<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<?php include 'components/ad_foot.php'; ?>





