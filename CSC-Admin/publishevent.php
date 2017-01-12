<?php
 include 'components/admust.php';


$myFile = "events.xml";
$fh = fopen($myFile, 'w') or die("can't open file");

$rss_txt .= '<?xml version="1.0" encoding="utf-8"?>';
$rss_txt .= "<rss version='2.0'>";
$rss_txt .= "<monthly>";

$query = mysqli_query($con,"SELECT * FROM events");
while($values_query = mysqli_fetch_assoc($query))
{
    $rss_txt .= '<event>';

    $rss_txt .= '<name>' .$values_query['name']. '</name>';
    $rss_txt .= '<startdate>' .$values_query['sdate']. '</startdate>';
    $rss_txt .= '<enddate>' .$values_query['enddate']. '</enddate>';
    $rss_txt .= '<starttime>' .$values_query['starttime']. '</starttime>';
    $rss_txt .= '<endtime>' .$values_query['endtime']. '</endtime>';


    $rss_txt .= '</event>';
}

$rss_txt .= '</rss>';
$rss_txt .= '</monthly>';

fwrite($fh, $rss_txt);
fclose($fh);
?>


