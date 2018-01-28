<?php
	$file = "items.json";
	$arr = array();
	try {
		// Get form data
		$form = array( 'caption' => $_POST['caption'] );
		// Get data from existing json file
		$json = file_get_contents($file);
		// converts json data into array
		$arr = json_decode($json, true);
		// Push user data to array
		array_push($arr, $form);
		// Convert updated array back into JSON
		$json = json_encode($arr, JSON_PRETTY_PRINT);
		// write json data into items.json file
		if (file_put_contents($file, $json)) {
			header('Location: https://example.com/possible-path/items.json');
		}
		// return text indicating any possible errors in the submission
		else {
			echo "error";
		}
	}
	catch (Exception $e) {
		echo 'Caught exception: ', $e->getMessage(), "\n";
	}
?>
