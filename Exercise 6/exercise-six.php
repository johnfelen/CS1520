<?php

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body style="color:white; background-color:pink;">
        <div align="center">
            <form method="post" onsubmit="checkForm()" action="./exercise-six.php">

                <p>Enter A Computer Science Course To Search: </p>
                <input type="text" placeholder="Enter Course Here" name="course">
                <button type="submit" value="Submit" style="color:white; background-color:red;"> Submit </button>

            </form>
        </div>

        <script>
            function checkForm()
            {
                var course = document.getElementsByName( "course" )[ 0 ];
                if( course.length !== 6 )
                {
                    return "Incorrect length entered!\n";
                }

                var department = course.substring( 0, 2 ).toUpperCase();
                var level = parseInt( course.substring( 2, 3 ) );
                var num = parseInt( course.substring( 3 ) );

                var errors = "";
                if( department !== "CS" )
                {
                    errors += "Incorrect department entered!\n";
                }

                if( isNaN( level ) || level < 0 || level > 3 )
                {
                    errors += "Incorrect degree level entered!\n";
                }

                if( isNaN( num ) || num < 0 || num > 999 )
                {
                    errors += "Incorrect course number entered!\n";
                }

                if( errors !== "" )
                {
                    return false;
                }

                else
                {
                    return true;
                }
            }
        </script>
    </body>
</html>
