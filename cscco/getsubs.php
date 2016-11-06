<?php


if (isset($_GET)){

    $cid = $_GET['cid'];

    $con = mysqli_connect('localhost', 'root', 'rajith',  'csc');
    $sql = " SELECT * from subjects WHERE courseid = '$cid'";
    echo $sql;
    $res = mysqli_query($con, $sql);


    while($row = $res->fetch_assoc()){

        echo "<tr>";
        echo "<td>".$row['subjectid']."</td>";
        echo "<td>".$row['subject']."</td>";
        echo "</tr>";



    }


}