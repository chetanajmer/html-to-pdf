<?php




$url = "https://www.martonline.co.in/martonlinev2/new-api/ekyc1.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

$data = array( 
    'phone' => '8306639910',
    'method' => 'CIBILToJSON'
);


curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$contents = curl_exec($ch);
curl_close($ch);

echo "<pre>";
print_r($contents);


?>