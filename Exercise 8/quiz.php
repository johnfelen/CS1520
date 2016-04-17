<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="problem.js"></script>
    </head>

    <body style="color:red; background-color:lightblue;">
        <br><br>
        <div align="center">
            <button onclick="displayQuiz()" value="Display Quiz" type="button" style="color:orange;"> Display Quiz </button>
        </div>
        <br>

        <script>
            var problems = new Array();
            function displayQuiz()
            {
                var xhttp = new XMLHttpRequest();
                xhttp.open( "GET", "data.xml", true );
                xhttp.send();

                xhttp.onload = function()
                {
                    var quiz = xhttp.responseXML;
                    var problemsInXML = quiz.getElementsByTagName( "problem" );

                    // I used http://www.w3schools.com/xml/tryit.asp?filename=try_dom_loadxmltext and http://www.w3schools.com/xml/books.xml to help me work out all the xml data parsing
                    for( var i = 0; i < problemsInXML.length; i++ )
                    {
                        var currQuestion =  problemsInXML[ i ].getElementsByTagName( "question" )[ 0 ].childNodes[ 0 ];

                        var currAnswers = new Array();
                        var currCorrectAns;
                        for( var e = 0; e < currAnswers.length; e++ )
                        {
                            currAnswers[ e ] = problemsInXML[ i ].getElementsByTagName( "answer" )[ e ].childNodes[ 0 ];

                            if( currAnswers[ e ] == problemsInXML[ i ].getElementsByTagName( "correct" )[ 0 ].childNodes[ 0 ] )
                            {
                                currCorrectAns = e;
                            }
                        }

                        problems[ i ] = new Problem( currQuestion, currAnswers, currCorrectAns );
                    }
                }
            }
        </script>
    </body>
</html>
