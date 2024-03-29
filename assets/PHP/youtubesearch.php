<?php

$query = $_GET['q'];

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://youtube-search-and-download.p.rapidapi.com/search?query=".$query,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: youtube-search-and-download.p.rapidapi.com",
		"X-RapidAPI-Key: your-api-key"
	],
]);

$response = curl_exec($curl);

curl_close($curl);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

echo $response;

?>