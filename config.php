    <?php
    /*
	Author: Anif Shikder

	DESCRIPTION AND CONTENTS

	courses.php: User types a course name (or substrings of) into the form and clicks the "search" button.
	myexams.js: JavaScript code intercepts the click event, and initiates an Ajax request to look up the course id, course name, section and instructor for the entered name.
	exams.php: Looks up the courses(s) that match the possibly incomplete passed name and outputs the course id, course name, section and instructor as a JSON array.
	myexams.js: Renders the JSON result as an HTML select menu, captures the user-choice from the select menu, and invokes search.php, now including the course id.
	search.php: Shows the exmas timetable results for the course of the provided ID, including everything listed in the sample image at the top of this page.
	top.html: html for the top portion of the page.
	bottom.html: html for the bottom poriton of the page
	exams.css: Provides style sheet for every page.

	FILE DESCRIPTION

	config.php: Holds info regarding database.
	*/
	// 
	$servername = 'localhost'; # CHANGE
	$username = 'root'; # CHANGE to shikdera
	$password = 'root'; # CHANGE to shikdera
	$db = 'cscb20w17_shikdera';

	$conn = mysqli_connect($servername, $username, $password, $db);

	if (!$conn) { 
		die("Connection failed: " . mysqli_connect_error()); 
	}

	?>