<?php
	function makeTable(){
		$conn = new mysqli("localhost", "root", "password");
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		//make database, if it's not already there
		$sql = "CREATE DATABASE IF NOT EXISTS DataCollection";
		if ($conn->query($sql) === TRUE) {
			echo "Database created successfully\n";
		} else {
			echo "Error creating database: " . $conn->error . "\n";
		}
		
		$conn->select_db("DataCollection");
		
		$sql = "CREATE TABLE IF NOT EXISTS ThreatReport (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			email VARCHAR(100) NOT NULL,
			severity int(2) NOT NULL,
			date DATETIME DEFAULT NOW()
		)";
		if ($conn->query($sql) === TRUE) {
			echo "Table created successfully\n";
		} else {
			echo "Error creating table: " . $conn->error . "\n";
		}
		$conn->close();
	}


	makeTable();
?>
