<?php
	session_start();

	include 'StylisticFunctions.php';
	include 'DatabaseFunctions.php';

	//ensure the schema exists (in case this is being run for the first time)
	makeTable();
	//write the new data in
	saveThreatReport($_SESSION["name"],$_SESSION["email"],$_SESSION["severity"]);

	printHeader();
	//print all of the data, including the report that was just submitted.
	printAllThreatReports();
	echo "<a href=\"home.php\">Return to Homepage</a>";
	printFooter();


?>
