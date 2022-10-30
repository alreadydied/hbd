<?php

$data = json_decode(file_get_contents('php://input'), true); 

$number   = $data["from"];
$message  = $data["message"];

@$wa_no = $number;
@$wa_text0 = $message;
@$wa_text = strtoupper($message);
if ($wa_no . $wa_text == '') { exit ; } 
 
switch($wa_text) {
	
case 'Menu':
$msg = 'Silahkan Pilih Menu : ';
$button = 'PPDB,Formulir';
sendMessageButton($wa_no, $msg, $button);
break;

case 'PPDB':
    $msg = 'Link Pendaftaran : https://forms.gle/YmPSCWsDJwBC5ABJ8';
    $file = "https://github.com/failedtoacces/hbd/raw/main/Info%20PPDB.jpg";
sendMessageImage($wa_no, $msg, $file);
break;

case 'Formulir':
    $file = "https://github.com/failedtoacces/hbd/raw/a03c079620b4df510ade0136c3824c954c12e32a/FORMULIR%20PENDAFTARAN%20gelombang%201%20nov-des%202022.pdf";
sendMessageImage($wa_no, $msg, $file);
break;
	
}

function sendMessageButton($wa_no, $wa_text, $button) {
	$url = 'https://app.whacenter.com/api/sendButton';

$ch = curl_init($url);

$data = array(
    'device_id' => 'xxx',
    'number' => $wa_no,
    'message' => $wa_text,
    'button' => $button,
   
);
$payload = $data;
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
//echo $result;
}

function sendMessage($wa_no, $wa_text) {

$url = 'https://app.whacenter.com/api/send';

$ch = curl_init($url);

$nohp= $wa_no;
$pesan= $wa_text;

$data = array(
    'device_id' => 'xxx',
    'number' => $nohp,
    'message' => $pesan,
    //'file' => 'https://urlgamba-file',
   
);
$payload = $data;
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
//echo $result;
}

function sendMessageImage($wa_no, $wa_text, $file) {

$url = 'https://app.whacenter.com/api/send';

$ch = curl_init($url);

$nohp= $wa_no;
$pesan= $wa_text;

$data = array(
    'device_id' => '9a3186aa0e142514102fdb05afd8ff77',
    'number' => $nohp,
    'message' => $pesan,
    'file' => $file,
   
);
$payload = $data;
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
//echo $result;
}
 
?>