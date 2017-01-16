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

    <li class="">
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

    <li class="active">
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
        <li><a href="#">Import database</a></li>
        <li class="active">Success</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Import Database</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <!-- START DEFAULT DATATABLE -->
   				<?php 
   				
   				$fileName= $_FILES["fileToUpload"]["name"];
   				$fileTmp = $_FILES["fileToUpload"]["tmp_name"];
   				$fileType = $_FILES["fileToUpload"]["type"];
   				$fileSize = $_FILES["fileToUpload"]["size"];
   				$fileError = $_FILES["fileToUpload"]["error"];
   				$file = explode(".", $fileName);
   				$extension = $file[1];
   				if (!$fileTmp){
   					echo "ERROR:Please select a file";
   					exit();
   				}elseif (!preg_match("/\.(sql)$/i", $fileName)){
   					echo "ERROR,File should be sql file";
   				
   					exit();
   				
   				}elseif ($fileError == 1){
   					echo "ERROR: Error occured..";
   					exit();
   				}
   				$res = move_uploaded_file($fileTmp, "sqlimports/$fileName");
   				if ($res != true){
   					echo "ERROR:File not uploaded!!";
   					exit();
   				}
   				
   				
   				
   				$table = IMPORT_TABLES($host,$user,$password,'csc', 'sqlimports/'.$fileName);
   				
   				if ($table) { ?>
   				
   					<div class="alert alert-success">
   					<strong>Success!</strong> Successfully imported the data to the database.
   					</div>
   					
   					<div class="alert alert-warning">
					  <strong>Table Warning!</strong> All your tables has been overwritten in <?php echo $database; ?> database.
					</div>
   				
   			<?php 	}
   				
   				?>
                <!-- END DEFAULT DATATABLE -->



            </div>
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









<?php



function IMPORT_TABLES($host,$user,$pass,$dbname, $sql_file_OR_content){
	set_time_limit(3000);
	$SQL_CONTENT = (strlen($sql_file_OR_content) > 300 ?  $sql_file_OR_content : file_get_contents($sql_file_OR_content)  );
	$allLines = explode("\n",$SQL_CONTENT);
	$mysqli = new mysqli($host, $user, $pass, $dbname); if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	$zzzzzz = $mysqli->query('SET foreign_key_checks = 0');	        preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n". $SQL_CONTENT, $target_tables); foreach ($target_tables[2] as $table){$mysqli->query('DROP TABLE IF EXISTS '.$table);}         $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');    $mysqli->query("SET NAMES 'utf8'");
	$templine = '';	// Temporary variable, used to store current query
	foreach ($allLines as $line)	{											// Loop through each line
		if (substr($line, 0, 2) != '--' && $line != '') {$templine .= $line; 	// (if it is not a comment..) Add this line to the current segment
		if (substr(trim($line), -1, 1) == ';') {		// If it has a semicolon at the end, it's the end of the query
			if(!$mysqli->query($templine)){ print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');  }  $templine = ''; // set variable to empty, to start picking up the lines after ";"
		}
		}
	}	return TRUE;
}   
?>