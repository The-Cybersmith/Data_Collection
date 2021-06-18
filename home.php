<?php
	//this is needed to keep the data between pages.
	session_start();
	$_SESSION["name"] = "?";
	$_SESSION["email"] = "?";
	$_SESSION["threat"] = "?";

	include 'StylisticFunctions.php';

	printHeader();
	
	echo "<p>At this stage, please enter your name. This must be 2-25 characters long, or you'll simply be returned to this page.</p>";
	
	echo "<form action=\"contact.php\" method=\"post\">";
	echo "Name: <input type=\"text\" name=\"name\"><br>";
	echo "<input type=\"submit\">";
	echo "</form>";

	printFooter();
?>
