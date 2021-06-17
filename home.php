<?php
	include 'DatabaseFunctions.php';
	include 'StylisticFunctions.php';

	makeTable();
	//saveThreatReport("test","experiment@debug.test",1);
	printHeader();
	printAllThreatReports();
	printFooter();
	

?>
