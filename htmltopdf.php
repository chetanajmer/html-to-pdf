<?php

require_once('./dompdf/autoload.inc.php');
use Dompdf\Dompdf;
ob_start();
require_once 'index.php';
$html = ob_get_clean();
//ob_end_clean();


$html.='<style>'.file_get_contents("./bootstrap.min.css").'</style>';
$html.='<style>'.file_get_contents("./all.min.css").'</style>';
$html.='<style>'.file_get_contents("./stylesheet.css").'</style>';



$dompdf = new DOMPDF();

$dompdf->load_html($html);

$dompdf->render();
$dompdf=$dompdf->output();
 file_put_contents('cibilreport.pdf',$dompdf);


?>