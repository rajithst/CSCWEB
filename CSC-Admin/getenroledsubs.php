<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/admin.php';


if (isset($_GET)) {

    $cid = $_GET['cid'];



    $sql = " SELECT * from subjects";

    $res = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($res)) {

                                        echo " <tr>
                                                <td>$row[2]</td>";

                            if ($row['coursecid']==$cid){

                                echo "<td><div class='icheckbox_minimal-grey ' style='position: relative;'>
                            
                            <input class='checkbox' checked='checked'  type='checkbox' name='user[]' value='$row[3]'>
                            </div> Enroled Subject</label></td>";
                            } else{

                                echo "<td><div class='icheckbox_minimal-grey ' style='position: relative;'>
                            
                            <input class='checkbox'  type='checkbox' name='user[]' value='$row[3]'>
                            </div> Not a Enroled Subject</label></td>";

                            }


                            
                       echo "<tr>";


    }
    }




