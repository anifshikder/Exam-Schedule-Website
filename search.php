<!DOCTYPE html>
<html>
    <!--
    Author: Anif Shikder

    DESCRIPTION AND CONTENTS

    courses.php: User types a course name (or substrings of) into the form and clicks the "search" button.
    myexams.js: JavaScript code intercepts the click event, and initiates an Ajax request to look up the course id, course name, section and instructor for the entered name.
    exams.php: Looks up the courses(s) that match the possibly incomplete passed name and outputs the course id, course name, section and instructor as a JSON array.
    myexams.js: Renders the JSON result as an HTML select menu, captures the user-choice from the select menu, and invokes search.php, now including the course id.
    top.html: html for the top portion of the page.
    bottom.html: html for the bottom poriton of the page
    exams.css: Provides style sheet for every page.

    FILE DESCRIPTION

    search.php: Shows the exmas timetable results for the course of the provided ID, including everything listed in the sample image at the top of this page.
    -->
    <?php
    $specificCourse = $_POST['dropdown'];
    
    include "config.php";

	$sqlQuery= "SELECT * FROM courses,time WHERE courses.id=time.id AND course='$specificCourse'"; 
	$result = mysqli_query($conn, $sqlQuery);

	mysqli_close($conn);
	?>
	<head>
    	<?php include "top.html" ; ?>
    </head>

    <body>
    	<div id="main">
    	        <div id="frame">
            	<header>  <!-- new HTML5 page-section structure element -->
                	<h2>UTSC <span class="spantitle">Winter</span> 2017 <span class="spantitle">Final</span> Exam <span class="spantitle">Timetable</span></h2>
            	</header>
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
                <tr>
                <?php while($ith = mysqli_fetch_assoc($result)) { ?>
                    <td class = "courset"> <?php echo $ith['course'];?></td>
                    <td class = "sectiont"> <?php echo $ith['section'];?></td>
                    <td class = "instructort"> <?php echo $ith['instructor'];?></td>
                    <td class = "datet"> <?php echo $ith['date'];?></td>
                    <td class = "startt"> <?php echo $ith['start'];?></td>
                    <td class = "endt"> <?php echo $ith['end'];?></td>
                    <td><input type="button" value="Add to Calendar" id="calendarbutton"></td>

                 <?php }?>
                </tr>
                </table>
        <?php include ("bottom.html"); ?>
        </div>
        </div>
    </body>
</html>
