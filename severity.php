<?php
	session_start();
	$_SESSION["threat"] = "?";

	//here, the validation occurs. If the appropriate data is not forthcoming, the process automatically reverts to the previous stage
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		validateEmail($_POST["email"]);
	} else {
  		header("Location: contact.php");
		die();
	}

	include 'StylisticFunctions.php';

	printHeader();
	echo "<a href=\"contact.php\">Go Back</a>";
	
	echo "<p>At this stage, please specify the threat level.</p>";
	
	echo "<form action=\"preview.php\" method=\"post\">";
	echo "<input type=\"radio\" name=\"severity\" value=\"1\">Low";
	echo "<input type=\"radio\" name=\"severity\" value=\"2\">Medium";
	echo "<input type=\"radio\" name=\"severity\" value=\"3\">High";
	echo "<input type=\"submit\">";
	echo "</form>";

	printFooter();

	//ensure that email is an appropriate length, and is properly formatted
	function validateEmail($email){
		//$email = trim($email);
		//my thanks to "Ben" on StackOverflow: https://stackoverflow.com/questions/1725907/check-if-a-string-is-an-email-address-in-php
  		if (strlen($email) < 51 && (filter_var($email, FILTER_VALIDATE_EMAIL) != false)){
  			$_SESSION["email"] = $email;
  		}else{
  			header("Location: contact.php");
			die();
  		}
	}

?>
