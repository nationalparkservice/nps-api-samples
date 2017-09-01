<?php
	// Get cURL resource
	$curl = curl_init();
	// Set options
	$park = 'acad';
	$dataURL = 'https://developer.nps.gov/api/v0/parks?parkCode=' . $park . "&fields=addresses";
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
	echo $json->data[0]->fullName, "<br />";
	for ($i = 0; $i < count($json->data[0]->addresses); $i++) {
		if ($json->data[0]->addresses[$i]->type == "Mailing") {
			echo $json->data[0]->addresses[$i]->line1, "<br />";
			if ($json->data[0]->addresses[$i]->line2 != "") {
				echo $json->data[0]->addresses[$i]->line2, "<br />";
			}
			if ($json->data[0]->addresses[$i]->line3 != "") {
				echo $json->data[0]->addresses[$i]->line3, "<br />";
			}
			echo $json->data[0]->addresses[$i]->city, ", ", $json->data[0]->addresses[$i]->stateCode, " ", $json->data[0]->addresses[$i]->postalCode;
		}
	}
?>
