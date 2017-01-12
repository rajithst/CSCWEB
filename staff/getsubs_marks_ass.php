<?php


if (isset($_GET['cid'])){

    $cid = $_GET['cid'];
    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = "SELECT subject,subjectid FROM subjects WHERE courseid = '$cid'";
    $query = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($query)){
        $subid = $row['subjectid'];
		$token=0;
        echo "<li>";
        echo "<a tabindex='-1' href='ass_marks.php?subid=".$subid."&token=".$token."' style='font-size: 12px;' id='".$subid ."' >" . $row['subject'] . "</a><br>";
        echo "</li>";

    }


}