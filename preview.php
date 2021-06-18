<?php
	session_start();
	//here, the validation occurs. If the appropriate data is not forthcoming, the process automatically reverts to the previous stage
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		validateSeverity($_POST["severity"]);
	} else {
  		header("Location: severity.php");
		die();
	}

	include 'StylisticFunctions.php';

	printHeader();

	$severity = "";
	if ($_SESSION["severity"] == "1"){
		$severity = "Low";
	}else if ($_SESSION["severity"] == "2"){
		$severity = "Medium";
	}else{
		$severity = "High";
	}

	echo "<p>Please review the data you have given before confirming that you wish to submit it.</p>";
	echo ("Name: ".$_SESSION["name"]."<br>");
	echo ("Email: ".$_SESSION["email"]."<br>");
	echo ("Severity: ".$severity."<br>");

	printFooter();

	//ensure that email is an appropriate length, and is properly formatted
	function validateSeverity($severity){
  		if ($severity == "1" || $severity == "2" || $severity == "3"){
  			$_SESSION["severity"] = $severity;
  		}else{
  			header("Location: severity.php");
			die();
  		}
	}

?>
