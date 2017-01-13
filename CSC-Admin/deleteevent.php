<?php
include 'components/admust.php';

if(isset($_GET['eventid']) === true and isset($_GET['name'])) {

    $eid = $_GET['eventid'];
    $name = $_GET['name'];


    $sql= "SELECT * FROM events WHERE id=$eid";
    $res = mysqli_query($con,$sql);
    $roo = mysqli_fetch_array($res);

    if ($roo[6]==1){

        $xml = new DOMDocument("1.0","UTF-8");
        $xml->load('stuevents.xml');

        $xpath = new DOMXPATH($xml);

        foreach ($xpath->query("/monthly/event[name='$name']") as $node){

            $node->parentNode->removeChild($node);


        }
        $xml->formatOutput = true;
        $xml->save('stuevents.xml');


    }

    if ($roo[7]==1){

        $xml = new DOMDocument("1.0","UTF-8");
        $xml->load('coursecoevents.xml');

        $xpath = new DOMXPATH($xml);

        foreach ($xpath->query("/monthly/event[name='$name']") as $node){

            $node->parentNode->removeChild($node);


        }
        $xml->formatOutput = true;
        $xml->save('coursecoevents.xml');


    }

    if ($roo[8]==1){

        $xml = new DOMDocument("1.0","UTF-8");
        $xml->load('csccoevents.xml');

        $xpath = new DOMXPATH($xml);

        foreach ($xpath->query("/monthly/event[name='$name']") as $node){

            $node->parentNode->removeChild($node);


        }
        $xml->formatOutput = true;
        $xml->save('csccoevents.xml');


    }



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