<?php

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}
if(isset($_GET['down'])) {
	$id = $_GET['down'];
}

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://youtube-mp36.p.rapidapi.com/dl?id=".$id,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 20,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: youtube-mp36.p.rapidapi.com",
		"x-rapidapi-key: your-api-key"
	],
]);

$response = curl_exec($curl);

curl_close($curl);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

if(isset($_GET['id'])) {
	echo $response;
}
else {
	$link = json_decode($response);
	header('location: '.$link->link);
	sleep(3);
	header('location: ../../youtube2mp3.php');
}
