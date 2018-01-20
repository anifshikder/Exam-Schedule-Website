    /*
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

    myexams.js: JavaScript code intercepts the click event, and initiates an Ajax request to look up the course id, course name, section and instructor for the entered name.
	myexams.js: Renders the JSON result as an HTML select menu, captures the user-choice from the select menu, and invokes search.php, now including the course id.
	*/
	
$( document ).ready(function() {
	// when the seach button is clicked
	$('#searchbutton').click(function(){
		// get value from the search box
		var data = $('#coursesearch').val();
			// initiate a post rquest
		    $.ajax({
		    	url : 'exams.php',
		    	type: "POST",
		    	data : {'searchdata': data},
		    	dataType: 'json',
		    	success: function(data)
		    	{	// upon success, go through each query adn display them in the drop down
					$.each(data, function(k, v){
		    			$('#dropdown').append('<option value='+v.course+'>'+v.course + " " + v.instructor + " " + v.section+'</option>');
					});
		    	},
		    	// display any error code
		    	error: function(data){
		    		console.log(error);
		    	}
		    });
	});
	// when an element from the drop down is selected
    $('#dropdown').change(function() {
    	// submit the form to search.php
        this.form.submit();
    });


    // IMPROVEMENT, added an add to calendar button
    $('#calendarbutton').click(function() {
    	// get title of the course
    	var title = $('#displayTable').find(".courset").html();
    	// get exam date
    	var date = $('#displayTable').find(".datet").html();
    	// get exam time
    	var start = $('#displayTable').find(".startt").html();
    	var end = $('#displayTable').find(".endt").html();

    	// default date/time set, couldnt implement that functionality, didnt have time.
        window.open('http://www.google.com/calendar/event?action=TEMPLATE&text='+title+'%20Exam&dates=20170401T010000Z%2F20170401T020000Z&text=&location=&details=CHANGE%20THE%20DATE%20MANUALLY%20!!!!%20PLACEHOLDER%20DATE', '_blank');
    });
});