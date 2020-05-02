<?php
function ErrorHandler($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr<br>";
};
set_error_handler("ErrorHandler");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the data
	$json = file_get_contents("php://input");

	// Convert the string of data to an array
	$data = json_decode($json, true);
	$content = $data["content"];

	if (empty($content)) {
		echo "Invalid parameters.";
	} else {
		// Write to the text file
		$file = fopen("Edd.txt", "w")
		fwrite($file, $json);
		fclose($file);
		echo readfile("Edd.txt");
	};

} else {
	echo "Invalid parameters.";
};
?>