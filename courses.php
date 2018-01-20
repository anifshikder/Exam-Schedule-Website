<!DOCTYPE html>
<!--
Author: Anif Shikder

DESCRIPTION AND CONTENTS

exams.php: Looks up the courses(s) that match the possibly incomplete passed name and outputs the course id, course name, section and instructor as a JSON array.
myexams.js: Renders the JSON result as an HTML select menu, captures the user-choice from the select menu, and invokes search.php, now including the course id.
search.php: Shows the exmas timetable results for the course of the provided ID, including everything listed in the sample image at the top of this page.
top.html: html for the top portion of the page.
bottom.html: html for the bottom poriton of the page
config.php: Holds info regarding database.

FILE DESCRIPTION

courses.php: User types a course name (or substrings of) into the form and clicks the "search" button.
myexams.js: JavaScript code intercepts the click event, and initiates an Ajax request to look up the course id, course name, section and instructor for the entered name.
-->
<html>
    <head>
    	<?php include ("top.html"); ?>
    </head>
    <body>
    	<div id="main">
    	        <div id="frame">
            	<header>  <!-- new HTML5 page-section structure element -->
                    <h2>UTSC <span class="spantitle">Winter</span> 2017 <span class="spantitle">Final</span> Exam <span class="spantitle">Timetable</span></h2>
            	</header>
                <!-- Table to display exam info-->
                <table id= "displayTable">
                <tr>
                     <th class =displayTableHeader>Course</th>
                     <th class =displayTableHeader>Section</th>
                     <th class =displayTableHeader>Instructor</th>
                     <th class =displayTableHeader>Date</th>
                     <th class =displayTableHeader>Start</th>
                     <th class =displayTableHeader>End</th>
                     <th class =displayTableHeader></th>
                </tr>
                </table>
        <?php include ("bottom.html"); ?>
    </body>
</html>
