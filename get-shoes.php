<?php
	$hostname = getenv("dbhostname");
	$dbname = getenv("dbname");
	$username = getenv("dbusername");
	$password = getenv("dbpassword");


	try {
		$conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$statement = $conn->prepare("SELECT schoen_id, schoen_prijs, schoen_naam, schoen_url, schoen_desc FROM schoenen");
		$statement->execute();
		$data = json_encode($statement->fetchAll(PDO::FETCH_ASSOC));	
		echo $data;	
	}
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
