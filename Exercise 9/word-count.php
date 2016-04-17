<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="testWords.css">
    </head>

    <body>
        <br><br>
        <div align="center" id="problems">
            <button onclick="displayWord()" value="Display Word" type="button"> Display Word </button>
        </div>
        <br>

        <table align="center">
            <tr>
                <th> Word </th>
                <th> Count </th>
            </tr>
        </table>

        <script>
            var databaseCreated = false;
            var hashMap = new Object();

            function displayWord()
            {
                if( !databaseCreated )
                {
                    $.ajax(
                    {
                        url: "./setWords.php",
                        success: function()
                        {
                            databaseCreated = true;
                            displayWord();  //recrusive call so the displayWord will get a random word after the setWords.php has created the table in the database
                        }
                    });
                }

                else
                {
                    $.ajax(
                    {
                        url: "./getWords.php",
                        dataType: "xml",
                        success: function( data )
                        {
                            var currWord = data.getElementsByTagName( "value" )[ 0 ].childNodes[ 0 ].nodeValue;

                            if( !hashMap[ currWord ] )
                            {
                                hashMap[ currWord ] = 1;
                            }

                            else
                            {
                                hashMap[ currWord ]++;
                            }
                        }
                    });
                }
            }
        </script>
    </body>
</html>
