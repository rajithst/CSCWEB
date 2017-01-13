<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';


if (isset($_GET)){

    $cid = $_GET['cid'];

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