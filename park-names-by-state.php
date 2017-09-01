<?php
	// Get cURL resource
	$curl = curl_init();
	// Set options
	$state = 'me';
	$dataURL = 'https://developer.nps.gov/api/v0/parks?stateCode=' . $state;
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_URL => $dataURL,
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
		CURLOPT_HTTPHEADER => array('Authorization: INSERT-API-KEY-HERE')
	));
	// Send the request & save response to $response
	$response = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
	$json = json_decode($response);
	
	// Output park names
	$numParks = $json->total;
	echo "There are " . $numParks . " in " . strtoupper($state) . ".<br />";
	for ($i = 0; $i < count($json->data); $i++) {
		echo $json->data[$i]->fullName, "<br />";
	}
?>
