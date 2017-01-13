<?php
include 'components/admust.php';

if(isset($_GET['eventid']) === true and isset($_GET['name'])) {

    $eid = $_GET['eventid'];
    $name = $_GET['name'];


    $xml = new DOMDocument("1.0","UTF-8");
    $xml->load('events.xml');

    $xpath = new DOMXPATH($xml);

    foreach ($xpath->query("/monthly/event[name='$name']") as $node){

        $node->parentNode->removeChild($node);


    }
    $xml->formatOutput = true;
    $xml->save('events.xml');


    $sql = "DELETE FROM events WHERE id=$eid";
    mysqli_query($con,$sql);
    header('location:calander.php');
    exit();

}

?>