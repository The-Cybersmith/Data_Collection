<?php
	function makeTable(){
		$conn = new mysqli("localhost", "root", "password");
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		//make database, if it's not already there
		$sql = "CREATE DATABASE IF NOT EXISTS DataCollection";
		if ($conn->query($sql) === TRUE) {
			//echo "Database created successfully\n";
		} else {
			//echo "Error creating database: " . $conn->error . "\n";
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
			//echo "Table created successfully\n";
		} else {
			//echo "Error creating table: " . $conn->error . "\n";
		}
		$conn->close();
	}

	function saveThreatReport($name, $email, $severity){
		$conn = new mysqli("localhost", "root", "password");
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		
		$conn->select_db("DataCollection");
		
		$sql = "INSERT INTO ThreatReport (name, email, severity) VALUES (
			'".$name."',
			'".$email."',
			".$severity."
		)";
		if ($conn->query($sql) === TRUE) {
			//echo "Values inserted.\n";
		} else {
			//echo "Error inserting values: " . $conn->error . "\n";
		}
		$conn->close();
	}
	
	function printAllThreatReports(){
		$conn = new mysqli("localhost", "root", "password");
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		$conn->select_db("DataCollection");
		$sql = "SELECT * FROM ThreatReport;";
	
		$reports = $conn->query($sql);
		if ($reports->num_rows > 0) {
			echo "<h3>Here are the Threats:</h3><br><br>";
			while($row = $reports->fetch_assoc()) {
				$severity = "";
				if ($row["severity"] == "1"){
					$severity = "Low";
				}else if ($row["severity"] == "2"){
					$severity = "Medium";
				}else{
					$severity = "High";
				}
				echo "At ". $row["date"] . " " . $row["name"]. " reported a " . $severity. " threat. Contact here: " . $row["email"]. "<br>";
			}
		} else {
			echo "<h3>No Threat Reports.</h3>";
		}
		
		$conn->close();
	}

?>
