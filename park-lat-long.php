<?php
	// Get cURL resource
	$curl = curl_init();
	// Set options
	$park = 'acad';
	$dataURL = 'https://developer.nps.gov/api/v1/parks?parkCode=' . $park;
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
	
	// Prepare and execute address output
	echo $json->data[0]->fullName, " can be found at ", $json->data[0]->latLong, ".";
?>
