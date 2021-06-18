<?php
	session_start();
	$_SESSION["email"] = "?";
	$_SESSION["threat"] = "?";

	//here, the validation occurs. If the appropriate data is not forthcoming, the process automatically reverts to the previous stage
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		validateName($_POST["name"]);
	} else {
  		header("Location: home.php");
		die();
	}


	include 'StylisticFunctions.php';

	printHeader();
	<a href="home.php">Go Back</a>
	
	echo "<p>At this stage, please enter your email address. It must be a valid email, and no more than 100 characters long.</p>";
	
	echo "<form action=\"severity.php\" method=\"post\">";
	echo "Email: <input type=\"text\" name=\"email\"><br>";
	echo "<input type=\"submit\">";
	echo "</form>";

	printFooter();

	//ensure that name is an appropriate length, and contains no tricksy characters
	function validateName($name){
		$name = trim($name);
  		$name = stripslashes($name);
  		$name = htmlspecialchars($name);
  		if (strlen($name) < 26 && strlen($name) > 1){
  			$_SESSION["name"] = $name;
  		}else{
  			header("Location: home.php");
			die();
  		}
	}

?>
