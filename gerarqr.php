<?php


namespace chillerlan\QRCodeExamples;

use chillerlan\QRCode\{QRCode, QROptions};

include "./vendor/autoload.php";
$url = '/pap/sessaovacaqr.php?'.$_SESSION['numqr'];

// quick and simple:
//echo '<img src="'.(new QRCode)->render($url).'" alt="QR Code" />';

$options = new QROptions ( [
         'version' =>5,
         'outputType' => QRCOde::OUTPUT_MARKUP_SVG,
         'eccLevel' => QRCode::ECC_L,
 ]);

$qrcode = new QRCode ($options);
//$qrcode->render ($url);


$ext='.svg';
$numqr=$_SESSION['numqr'];
$name = $numqr . $ext;
$dir = 'qrcode/';
$qrcode->render ($url, $dir.$name);

?>