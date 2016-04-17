<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="problem.js"></script>
    </head>

    <body style="color:gray; background-color:lightblue;">
        <br><br>
        <div align="center">
            <button onclick="displayQuiz()" value="Display Quiz" type="button" style="color:gray;"> Display Quiz </button>
        </div>
        <br>

        <div align="center" id="problems">

        </div>

        <script>
            var problems = new Array();
            function displayQuiz()
            {
                var xhttp = new XMLHttpRequest();
                xhttp.open( "GET", "data.xml", true );
                xhttp.send();

                xhttp.onload = function()
                {
                    parseXML( xhttp );
                    addProbsToDOM();
                    addClickListeners();
                }
            }

            function parseXML( xhttp )
            {
                var quiz = xhttp.responseXML;
                var problemsInXML = quiz.getElementsByTagName( "problem" );

                // I used http://www.w3schools.com/xml/tryit.asp?filename=try_dom_loadxmltext and http://www.w3schools.com/xml/books.xml to help me work out all the xml data parsing
                for( var i = 0; i < problemsInXML.length; i++ )
                {
                    var currQuestion =  problemsInXML[ i ].getElementsByTagName( "question" )[ 0 ].childNodes[ 0 ].nodeValue;

                    var currAnswers = new Array();
                    var numAns = problemsInXML[ i ].getElementsByTagName( "answer" ).length;
                    for( var e = 0; e < numAns; e++ )
                    {
                        currAnswers[ e ] = problemsInXML[ i ].getElementsByTagName( "answer" )[ e ].childNodes[ 0 ].nodeValue;
                    }
                    var currCorrectAns = problemsInXML[ i ].getElementsByTagName( "correct" )[ 0 ].childNodes[ 0 ].nodeValue;

                    problems[ i ] = new Problem( currQuestion, currAnswers, currCorrectAns );
                }
            }

            function addProbsToDOM()
            {
                var displayHTML = "";    //will be used all the HTML to concatenate all the problems and then change the innerHTML
                for( var i = 0; i < problems.length; i++ )
                {
                    var currProblem = "<div align=\"center\">";
                    currProblem += problems[ i ].getQuestion();

                    //add all the answers to a select element that is inside currProblem div
                    var answers = problems[ i ].getAnswers();
                    currProblem += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id=\"answers" + i + "\">";
                    for( var e = 0; e < answers.length; e++ )
                    {
                        currProblem += "<option value=\"" + answers[ e ] + "\">" + answers[ e ] + "</option>"
                    }
                    currProblem += "</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                    currProblem += "<button type=\"button\" id=\"question" + i + "\" style=\"color:gray;\"> Answer Question! </button></div><br>";
                    displayHTML += currProblem;
                }

                $( "#problems" ).html( displayHTML );
            }

            function addClickListeners()
            {
                //I based the regex to get the correct index for the question the button was related to from the second last answer on http://stackoverflow.com/questions/15979264/jquery-loop-through-selectors-and-click-event-handler, for some reason a normal for loop would not give the correct index of the dynamically created ids and just give 3 as the index
                $( "[id^=question]" ).each( function( i )
                {
                    $( this ).click( function()
                    {
                        if( $( "#answers" + i ).val() == problems[ i ].getCorrectAnswer() )
                        {
                            console.log( true );
                        }

                        else
                        {
                            console.log( false );
                        }
                    });
                });
            }
        </script>
    </body>
</html>
