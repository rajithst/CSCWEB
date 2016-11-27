<?php

if (isset($_POST)){
    $dd = $_POST['contents'];
    $html = "$dd";
}

// include autoloader
    require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
    use Dompdf\Dompdf;

// instantiate and use the dompdf class
    $dompdf = new Dompdf();

    $dompdf->loadHtml(" $html ");

// (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
    $dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();

// Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("codex", array("Attachment" => 0));



?>