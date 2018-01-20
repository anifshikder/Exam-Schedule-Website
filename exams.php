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
config.php: Holds info regarding database.

FILE DESCRIPTION

exams.php: Looks up the courses(s) that match the possibly incomplete passed name and outputs the course id, course name, section and instructor as a JSON array.
*/
// include config for database connection
$courseSearchRequest = $_POST['searchdata'];

include "config.php";
// IMPROVEMENT MADE TO SEARCH BY INSTRUCTOR NAME, COURSE CODE, OR DATE
// Query to be made
$sqlQuery= "SELECT DISTINCT  * FROM courses,time WHERE courses.id=time.id AND course LIKE '%$courseSearchRequest%' OR instructor LIKE '%$courseSearchRequest%' GROUP BY course";

// get the query | TRY CATCH BLOCK GOES HERE
$result = mysqli_query($conn, $sqlQuery);

// create an empty array
$every_row = array();
// populate the array
while($ith = mysqli_fetch_assoc($result)) {
	$every_row[] = $ith;
}
// enode into json and print
print json_encode($every_row);
// close connection to database
mysqli_close($conn);
?>