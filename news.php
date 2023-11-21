<?php
 
// Your Open Exchange Rates API Key
$api_key = 'pub_329013b2f826ab06a4d8d3fd1ce1970512e9e';
$countryCode = strtolower($_POST['selectedCountry']);

 

// API URL
// $url = "https://newsapi.org/v2/top-headlines?country={$countryCode}&apiKey={$api_key}"; 
$url = "https://newsdata.io/api/1/news?apikey={$api_key}&country={$countryCode}";
// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the User-Agent header
curl_setopt($ch, CURLOPT_USERAGENT, 'Gazetteer/1.0');

// Execute the cURL session and get the JSON response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
    exit;
}

if ($response === false) {
    echo json_encode(array('error' => 'Failed to fetch data'));
} else {
    echo $response;
}
// Close cURL session
curl_close($ch);
 
 

?>
