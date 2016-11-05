<?php

if (isset($_GET['cid'])){

    $cid = $_GET['cid'];
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT subject,subjectid FROM subjects WHERE courseid = '$cid'";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($query)){
            $subid = $row['subjectid'];
        echo "<li style='padding: 0; '><a tabindex='-1' href='subject.php?subject=".$subid."' style='font-size: 12px;' id='".$subid ."' >" . $row['subject'] . "</a></li>";


    }


}
