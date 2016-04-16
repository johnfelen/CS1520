<?php
    if( isset( $_POST[ "course" ] ) )
    {
        echo "{$_POST[ "course" ]} is a valid class and has been accepted.";
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body style="color:white; background-color:pink;">
        <div align="center">
            <form method="post" onsubmit="return checkForm()" action="./exercise-six.php">    <!--return false does not reload the webpage after the javascript function is called, the javascript function will reload the page if the course entered was correct-->

                <p>Enter A Computer Science Course To Search: </p>
                <input type="text" placeholder="Enter Course Here" id="course" name="course">
                <button type="submit" value="submit" style="color:white; background-color:red;"> Submit </button>
            </form>
        </div>

        <script>
            function checkForm()
            {
                var element = document.getElementById( "course" );
                var course = element.value;

                if( course.length !== 6 )   //incorrect length is checked by itself since it will not match the formatting nomatter what so no need to check other properties
                {
                    alert( "Incorrect length entered!\n" );
                    element.focus();
                    return false;
                }

                var department = course.substring( 0, 2 ).toUpperCase();
                var level = validate( course.substring( 2, 3 ) );
                var num = course.substring( 3 );

                var errors = "";
                if( department !== "CS" )
                {
                    errors += "Incorrect department entered!\n";
                }

                if( isNaN( level ) || level < 0 || level > 3 )
                {
                    errors += "Incorrect degree level entered!\n";
                }

                if( !validate( num[ 0 ] ) || !validate( num[ 1 ] ) || !validate( num[ 2 ] ) )
                {
                    errors += "Incorrect course number entered!\n";
                }

                if( errors !== "" )
                {
                    alert( errors );
                    element.focus();
                    return false;
                }

                else   //they entered a correct course so reload the page and let them know they did
                {
                    return true;
                }
            }

            function validate( char )    //checks if the char can be converted into a number
            {
                return parseInt( char );
            }
        </script>
    </body>
</html>
